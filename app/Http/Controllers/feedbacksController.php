<?php

namespace App\Http\Controllers;
use App\Models\feed_back;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class feedbacksController extends Controller
{
    public function add(Request $req){
        $validated_item = $req->validate([
            "comment" => "required",
            "user_id" => "required|exists:users,id" 
         ]);
         
         $feedback = new feed_back();
         $feedback->user_id = $validated_item['user_id'];
         $feedback->comment = $validated_item['comment'];
         $feedback->date = now(); // Set the current timestamp
     
        $feedback->save();
        return response()->json(["message"=>"succeded"], 200);
    }
    public function Modify(Request $req,$id){
        $validated_item = $req->validate([
            "comment"=>"required",
            "id"=>"required"
        ]);
        $feedback=feed_back::where('id',$req->id)->first();
        $feedback->comment=$req->comment;
        $feedback->save();
        return response()->json(["message"=>"succeded"], 200);
    }
    public function delete(Request $req){
        $validated_item = $req->validate([
            "id"=>"required"
        ]);
        $feedback=feed_back::where('id',$req->id)->first();
        if($feedback->user_id == $req->user_id  || $req->query('role') == 'admin'){
            $feedback->delete();
            return response()->json(["message"=>"succeded"], 200);
        }
        else{
              return response()->json(["message"=>"not auth"], 401);
        }
    }
}
