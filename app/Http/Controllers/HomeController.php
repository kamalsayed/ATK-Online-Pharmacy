<?php

namespace App\Http\Controllers;

#use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
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

    public function generatePDF()
    {

        ob_start();
        require view('Report'); // the one you posted in your question
        $html = ob_get_clean();
        $data = ['title' => 'This is the final report'];
        $pdf = PDF::loadHTML($html, $data);

     return $pdf->stream();
    }
    public  function showReport(){
        $sellers=DB::select('Select s.name , m.owner_id from users s , medicines m where s.id = m.owner_id and m.owner = ? group by s.name,m.owner_id ',[0]);
        $most= DB::table('medicines')->where('owner','=',2)->select('name')->get();
        #$most = DB::select('SELECT name from medicines where owner = ? GROUP BY quantity DESC',[2]);
        $best = DB::select('SELECT name from users s where s.id in (SELECT owner_id from (SELECT max(quantity),count(*) ,owner_id from medicines m WHERE owner = ? GROUP by owner_id DESC) as n)',[2]);
        return view('Report',compact('sellers','most','best'));
    }


}
