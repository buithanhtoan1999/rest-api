<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
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
