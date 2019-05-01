<?php
/**
 * Created by PhpStorm.
 * User: Emaan
 * Date: 29-Apr-19
 * Time: 6:43 AM
 */

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;
class delete
{

    public function index()
    {
        return view('delete/{id}');
    }

    public function delete( $id)
    {
        try {

            $user = User::find($id);
            $user->delete();
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