<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderCreationFormRequest;
use App\Http\Requests\OrderUpdatingFormRequest;
use App\Models\Cart;
use App\Models\Item_size;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = Cart::all();
        return response()->json([$carts], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(OrderCreationFormRequest $request)
    {
        $visitor_id =1 ;
        $items = $request->items;
        // var_dump(json_encode($items));
        // die;
        $final_price = $this->calculateFinalPrice($items);
       $cart = Cart::create([
        'visitor_id' => $visitor_id,
        'approved' => false, // Provide a value for the 'approved' field
        'final_price' => $final_price,
        'payed' => false,
        'status' => 'inProgress',
]);

        
        foreach ($items as $item) {

            $cart->orders()->create([
                'cart_id' => $cart['id'],
                'item_size_id' => $item['item_size_id'],
                'quantity' => $item['quantity'],
                'payment' => Item_size::find($item['item_size_id'])['price'],
                'notes' => isset($item['notes']) ? $item['notes'] : '',
            ]);
        }
        return response()->json(['success'], 200);

    }

    private function calculateFinalPrice($items)
    {
        $fPrice = 0;
        foreach ($items as $item) {
            $item_info = Item_size::find($item['item_size_id']);
            $fPrice += $item_info['price'] * $item['quantity'];
        }
        return $fPrice;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($orderId)
    {
        $order = DB::table('carts')
            ->select('carts.*', 'carts.created_at as created', 'orders.*', 'item_sizes.*', 'menu_items.*', 'sizes.*')
            ->join('orders', 'orders.cart_id', '=', 'carts.id')
            ->join('item_sizes', 'item_sizes.id', '=', 'orders.item_size_id')
            ->join('menu_items', 'menu_items.id', '=', 'item_sizes.menu_item_id')
            ->join('sizes', 'sizes.id', '=', 'item_sizes.size_id')
            ->where('carts.id', '=', $orderId)
            ->get();
        $orderInfo = array(
            'cartId' => $order[0]->id,
            'visitorId' => $order[0]->visitor_id,
            'status' => $order[0]->status,
            'time' => $order[0]->created,
            'final_price' => $order[0]->final_price
        );

        foreach ($order as $data) {
            $orderInfo['products'][] = array(
                'menu_item_id' => $data->menu_item_id,
                'name' => $data->name,
                'image' => $data->image,
                'quantity' => $data->quantity,
                'size' => $data->size
            );
        }
        if (!$orderInfo)
            return response()->json(['Order Not Found'], 404);
        return $orderInfo;
    }



    public function update(OrderUpdatingFormRequest $request, $orderId)
    {
        $cart = Cart::find($orderId);
        $items = $request->items;

        if (!$cart)
            return response()->json(['Order Not Found'], 404);

        if ($cart['status'] != 'inProgress')
            return response()->json(['Order Not Allowed to updating'], 400);


        if (Auth::id() !=  $cart->user_id){
                return response()->json(['AccessDenied'], 403);
            }

        $cart->orders()->delete();
        $final_price = $this->calculateFinalPrice($items);
        $cart->update([
            'final_price' => $final_price,
            'status' => 'Panding',

        ]);


        foreach ($items as $item) {

            $cart->orders()->create([
                'cart_id' => $cart['id'],
                'item_size_id' => $item['item_size_id'],
                'quantity' => $item['quantity'],
                'payment' => Item_size::find($item['item_size_id'])['price'],
                'notes' => isset($item['notes']) ? $item['notes'] : '',
            ]);
        }
        return response()->json(['success'], 200);


    }

}