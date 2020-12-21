<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\UserTask;
use App\Models\File;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $pagination = Product::with('category')->paginate($request->per_page ?? 23);
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

    public function show(Request $request, $id)
    {
        $model = Product::with('category')->where('id', $id)->first();
        if (!$model) {
            return response()->json(['error' => 'Not found'], 404);
        }
        return response()->json([
            'success' => true,
            'data' => $model,
        ]);
    }

    public function store(Request $request)
    {
        try {
            $model = new Product();
            $data = $request->only($model->getFillable());
            $model->fill($data);
            $model->save();
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

    public function update(Request $request, $id)
    {
        try {
            $data = $request->toArray();
            $model = Product::where('id', $id)->first();
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
            Product::where('id', $id)->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(['error' => 'Server error'], 500);
        }
    }

    public function search(Request $request)
    {
        $data = $request->toArray();
        $query = Product::query()->with('creator','status','users');
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
