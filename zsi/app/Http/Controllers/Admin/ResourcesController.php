<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContentResources;
use Illuminate\Support\Facades\Storage;

class ResourcesController extends Controller
{
    public function index(Request $request)
    {
        $content_resources = ContentResources::latest()->get();
        if(view()->exists('admin.resources.resourcesPage'))
        {
            return view('admin.resources.resourcesPage', ['content_resources'=>$content_resources]);
        }
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'caption' => 'nullable|string|max:255',
            'file' => 'required|file|mimes:pdf,docx,xlsx|max:2048',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Handle file upload
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('resources', 'public');
        } else {
            $filePath = null;
        }

        // Create the resource
        $resource = ContentResources::create([
            'title' => $request->title,
            'caption' => $request->caption,
            'file' => $filePath,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        // Redirect or return response
        return redirect()->route('/admin/resources/')->with('success', 'ContentResources created successfully.');
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'caption' => 'nullable|string|max:255',
            'file' => 'nullable|file|mimes:pdf,docx,xlsx|max:2048',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Find the resource
        $resource = ContentResources::findOrFail($id);

        // Handle file update
         // Handle the file upload
         if ($request->hasFile('file')) {
            // Delete the old file if exists
            if ($resource->file) {
                Storage::disk('public')->delete($resource->file);
            }

            // Store the new file
            $filePath = $request->file('file')->store('resources', 'public');
        } else {
            $filePath = $resource->file;
        }

        $resource->update([
            'title' => $request->title,
            'caption' => $request->caption,
            'file' => $filePath,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        $resource->save();

        // Redirect or return response
        return redirect()->route('/admin/resources/')->with('success', 'ContentResources updated successfully.');
    }

    public function destroy($id)
    {
        // Find the article by ID
        $resource = ContentResources::findOrFail($id);

        // Delete the file file if exists
        if ($resource->file) {
            Storage::disk('public')->delete($resource->file);
        }

        // Delete the resource
        $resource->delete();

        // Redirect or return response
        return redirect()->route('/admin/resources/')->with('success', 'Article deleted successfully.');
    }
}
