<?php

namespace App\Http\Controllers;

use App\Add_V;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AddVendor_C extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('AddVendor');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $this->validate($request,[
           'reg_name'=>'required|min:3|max:20'
            ,'reg_email'=>'required'
            ,'reg_password'=>'required|min:6|max:20'
        ]);

        try {
            $user = Add_V::getInstance();
            $user->name = $request->reg_name;
            $user->type = 3;
            $user->email = $request->reg_email;
            if ($request->reg_password == $request->reg_password_confirm) {
                $user->password = Hash::make($request->reg_password);
            } else {
                return view('layout.AdminInterface');
                //return '<ul class="list-group"><li class="list-group-item">"Check that password is typically like confirm password !"</li></ul>';

            }
            $now = Carbon::now();
            $user->email_verified_at = $now;
            $user->created_at = $now;
            $user->updated_at = $now;
            $user->remember_token = 'vendor';
            $user->save();
           // print ('<ul class="list-group"><li class="list-group-item">Sucsessfully Added</li></ul>');
            return view('layout.AdminInterface');

        }
        catch (Exception $e){
            report($e);
            return '<ul class="list-group"><li class="list-group-item">"Error!! try another email!"</li></ul>';
            return view('layout.AdminInterface');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return " this is the show ".$id;
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

    public function Add_vendor(){

        return view('AddVendor');
    }
}
