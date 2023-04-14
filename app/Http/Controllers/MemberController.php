<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Trainer;
use App\Models\Membership;

class MemberController extends Controller
{
    public function index() {
        return view('index')
            ->with('members', Member::orderBy('created_at', 'desc')->paginate(10))
            ->with('trainers', Trainer::get())
            ->with('membership', Membership::get());
    }

    // public function createMember() {
    //     return view('createmember');
    // }

    public function storeMember(Request $request) {   
        $member = new Member;  
        
        $memberexist = Member::where('email', $request->email)->first();
        if($memberexist != NULL) {
            return redirect()->route('index')
            ->with('error', 'Member already exists!');
        }
        if($request->membership_id < 1 || $request->trainer_id < 1) {
            return redirect()->route('index')
            ->with('error', 'Failed to add new member! Must choose Membership option and Trainer. Please try again.');
        }

        $member->name = $request->name;
        $member->email = $request->email;        
        $member->membership_id = $request->membership_id;
        $member->trainer_id = $request->trainer_id;
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
        $originalemail = $member->email;

        $member->name  = $request->name;
        $member->email = $request->email;        
        $member->trainer_id = $request->trainer_id;
        $member->membership_id = $request->membership_id;
        $member->membership_expiration = $request->membership_expiration;

        // IF new email is already existing in the database
        if($member->email != $originalemail) {
            $memberexist = Member::where('email', $member->email)->first();
            if($memberexist != NULL) {
                return redirect()->route('index')
                ->with('error', 'Member already exists!');
            }
        }
        if($request->membership_id < 1 || $request->trainer_id < 1) {
            return redirect()->route('index')
            ->with('error', 'Failed to update member! Membership option and Trainer must be selected. Please try again.');
        }

        $member->save();
        return redirect()->route('index')->with('success', 'Member is successfully updated!');
    }        

    public function deleteMember($id) {
        $member = Member::find($id);
        $member->delete();

        return redirect()->route('index')->with('success', 'Member is successfully deleted!');
    }

    // For modal display Member Information for Edit
    public function showMember($id) {
        $member = Member::find($id);
        return response()->json($member);
    }

    // public function getTrainer($id){
    //     $trainer = Trainer::find($id);
    //     return view('trainerinfo', ['trainer' => $trainer]);
    // }

    // public function getMembership($id){
    //     $membership = Membership::find($id);
    //     return view('membership', ['membership' => $membership]);
    // }

    // For modal display Trainer Information
    public function showTrainer($id) {
        $trainerinfo = Trainer::find($id);
        return response()->json($trainerinfo);
    }


    // For modal display Membership info using Member model - both membersand membership info
    public function showMembership($id) {
        $membershipinfo = Member::with('membership')->find($id);
        return response()->json($membershipinfo);
    }


}
