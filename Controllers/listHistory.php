<?php
/**
 * Created by PhpStorm.
 * User: Emaan
 * Date: 29-Apr-19
 * Time: 3:44 AM
 */


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class listHistory
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('listHistory');
    }
    public function  listHistory()
    {
        $id = Auth::user()->id;
        try {
            $med = DB::table('medicines')
                ->where('owner', 2)
                ->where('owner_id', $id)
                ->select('name', 'quantity')
                ->get();
            return view('listHistory', compact('med'));
        }
        catch (\Exception $e){
            report($e);
            echo ("Error !" .$e);
        }
    }

}