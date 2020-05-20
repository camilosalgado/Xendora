<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarteraController extends Controller
{
    //

    public function index()
    {
        return view('layouts.moduls.cartera');
    }

}
