<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;

class CourcesController extends Controller
{
    public function index(Request $request)
    {
        $courses = Courses::latest()->get();
        $courseCounts = Courses::selectRaw('category, COUNT(*) as count')
        ->groupBy('category')
        ->pluck('count', 'category')
        ->all();
        if(view()->exists('client.cources.CourcesPage'))
        {
            return view('client.cources.CourcesPage', ['courses'=>$courses, 'courseCounts'=>$courseCounts]);
        }
    }
}
