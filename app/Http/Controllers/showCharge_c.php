<?php
/**
 * Created by PhpStorm.
 * User: Emaan
 * Date: 11-Apr-19
 * Time: 7:48 AM
 */

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\DB;

class showCharge_c
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function index()
    {
        return view('showCharge');

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
//

    /**
     *
     */
    public function showCharge()
    {
        $id = Auth::user()->id;
        try {
            $charge = DB::table('users')->where('id',$id)->select('cash')->get();

            return view('showCharge', compact('charge'));
        }
        catch (\Exception $e){
            report($e);
            echo ("Error !" .$e);
        }

}
}