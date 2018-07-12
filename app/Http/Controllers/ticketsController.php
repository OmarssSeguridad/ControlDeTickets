<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ticketsController extends Controller
{
    public function create(){
    	return view('admin.altaTicket');
    }
}
