<?php
/**
 * Created by PhpStorm.
 * User: Emaan
 * Date: 29-Apr-19
 * Time: 5:09 AM
 */

namespace App\Http\Controllers;


use http\Env\Request;
use Illuminate\Support\Facades\DB;

class DeleteUser
{
    public function index()
    {
        return view('DeleteUser');

    }
    public function getUser()
    {
        try {
            $del = DB::table('users')
                ->select('id','name', 'type')
                ->get();
            return view('DeleteUser', compact('del'));
        }
        catch (\Exception $e){
            report($e);
            echo ("Error !" .$e);
        }
    }

}