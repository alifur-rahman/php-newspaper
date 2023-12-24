<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomArtisanController extends Controller
{
    function dynamicArtisanCommend($commend){
       $result = \Artisan::call($commend);
        if($result == 0){
            return redirect('admin?success');
        }
        else{
            return "Worng Commend! Try Again";
        }

    }
}
