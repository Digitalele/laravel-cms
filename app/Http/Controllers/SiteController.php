<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SiteController extends Controller
{

    public function getIndex()
    {

    }


    public function getAbout()
    {
        
    }


    public function getContact()
    {
        return view('pages.contact');
    }


    public function postContact()
    {
        
    }
}
