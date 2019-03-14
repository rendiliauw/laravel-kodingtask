<?php


if(!function_exists('task_notif')){

    function taskNotif(){

       $result = DB::table('tasks')->where('due_date',\Carbon\carbon::today())->where('status','UNMARK')->where('deleted_at',NULL)->count();

       return $result;


    }




}