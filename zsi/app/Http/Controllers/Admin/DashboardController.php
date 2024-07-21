<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Articles;
use App\Models\Events;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $courses = Courses::all()->count();
        $articles = Articles::all()->count();
        $events = Events::all()->count();
        if(view()->exists('admin.dashboard.dashboardPage'))
        {
            return view('admin.dashboard.dashboardPage', ['courses'=>$courses,'articles'=>$articles, 'events'=>$events]);
        }
    }
}
