<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\Tags;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    public function index(Request $request)
    {
        $articles = Articles::with('tags')->get();
        if(view()->exists('admin.articles.articlesPage'))
        {
            $articles = Articles::with('tags')->get();
            return view('admin.articles.articlesPage', ['articles'=>$articles]);
        }
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'theme' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'tags' => 'nullable|array',
            'tags.*' => 'string|max:255'
        ]);

        // Handle the file upload
        if ($request->hasFile('theme')) {
            $themePath = $request->file('theme')->store('themes', 'public');
        } else {
            $themePath = null;
        }

        // Create the article
        $article = Articles::create([
            'title' => $request->title,
            'theme' => $themePath,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        // Attach the tags to the article
        if ($request->has('tags')) {
            $tags = [];
            foreach ($request->tags as $tagTitle) {
                $tag = Tags::firstOrCreate(['title' => $tagTitle]);
                $tags[] = $tag->id;
            }
            $article->tags()->attach($tags);
        }

        // Redirect or return response
        return redirect()->route('/admin/articles/')->with('success', 'Article created successfully.');
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'theme' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'tags' => 'nullable|array',
            'tags.*' => 'string|max:255'
        ]);

        // Find the article by ID
        $article = Articles::findOrFail($id);

        // Handle the file upload
        if ($request->hasFile('theme')) {
            // Delete the old theme if exists
            if ($article->theme) {
                Storage::disk('public')->delete($article->theme);
            }

            // Store the new theme
            $themePath = $request->file('theme')->store('themes', 'public');
        } else {
            $themePath = $article->theme;
        }

        // Update the article
        $article->update([
            'title' => $request->title,
            'theme' => $themePath,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        // Sync the tags
        if ($request->has('tags')) {
            $tags = [];
            foreach ($request->tags as $tagTitle) {
                $tag = Tags::firstOrCreate(['title' => $tagTitle]);
                $tags[] = $tag->id;
            }
            $article->tags()->sync($tags);
        }

        // Redirect or return response
        return redirect()->route('/admin/articles/')->with('success', 'Article updated successfully.');
    }

    public function destroy($id)
    {
        // Find the article by ID
        $article = Articles::findOrFail($id);

        // Delete the theme file if exists
        if ($article->theme) {
            Storage::disk('public')->delete($article->theme);
        }

        // Delete the article
        $article->delete();

        // Redirect or return response
        return redirect()->route('/admin/articles/')->with('success', 'Article deleted successfully.');
    }


}

