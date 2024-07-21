<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContentResources;

class AboutController extends Controller
{
    public function overview(Request $request)
    {
        $resources = ContentResources::latest()->get();
        if(view()->exists('client.about.aboutPage'))
        {
            return view('client.about.aboutPage', ['resources'=>$resources]);
        }
    }
}
