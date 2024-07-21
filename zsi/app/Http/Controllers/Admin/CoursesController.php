<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Attachments;
use Illuminate\Support\Facades\Storage;

class CoursesController extends Controller
{
    public function index(Request $request)
    {
        $courses = Courses::latest()->get();
        if(view()->exists('admin.courses.coursesPage'))
        {
            return view('admin.courses.coursesPage', ['courses'=>$courses]);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'theme' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sector' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Handle theme image upload
        $themePath = null;
        if ($request->hasFile('theme')) {
            $themePath = $request->file('theme')->store('courses/themes', 'public');
        }

        Courses::create(array_merge($request->all(), ['theme' => $themePath]));

        return redirect()->route('/admin/courses/')->with('success', 'Course created successfully.');
    }

    public function update(Request $request, $id)
    {
        $course = Courses::findOrFail($id);
        // Update course details
        $course->update($request->except('theme'));

        // Handle theme image update
        if ($request->hasFile('theme')) {
            // Delete old theme image if exists
            if ($course->theme) {
                Storage::disk('public')->delete($course->theme);
            }
            $themePath = $request->file('theme')->store('courses/themes', 'public');
            $course->update(['theme' => $themePath]);
        }

        return redirect()->route('/admin/courses/')->with('success', 'Course updated successfully.');
    }

    public function destroy($id)
    {
        $course = Courses::findOrFail($id);

        // Delete course theme image if exists
        if ($course->theme) {
            Storage::disk('public')->delete($course->theme);
        }

        $course->delete();

        return redirect()->route('/admin/courses/')->with('success', 'Course deleted successfully.');
    }

    public function toggleStatus($id)
    {
        $course = Courses::findOrFail($id);
        $course->status = $course->status === 'Active' ? 'Expired' : 'Active';
        $course->save();

        return redirect()->route('/admin/courses/')->with('success', 'Course status updated successfully.');
    }

    // Attachments Handling Methods
    public function storeAttachment(Request $request, $courseId)
    {
        $request->validate([
            'caption' => 'required|string|max:255',
            'file' => 'required|mimes:pdf,doc,docx,xls,xlsx|max:2048',
            'description' => 'nullable|string',
        ]);

        $filePath = $request->file('file')->store('attachments', 'public');

        Attachments::create([
            'course_id' => $courseId,
            'caption' => $request->input('caption'),
            'file' => $filePath,
            'description' => $request->input('description'),
        ]);

        return redirect()->route('/admin/courses/')->with('success', 'Attachments added successfully.');
    }

    public function destroyAttachment($id)
    {
        $attachment = Attachments::findOrFail($id);

        // Delete attachment file
        if ($attachment->file) {
            Storage::disk('public')->delete($attachment->file);
        }

        $attachment->delete();

        return redirect()->route('/admin/courses/')->with('success', 'Attachments deleted successfully.');
    }
}
