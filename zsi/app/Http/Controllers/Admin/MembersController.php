<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Members;
use Illuminate\Support\Facades\Storage;


class MembersController extends Controller
{
    public function index(Request $request)
    {
        $members = Members::latest()->get();
        if(view()->exists('admin.membership.membersPage'))
        {
            return view('admin.membership.membersPage',['members'=>$members]);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'contact' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:members',
            'profile' => 'nullable|file|mimes:jpeg,jpg,png,gif|max:2048',
            'registration_date' => 'nullable|date',
            'membership_type' => 'required|in:Principal,Normal',
            'status' => 'required|in:Active,Inactive',
            'bio' => 'nullable|string',
        ]);


        // Handle profile file upload
        $profilePath = null;
        if ($request->hasFile('profile')) {
            $profilePath = $request->file('profile')->store('memberships/profiles', 'public');
        }

        Members::create(array_merge($request->all(), ['profile' => $profilePath]));

        return redirect()->route('/admin/members/')->with('success', 'Members created successfully.');
    }

    public function update(Request $request, $id)
    {
        $membership = Members::findOrFail($id);

        // Handle profile file update
        if ($request->hasFile('profile')) {
            if ($membership->profile) {
                Storage::disk('public')->delete($membership->profile);
            }
            $profilePath = $request->file('profile')->store('memberships/profiles', 'public');
            $membership->update(['profile' => $profilePath]);
        }

        $membership->update($request->except('profile'));

        return redirect()->route('/admin/members/')->with('success', 'Members updated successfully.');
    }

    public function destroy($id)
    {
        $membership = Members::findOrFail($id);

        // Delete membership profile file if exists
        if ($membership->profile) {
            Storage::disk('public')->delete($membership->profile);
        }

        $membership->delete();

        return redirect()->route('/admin/members/')->with('success', 'Members deleted successfully.');
    }
}
