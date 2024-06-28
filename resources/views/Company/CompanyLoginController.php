<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyLoginController extends Controller
{
    public function loginpage()
    {
        return view('company.auth.login');
    }

    public function notApprove()
    {
        return view('company.not-approved');
    }

    public function loginpost(Request $request)
    {
        $credetials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credetials)) {
            $user = Auth::user();
            // dd($user->companyInfo->approval);

            //if account is not approved
            if ($user->companyInfo->approval === 'pending') {
                return redirect()->route('company.pending');
            } else {
                //if account is approved
                return redirect()->route('dashboard')->with('success', 'Login Success');
            }
        }

        return back()->with('error', 'Error Email or Password');
    }
}
