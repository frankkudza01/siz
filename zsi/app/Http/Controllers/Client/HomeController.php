<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\ContentResources;
use App\Models\Courses;
use App\Models\Events;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Fetch the latest 3 records from the database
        $articles = Articles::latest()->take(3)->get();
        $resources = ContentResources::latest()->take(3)->get();
        $courses = Courses::latest()->take(3)->get();
        $events = Events::latest()->take(3)->get();
        if(view()->exists('client.home.homePage'))
        {
            return view('client.home.homePage', [
                'articles' => $articles,
                'resources' => $resources,
                'courses' => $courses,
                'events' => $events,
            ]);
        }
    }
}
