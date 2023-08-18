<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Menu_item;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Favourite;

class FavouriteController extends Controller
{
    public function index()
    {
        return response()->json(['favourites' => Favourite::query()->get()]);
    }

    public function show($id)
    {
        $favourites = Favourite::query()
            ->where('user_id', '=', $id)->get();
            foreach($favourites as $fav){
                $fav['name']=Menu_item::findOrFail($fav->menu_item_id)->name;
                $fav['image']=Menu_item::findOrFail($fav->menu_item_id)->image;
            }
        return response()->json([
            'favourites'=>$favourites,
        ],200);
    }

    public function store(Request $request){
        $request->validate([
            'menu_item_id' => ['required', 'exists:menu_items,id'],
        ]);
        $user = auth()->user();
        //$user_id = json_decode($user, true)["id"];
        $user_id = $user->id;

        $favourite = Favourite::query()->create([
            'menu_item_id' => $request->menu_item_id,
            'user_id' => $user_id
        ]);
        if ($favourite->save()) {
            return response()->json($favourite)->setStatusCode(200);
        } else {
            return response()->json(['message' => 'Store Failed']);
        }

    }

    public function destroy($id): JsonResponse
    {
        $favourite = Favourite::query()->where('menu_item_id',$id)->delete();
        if($favourite) return response()->json()->setStatusCode(200);
        else  return response()->json(['message'=>'Delete Failed']);
    }
}
