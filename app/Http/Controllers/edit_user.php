<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use vendor\project\StatusTest;

class edit_user extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= DB::select('select * from users where type !=?',[1]);
        return view('Edit_User',compact('users'));
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
    public function edit(Request $request)
    {
        $this->validate($request,[
            'reg_name'=>'required|min:3|max:20'
            ,'reg_email'=>'required'
            ,'reg_password'=>'required|min:6|max:20'
        ]);
        $password = Hash::make($request->reg_password);
        DB::update('update users set name=? , email=? , password=?  where id = ?',[$request->reg_name,$request->reg_email,$password,$request->add]);
        return $this->index();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        if($request->type=="del"){
            DB::delete('Delete from users where email = ?',[$request->reg_email]);
            return $this->index();
        }
        elseif($request->type=="update"){
            $old=DB::selectOne('select * from users where email = ?',[$request->reg_email]);
            return view('Update_User',compact('old'));
        }

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
}
