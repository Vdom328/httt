<?php

namespace App\Http\Controllers;

use App\Property;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function index(){
        return view('information.home');
    }
    public function listHome(){
        $properties = Property::all();
        return response()->json($properties);
    }
    

}
