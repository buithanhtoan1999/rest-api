<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\OrderItem;
use App\Models\Product;

class OrderItemController extends Controller
{
    public function index(Request $request)
    {
        $pagination = OrderItem::paginate($request->per_page ?? 20);
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
        $model = OrderItem::where('id', $id)->first();
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
            $model = new OrderItem();
            $data = $request->only($model->getFillable());
            $product = Product::where('id', $data['product_id'])->first();
            if (!$product) {
                return response()->json(['error' => 'Not found'], 404);
            }
            if($product['quantity'] - $data['count'] >= 0) {
                $product->fill([
                    'quantity' => $product['quantity'] - $data['count'],
                ]);
                $product->update();

                $model->fill($data);
                $model->save();
            } else {
                return response()->json(['error' => 'Sản phẩm đã hết hàng']);
            }
            return response()->json(['success' => true, 'data' => $model]);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(['error' => 'Server error'], 500);
        }
    }

    public function report(Request $request) {


        $topSell = OrderItem::query()
            ->selectRaw('SUM(count) as total, products.name')->join('products', 'orderItems.product_id', '=','products.id')
            ->groupBy('product_id')->orderBy('total', 'desc')->limit(3)
            ->get()->toArray();

        $data = $request->toArray();
        $product_id = $data['product_id'];

        $last6Months = [];
        for($i = 6; $i >= 0; $i--) {
            $last6Months[] = [
                'month' => Carbon::now()->subDays($i)->day,
                'value' => 0
            ];
        }

        $commission = OrderItem::query()
            ->where('product_id', $product_id)
            ->where("created_at",">", Carbon::now()->subDay(7))
            ->selectRaw('DAY(created_at) as day, SUM(count) as total')
            ->groupBy(DB::raw('DAY(created_at)'))
            ->get()->toArray();

        $recentCommission = $last6Months;

        foreach($commission as $comm) {
            foreach($recentCommission as $idx => $month) {
                if ($comm['day'] === $month['month']) {
                    $recentCommission[$idx] = [
                        'month' => $month['month'],
                        'value' => $comm['total']
                    ];
                }
            }
        }

        $total = OrderItem::query()
            ->selectRaw('DAY(created_at) as day, SUM(count) as total')
            ->groupBy(DB::raw('DAY(created_at)'))
            ->get()->toArray();


        return response()->json([
            'success' => true,
            'data' => $recentCommission,
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->toArray();
            $model = OrderItem::where('id', $id)->first();
            if (!$model) {
                return response()->json(['error' => 'Not found'], 404);
            }
            $model->fill($data);
            $model->update();
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

    public function destroy(Request $request, $id)
    {
        try {
            OrderItem::where('id', $id)->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(['error' => 'Server error'], 500);
        }
    }
}
