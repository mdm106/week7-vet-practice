<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home extends Controller
{
    public function index()
    {
        $currentHour = date("H"); //to get current hour in 24 hour clock
        $timezone = date("e"); // to set timezone 
        $timeOfDay = "";
        if($currentHour < 12) {
            $timeOfDay="Good Morning";
        } elseif($currentHour < 17) {
            $timeOfDay="Good Afternoon";
        } elseif($currentHour < 22) {
            $timeOfDay="Good Evening";
        } else{
            $timeOfDay="Good Night";
        }
        
        return view("welcome", ["greeting" => $timeOfDay]);
    }
}
