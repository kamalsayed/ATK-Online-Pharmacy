<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class showCharge_c extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('showCharge');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public  function  vendor_show(){
        $cash = DB::selectone('select * from users where id = ? ',[Auth::user()->id]);
        return view('Vendor_getCharge',compact('cash'));
    }
    public function  vendor_collect(){
        DB::update('update users set cash = ? where id =? ',[0,Auth::user()->id]);
        return $this->vendor_show();
    }
    public function showCharge()
    {
        $id = Auth::user()->id;
        try {
            $charge = DB::table('users')->where('id',$id)->select('cash')->get();
            return view('/showCharge', compact('charge'));
        }
        catch (\Exception $e){
            echo ("Error !" .$e);
            report($e);

        }
    }
    public function charge(Request $request){
    $user = DB::selectOne('Select * from users where id = ?',[Auth::user()->id]);
    $new = $user->cash + $request->reg_charge;
    DB::update('Update users set cash = ? where id = ?',[$new,Auth::user()->id]);
        $charge = DB::table('users')->where('id',Auth::user()->id)->select('cash')->get();
        return view('/showCharge', compact('charge'));
    }
}
