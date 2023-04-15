<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use Illuminate\Http\Request;

class RulesController extends Controller
{
    public function rules(){
        $rules = Rule::get();
        return view('static.rules',[
            'rules'=>$rules
        ]);
    }
}
