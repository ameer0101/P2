<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu_item;
use App\Models\Category;
use App\Models\Item_size;
use App\Models\Size;
use App\Models\Discount_item;
use App\Models\Discount;
use App\Models\Feed_back;


class MenuController extends Controller
{
    public function showMenu(Request $request){
        if($request->query('role') == 'admin')
        $menu = Menu_item::all();
        else
        $menu = Menu_item::where('hidden',false)->get();
        foreach($menu as $item){
            $item['category'] = Category::find($item->category_id)->first()->name;
            $item['sizes'] = $item->sizes()->pluck('price','size_id');
            $discount = Discount_item::where('menu_item_id',$item->id)->where('valid',true)->first();
            $item['discount'] = ['value'=>intval($discount?->discount_id)*5,'duaration'=>$discount?->duration];
            $rates = $item->rates;
            $sum = 0;
            foreach($rates as $rate){
                $sum += $rate?->stars;
            }
            if($sum ==  0)
            $item['final_rate'] = 0;
            else
            $item['final_rate'] = number_format($sum / $rates->count(), 1);
            $menu->makeHidden('rates');
            
            if($request->query('role') == 'admin')
            $item['favourite_by'] = $item->favourites()->count();
        }
        return response()->json(['menu'=>$menu],200);
    }
    public function addItem(Request $request){
        $validated_item = $request->validate([
            'name'=>'required|string|unique:menu_items',
            'description'=>'required|string',
            'category_id'=>'required',
            'image'=>'required|file|mimes:png,jpg,bmp',
            'sizes'=> 'required|array|min:1',
            'prices'=>'required|array|min:1',
            'discount'=>'integer',
            'duration'=>'date'
        ]);
        //image
        $image = $request->file('image');
        $item_image = time().$image->getClientOriginalName();
        $image->move(public_path('Menu_Images'),$item_image);
        $item_image = 'Menu_Images/'.$item_image;
        $validated_item["image"] = $item_image;
        $item = Menu_item::create($validated_item);
        //sizes and prices
        $sizes = $request->sizes;
        $prices = $request->prices;
        $i=0;
        foreach($sizes as $size){
            Item_size::create([
                'size_id'=> $size,
                'menu_item_id' => $item->id,
                'price'=>$prices[$i]
            ]);
            $i+=1;
        }
        //discounts
        if($request->has('discount') && $request->has('duration')){
            Discount_item::create([
                'discount_id' => intval($request->discount)/5,
                'duration'=> $request->duration,
                'menu_item_id'=>$item->id,
                'valid'=>true
            ]);
        }
        return response()->json([
            'message' => 'item created successfully',
            'item'=>$item
        ],200);
    }
    public function editPrice(Menu_item $item,Request $request){
        $validated = $request->validate([
            'price'=>'required|numeric'
        ]);
        $items = Item_size::where('size_id',$request->query('size_id'))->where('menu_item_id',$item->id)->first()->update($validated);
        return response()->json([
            'message'=>'item updated Successfully',
        ]);
    }
    //
   /* public function submitFeedback(Request $request)
{
    $request->validate([
        'feedback' => 'required',
    ]);

    $feedback = new Feed_back();
    $feedback->user_id = auth()->user()->id;
    $feedback->menu_item_id = $request->input('menu_item_id');
    $feedback->feedback = $request->input('feedback');
    $feedback->save();

    return response()->json(['message' => 'Thank you for your feedback!']);
}*/
}
