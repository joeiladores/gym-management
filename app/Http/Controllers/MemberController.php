<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function index() {
        return view('index')->with('members', Member::all());
    }

    public function createMember() {
        return view('createmember');
    }

    public function storeMember(Request $request) {
        $member = new Member;

        $member->name = $request->name;
        $member->email = $request->email;
        $member->membership_type = $request->membership_type;
        $member->membership_expiration = $request->membership_expiration;

        $member->save();

        return redirect()->route('index')->with('success', 'New member has been added!');
    }

    public function editMember($id) {
        $member = Member::find($id);

        return view('editmember')->with('member', $member);
    }

    public function updateMember(Request $request) {
        $member = Member::find($request->id);

        $member->name = $request->name;
        $member->email = $request->email;
        $member->membership_type = $request->membership_type;
        $member->membership_expiration = $request->membership_expiration;

        $member->save();

        return redirect()->route('index')->with('sucess', 'Member is successfully updated!');
    }        

    public function deleteMember($id) {
        $member = Member::find($id);
        $member->delete();

        return redirect()->route('index')->with('sucess', 'Member is successfully deleted!');
    }

    // For modal display
    public function showMember($id) {
        $member = Member::find($id);
        return response()->json($member);
    }
}
