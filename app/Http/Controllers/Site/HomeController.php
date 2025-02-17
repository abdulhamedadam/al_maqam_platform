<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function search(){
        return view('mobile.search');
    }

    public function messages(){
        return view('mobile.messages');
    }

    public function contact(){
        return view('mobile.contact');
    }

    public function terms(){
        return view('mobile.terms');
    }

    public function privacy(){
        return view('mobile.privacy');
    }

    public function found(){
        return view('mobile.found');
    }
}
