<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Add_V extends Model
{
    public static  $instance;

    public static function  getInstance(){
        if(empty(Add_V::$instance)){
            Add_V::$instance=new Add_V();
        }
        return Add_V::$instance;
    }
    Protected $table='users';
    Protected $Key = 'id';
}
