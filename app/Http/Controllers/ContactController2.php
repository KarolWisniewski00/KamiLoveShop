<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController2 extends Controller
{
    public function index()
    {
        return view('client.saco.contact.index');
    }
}
