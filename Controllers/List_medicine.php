<?php
/**
 * Created by PhpStorm.
 * User: Emaan
 * Date: 10-Apr-19
 * Time: 2:35 AM
 */

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;




class List_medicine
{
    public function list(){
        $list = DB::select('select * from medicines where owner = ?',[1]);

        return view('listMedicine',compact('list'));

    }

}