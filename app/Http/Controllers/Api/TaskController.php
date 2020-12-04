<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentStoreRequest;
use App\Http\Requests\DepartmentUpdateRequest;
use App\Models\Task;
use App\Models\UserTask;
use App\Models\Department;
use App\Models\User;
use App\Models\File;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $pagination = Task::with('creator','status','users')->paginate($request->per_page ?? 100);
        return response()->json([
            'success' => true,
            'data' => $pagination->items(),
            'paging' => [
                'current_page' => $pagination->currentPage(),
                'per_page' => $pagination->perPage(),
                'total' => $pagination->total(),
            ]
        ]);
    }

    public function getTasks(Request $request)
    {
    $departments = Department::all();
    $data = [];
    $index = 0;
    foreach ($departments as $department) {
        $count = [];
        $count['id'] = $department['id'];
        $count['name'] = $department['name'];
       $count['task'] = Task::where('department_id', $department['id'])->count();
       $count['user'] = User::where('department_id', $department['id'])->count();
        $data[$index] = $count;
        $index++;
    }
        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }
    public function getMyTasks(Request $request,$id)
    {
        $model = Task::with('users','status', 'creator')->where('department_id', $id)->paginate($request->per_page ?? 100);;
        return response()->json([
            'success' => true,
            'data' => $model->items(),
            'paging' => [
                'current_page' => $model->currentPage(),
                'per_page' => $model->perPage(),
                'total' => $model->total(),
            ]
        ]);
    }

    public function taskUser(Request $request,$id)
    {
        $ids = UserTask::whereIn('user_id', $id)->pluck('task_id');
        $model = Task::with('users','status', 'creator')->whereIn('id', $ids)->paginate($request->per_page ?? 100);
        return response()->json([
            'success' => true,
            'data' => $model->items(),
            'paging' => [
                'current_page' => $model->currentPage(),
                'per_page' => $model->perPage(),
                'total' => $model->total(),
            ]
        ]);
    }

    public function show(Request $request, $id)
    {
        $model = Task::with('users','status')->where('id', $id)->first();
        if (!$model) {
            return response()->json(['error' => 'Not found'], 404);
        }
        return response()->json([
            'success' => true,
            'data' => $model,
        ]);
    }

    public function store(DepartmentStoreRequest $request)
    {
        try {
            $model = new Task();
            $data = $request->only($model->getFillable());
            $model->fill($data);
            $model->save();
            if ($request->get('users') !== null) {
                $users = json_decode($request->get('users'),true);
                $model->users()->sync($users); 
            }
            if ($request->has('newFiles')) {
                $this->upload($request->file('newFiles'), $model);
            }
            return response()->json(['success' => true, 'data' => $model]);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(['error' => 'Server error'], 500);
        }
    }

    public function upload($files, $document)
    {
        foreach ($files as $file) {
            $path = $file->store('files', 'public');
            $originName = $file->getClientOriginalName();
            $size = $file->getClientsize();
            $attachment = File::create([
                'name' => $originName,
                'path' => $path,
                'size' => $size
            ]);
            $document->files()->save($attachment);
        }
    }

    public function update(DepartmentUpdateRequest $request, $id)
    {
        try {
            $data = $request->toArray();
            $model = Task::where('id', $id)->first();
            if (!$model) {
                return response()->json(['error' => 'Not found'], 404);
            }
            $model->fill($data);
            $model->update();
            if ($request->has('oldFile')){
                $oldFile = json_decode($request->oldFile, true);
                $this->syncFiles($oldFile, $item);
            }
            if ($request->has('newFiles')) {
                $this->upload($request->file('newFiles'), $item);
            }
            return response()->json([
                'success' => true,
                'data' => $model
            ]);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json([
                'success' => false,
                'error' => 'Server error'
            ], 500);
        }
    }

    public function syncFiles($attachment_relations, $document)
    {
        $oldIds = $document->files()->pluck('id')->all();
        $newIds = [];
        foreach ($attachment_relations as $index => $file) {
            array_push($newIds, $file['id']);
        }
        $deleteIds = [];
        foreach ($oldIds as $oldId) {
            if (!in_array($oldId, $newIds)) {
                $deleteIds[] = $oldId;
            }
        }
        $paths = [];
        foreach ($deleteIds as $id) {
            $attachment = File::where('id', $id)->first();
            if ($attachment != null) {
                array_push($paths, $attachment->path);
                $attachment->delete();
            }
        }
        foreach ($paths as $path) {
            Storage::disk('public')->delete($path);
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            User::where('id', $id)->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(['error' => 'Server error'], 500);
        }
    }

    public function search(Request $request)
    {
        $data = $request->toArray();
        $query = Task::query()->with('creator','status','users');
        if (array_key_exists('name', $data)) {
            $query = $query->where('name','LIKE','%'.$data['name'].'%');
        }
        if (array_key_exists('status_id', $data)) {
            $query = $query->where('status_id', intval($data['status_id']));
        }
        if (array_key_exists('department_id', $data)) {
            $query = $query->where('department_id', intval($data['department_id']));
        }
        if (array_key_exists('users', $data)) {
            $users = json_decode($data['users'],true);
            $ids = UserTask::whereIn('user_id', $users)->pluck('task_id');
            $query = $query->whereIn('id', $ids);
        }
        $result = $query->paginate($request->per_page ?? 20);

        return response()->json([
            'success' => true,
            'data' => $result->items(),
            'paging' => [
                'current_page' => $result->currentPage(),
                'per_page' => $result->perPage(),
                'total' => $result->total(),
            ]
        ]);
    }
}
