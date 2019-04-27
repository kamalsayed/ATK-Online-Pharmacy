<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine_Model extends Model
{
    public static  $instance;

    public static function  getInstance(){
        if(empty(Medicine_Model::$instance)){
            Medicine_Model::$instance=new Medicine_Model();
        }
        return Medicine_Model::$instance;
    }
    Protected $table='medicines';
    Protected $Key = 'id';

}
