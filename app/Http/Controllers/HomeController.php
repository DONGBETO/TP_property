<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\User;
use App\Weather;
use Illuminate\Console\View\Components\Warn;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){


        

        $properties = Property::recent()->limit(4)->get();

        // $user = User::first()->password;
        // $user->password = '1111';
        // dd($user->password, $user);

        return view('home', [
            'properties' => $properties,
        ]);
    }
}
