<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class feed_back extends Model
{
    public static  $instance;

    public static function  getInstance(){
        if(empty(feed_back::$instance)){
            feed_back::$instance=new feed_back();
        }
        return feed_back::$instance;
    }
    Protected $table='feedback';
    Protected $Key = 'id';
}
