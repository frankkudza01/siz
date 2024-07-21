<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        if(view()->exists('client.contact.contactPage'))
        {
            return view('client.contact.contactPage');
        }
    }
}
