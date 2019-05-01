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
    public function vendor_list(){
        $data = DB::select('select * from medicines where owner_id = ? ',[Auth::user()->id]);
        return view('vendorList',compact('data'));
    }

    public function index(){
        return view('AddMedicine');
    }

    public function store(Request $request){
            try {
                $this->validate($request, [
                    'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'Name' => 'required|max:10|min:3',
                    'Price'=>'required',
                    'Expire'=>'required',
                    'Production'=>'required',
                    'Quantity'=>'required',
                    'type'=>'required',
                    'Description'=>'required',
                    'Brand'=>'required'

                ]);
                $medicine = Medicine_Model::getInstance();
                $medicine->name = $request->Name;
                $medicine->price = $request->Price;
                $medicine->expire_date = $request->Expire;
                $medicine->production_date = $request->Production;
                $medicine->brand = $request->Brand;
                $medicine->quantity = $request->Quantity;
                $medicine->type = $request->type;
                $medicine->description = $request->Description;

                $image = $request->file('file');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('imgs');
                $image->move($destinationPath, $name);
               # $this->save();
                $medicine->file ="imgs/".$name;
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
                    DB::update('UPDATE medicines SET quantity = ? where owner_id = ? ', [$exist->quantity+$requested_quantity,Auth::user()->id ]);//for medicine
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
        /*update cash
        for vendor*/
        $vendor=DB::selectOne('select * from users where id = ?',[$data->owner_id]);
        $new_charge = $total_price + $vendor->cash;
        DB::update('update users set cash = ? where id = ?',[$new_charge,$vendor->id]);
        }else{
            print("there's no enough cash in the safe");
        }

        }else{
            print("there's no enough quantity");
        }
        $data = DB::select('select * from medicines where owner = ?',[0]);

        return view('AdminBuy',compact('data'));
    }
    public function Admin_list(){
        $list = DB::select('select * from medicines where owner = ?',[1]);
        return view('listMedicine',compact('list'));
    }
    public function Show_medicine_card(){
        $display=DB::select('SELECT * FROM medicines where owner =?',[1]);
        return view('/Medicines',compact('display'));
    }

    public function Client_buy(Request $req){
        $quantity = $req->reg_Quantity;
        $medicine_id = $req->buy;
        $med= DB::selectOne('select * from medicines where id =? ',[$medicine_id]);
        $client = DB::selectOne('select * from users where id =? ',[Auth::user()->id]);
        $exist=DB::selectOne('select * from medicines where owner_id = ? and name = ? and brand = ?',[$client->id,$med->name,$med->brand]);
        if($client->cash>=($med->price * $quantity)){
            if($med->quantity>=$quantity){
                if($med->quantity==$quantity){
                    if($exist){
                        DB::update('UPDATE medicines SET quantity = ? where owner_id = ? ', [$exist->quantity+$quantity, Auth::user()->id]);//for medicine
                        DB::delete('delete from medicines where owner = ? and id = ?',[1,$medicine_id]);

                    }else{
                        DB::update('UPDATE medicines SET owner = ? and owner_id = ? where id = ? ', [2,Auth::user()->id,$medicine_id]);//for medicine
                    }
                }
                if($med->quantity>$quantity){
                    if($exist){
                        DB::update('UPDATE medicines SET quantity = ? where owner = ? and owner_id = ? ', [$exist->quantity+$quantity, 2,Auth::user()->id]);//for medicine
                        DB::update('UPDATE medicines SET quantity = ? where id = ? ',[$med->quantity-$quantity,$medicine_id]);//for medicine
                    }else {
                        DB::update('UPDATE medicines SET quantity = ? where id = ? ', [$med->quantity - $quantity, $medicine_id]);//for medicine
                        $medicine = Medicine_Model::getInstance();
                        $medicine->name = $med->name;
                        $medicine->price = $med->price;
                        $medicine->expire_date = $med->expire_date;
                        $medicine->production_date = $med->production_date;
                        $medicine->brand = $med->brand;
                        $medicine->quantity = $quantity;
                        $medicine->type = $med->type;
                        $medicine->description = $med->description;
                        $medicine->file = $med->file;
                        $medicine->owner = 2;
                        $medicine->owner_id = Auth::user()->id;
                        $medicine->save();
                    }
            }

        }else{
            print ('no enough quantity x.x ');
            }
            $admin = DB::selectOne('select * from users where type = ?',[1]);
            DB::update('update users set cash = ? where type = ?',[$admin->cash +($med->price * $quantity) ,1]);
            DB::update('update users set cash = ? where id = ?',[$client->cash-($med->price * $quantity),$client->id]);
        }else{
            print ('no enough cash $_$ ');
        }
        return $this->Show_medicine_card();
    }


}
