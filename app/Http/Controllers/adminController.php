<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Admin;

class adminController extends Controller
{
    public function create()
    {
        return view('admin.AltaAdmin'); 
    }

}
