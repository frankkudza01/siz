<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Articles;
class ArticlesController extends Controller
{
    public function index(Request $request)
    {
        $articles = Articles::latest()->get();
        // Calculate counts for each category
        $categories = [
            'Surveying Techniques' => 0,
            'GIS Applications' => 0,
            'Remote Sensing Insights' => 0,
            'Geospatial Technology' => 0,
            'Engineering Practices' => 0,
        ];

        foreach ($articles as $article) {
            if (array_key_exists($article->category, $categories)) {
                $categories[$article->category]++;
            }
        }

        if(view()->exists('client.articles.articlesPage'))
        {
            return view('client.articles.articlesPage', ['articles'=>$articles, 'categories'=>$categories]);
        }
    }
}
