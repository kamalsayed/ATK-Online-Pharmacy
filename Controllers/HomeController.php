<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $name = Auth::user()->name;
        $type = Auth::user()->type;
        session(['name'=>$name]);
        session(['email'=>Auth::user()->email]);
        if($type==1){
            session(['type'=>'admin']);
            return view('layout.AdminInterface');
        }elseif($type==2){
            session(['type'=>'client']);
            return view('layout.ClientInterface');
        }elseif($type==3){
            session(['type'=>'vendor']);
            return view('layout.VendorInterface');
        }

    }
}
