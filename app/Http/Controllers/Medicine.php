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
                $medicine = Medicine_Model::getInstance();
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

    public function Admin_Buy_show(){
        $data = DB::select('select * from medicines where owner = ?',[0]);

        return view('AdminBuy',compact('data'));
    }
    public function Admin_Buy_pay(Request $request){
        $medicine_id=$request->medicine;
        $requested_quantity=$request->reg_Quantity;
        $admin_safe = DB::selectOne('select * from users where  type = ?',[1]);
        $data = DB::selectOne('select * from medicines where owner = ? and id = ?',[0,$medicine_id]);
        $exist = DB::selectOne('select * from medicines where owner = ? and name = ? and brand = ?',[1,$data->name,$data->brand]);
        if($data->quantity>=$requested_quantity){
            $total_price=$data->price*$requested_quantity;
        if($admin_safe->cash>=$total_price ){
            /*here buying happens*/
            if($data->quantity==$requested_quantity){

                if($exist){
                    DB::update('UPDATE medicines SET quantity = ? where id = ? ', [$exist->quantity+$requested_quantity, $medicine_id]);//for medicine
                    DB::delete('delete from medicines where owner = ? and id = ?',[0, $medicine_id]);
                }else {
                    DB::update('UPDATE medicines SET owner = ? where id = ? ', [1, $medicine_id]);//for medicine
                }
            }
            if($data->quantity>$requested_quantity){
                if($exist){
                    DB::update('UPDATE medicines SET quantity = ? where owner = ? ', [$exist->quantity+$requested_quantity, 1]);//for medicine
                    DB::update('UPDATE medicines SET quantity = ? where id = ? ',[$data->quantity-$requested_quantity,$medicine_id]);//for medicine
                }else{
                    DB::update('UPDATE medicines SET quantity = ? where id = ? ',[$data->quantity-$requested_quantity,$medicine_id]);//for medicine
                    $medicine = Medicine_Model::getInstance();
                    $medicine->name = $data->name;
                    $medicine->price = $data->price;
                    $medicine->expire_date = $data->expire_date;
                    $medicine->production_date = $data->production_date;
                    $medicine->brand = $data->brand;
                    $medicine->quantity = $requested_quantity;
                    $medicine->type = $data->type;
                    $medicine->description = $data->description;
                    $medicine->file = $data->file;
                    $medicine->owner = 1;
                    $medicine->owner_id=Auth::user()->id;
                    $medicine->save();
                }


            }
            $new_safe=$admin_safe->cash-$total_price;
        DB::update('UPDATE users SET cash = ? where type = ?',[$new_safe,1]);//for admin

        }else{
            print("there's no enough cash in the safe");
        }

        }else{
            print("there's no enough quantity");
        }
        $data = DB::select('select * from medicines where owner = ?',[0]);

        return view('AdminBuy',compact('data'));
    }

}
