<?php

namespace App\Http\Controllers;

use App\feed_back;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class feedback extends Controller
{
    public function  fb_view(){
        return view('contactus');
    }
    public function  give_Feedback(Request $request){
        $this->validate($request, [
            'country'=>'required',
            'subject'=>'required|min:3|max:50',
            'message'=>'required|min:10',
        ]);
    $feedback=feed_back::getInstance();
    $feedback->name=Auth::user()->name;
    $feedback->email=Auth::user()->email;
    $feedback->country=$request->country;
    $feedback->subject=$request->subject;
    $feedback->message=$request->message;
    $feedback->save();
    return $this->fb_view();
    }
    public function list_Feedback(){
    $data=DB::select('select * from feedback');
    return view('list_feedback',compact('data'));
    }






}
