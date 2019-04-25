<?php
/**
 * Created by PhpStorm.
 * User: Emaan
 * Date: 10-Apr-19
 * Time: 2:42 AM
 */

namespace App\Http\Controllers;
use App\add_sys_medicine;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class admin_buy_c extends Controller
{
    public function index()
    {
        return view('buyMedicine');

    }

    public function store(Request $request)
    {
        echo ("ff");

       // return $request->all();
        $this->validate($request,[
            'medicine'=>'required'
            ,'reg_Quantity'=>'required'

        ]);

        try {
            $medici = DB::table('medicines')
             ->where('name','dawa2')
             ->where ('owner',0)
             ->post();
            $now = Carbon::now();


            $medicine = new add_sys_medicine();
            $medicine->name = "dawa4";

            $medicine->expire_date = $medici[0]->expire_date;
            $medicine->price = $medici[0]->price;
            $medicine->production_date = $medici[0]->Production;
            $medicine->brand = $medici[0]->Brand;
            $medicine->quantity = 50;
            $medicine->type = $medici[0]->type;
            $medicine->description = $medici[0]->Description;
            $medicine->file = $medici[0]->file;
            $medicine->owner = 1;
            $medicine->owner_id= 1;
            $medicine->save();
//            $now = Carbon::now();
//            $medicine->expire_date = $now;
//            $medicine->price = 95.5;
//            $medicine->production_date = $now;
//            $medicine->brand = "koko";
//            $medicine->quantity = $request->reg_Quantity;
//            $medicine->type = "kp";
//            $medicine->description = "kjklddl";
//            $medicine->owner = 1;
//            $medicine->owner_id= 1;
//            $medicine->save();
            // print ('<ul class="list-group"><li class="list-group-item">Sucsessfully Added</li></ul>');
//            return view('layout.AdminInterface');

        }
        catch (\Exception $e){
            report($e);
            echo ("Error !" .$e);
        }


    }

}
