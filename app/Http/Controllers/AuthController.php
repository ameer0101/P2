<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules\Password as password_rule;
use Illuminate\Http\JsonResponse;
use App\Models\Menu_item;
use App\Models\Rate;

class AuthController extends Controller
{
    function search_by_name($name){
        return Menu_item::where('name','like','%'.$name.'%')->get();
    }
    function rate(Request $request, $id){
        $request->validate([
            'stars' => ['integer', 'required', 'max:5', 'min:1']
        ]);
        $user = auth()->user();
        $user_id = $user->id;
        $check = Rate::query()
            ->where('user_id', '=', $user_id)
            ->where('menu_item_id', '=', $id)->first();
        if($check !== null){if($check->exists()){
            $check->update([
                'stars' => $request['stars']
            ]);
        }}
        else{
            Rate::query()->create([
                'stars' => $request['stars'],
                'menu_item_id' => $id,
                'user_id' => $user_id
            ]);}
            
        
        
        //$menu_item = Menu_item::query()->find($id);
        //$stars =  ($menu_item['stars'] + $request['stars']) / 2;
       // $menu_item->stars = $stars;
       // $menu_item->save();
       return response()->json(['success' => ' successfully']);
    }
    public function userRegister(Request $request): JsonResponse{
        $request->validate([
            'name' => ['required', 'max:55', 'string'],
            'email' => ['email', 'required', 'unique:users'],
            'image'=> ['image','mimes:jpeg,png,bmp,jpg'],
            'phone' => [ 'min:9', 'max:10', 'unique:users'],
            'password' => [
                'required',
                'confirmed',
                password_rule::min(8)->
                mixedCase()->
                numbers()->
                symbols()
            ]
        ]);
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        if( $request->file('image') != null)
        {
        $file_extintion = $request->file('image') ->getClientOriginalExtension();
        $file_name = time().'.'.$file_extintion;
        $path = 'UserImages';
        $request ->file('image')-> move($path,$file_name);
        $input['image']= $file_name;
        }
        $user = User::query()->create($input);
        $accessToken = $user->createToken('MyApp')->accessToken;
        return response()->json([
            'user' => $user,
            'access_token' => $accessToken
        ]);
    }
    public function Login(Request $request){
        $loginData = $request->validate([
            'email' => 'email|required|exists:users',
            'password' => 'required',
            'role' => 'required'
        ]);
        $credentials = request(['email', 'password', 'role']);
        if (auth()->attempt($credentials))
        {
            $token = auth()->user()->createtoken('MyApp')->accessToken;
            return response(['user' => auth()->user(), 'token' => $token]);
        }
        else {
            return response()->json(['errors' => ['UnAuthorized']], 401);
        }
    }
    public function Logout(Request $request){
        $request->user()->token()->revoke();
        return response()->json(['success' => 'logged out successfully']);
    }
    
}
