<?php

namespace App\Http\Controllers;

use App\Medicine_Model;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Session;

class Medicine extends Controller
{
    public function index(){
        return view('AddMedicine');
    }

    public function store(Request $request){
            try {
                $medicine = new Medicine_Model();
                $medicine->name = $request->Name;
                $medicine->price = $request->Price;
                $medicine->expire_date = $request->Expire;
                $medicine->production_date = $request->Production;
                $medicine->brand = $request->Brand;
                $medicine->quantity = $request->Quantity;
                $medicine->type = $request->type;
                $medicine->description = $request->Description;
                $medicine->file = $request->file('file');
                $medicine->owner = 0;
                $medicine->owner_id=Auth::user()->id;
                $medicine->save();
                return view('layout.VendorInterface');
            }catch (\Exception $e){
                report($e);
                return "Error !" .$e;
            }

    }//end store (add medicine)

    public function Admin_Buy(){
        $data = DB::select('select * from medicines where owner = ?',[0]);

        return view('AdminBuy',compact('data'));
    }



}
