<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyInfo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class UserManageController extends Controller
{
    public function index()
    {
        $loggedInUser = Auth::user();
        if (is_null($loggedInUser) || ! $loggedInUser->can('index-company')) {
            abort(403, 'Unauthorized Access!');
        }
        $users = User::where('role_id', 2)->get();

        return view('admin.users.company.index', compact('users'));
    }

    public function accept_account($encryptedUserId)
    {

        $userId = Crypt::decrypt($encryptedUserId);
        $user = CompanyInfo::findOrFail($userId);

        $user->update(['approval' => $user->approval == 'pending' ? 'approved' : 'pending']);

        return back();
    }

    public function companyDetails($id)
    {
        $loggedInUser = Auth::user();
        if (is_null($loggedInUser) || ! $loggedInUser->can('details-company')) {
            abort(403, 'Unauthorized Access!');
        }
        $company = User::where('role_id', 2)->where('id', $id)->first();

        return view('admin.users.company.details', compact('company'));
    }

    public function candidateList()
    {
        $loggedInUser = Auth::user();
        if (is_null($loggedInUser) || ! $loggedInUser->can('index-candidate')) {
            abort(403, 'Unauthorized Access!');
        }
        $candidates = User::where('role_id', 3)->get();

        return view('admin.users.candidate.index', compact('candidates'));
    }

    public function candidateDetails($id)
    {
        $loggedInUser = Auth::user();
        if (is_null($loggedInUser) || ! $loggedInUser->can('details-candidate')) {
            abort(403, 'Unauthorized Access!');
        }
        $candidate = User::where('role_id', 3)->where('id', $id)->first();

        return view('admin.users.candidate.details', compact('candidate'));
    }

    public function candidateRemove($id)
    {
        $loggedInUser = Auth::user();
        if (is_null($loggedInUser) || ! $loggedInUser->can('delete-candidate')) {
            abort(403, 'Unauthorized Access!');
        }
        $candidate = User::where('role_id', 3)->where('id', $id)->first();
        $candidate->delete();
        toastr()->addInfo('', 'Job Removed Successfully.');

        return redirect()->back();
    }
}
