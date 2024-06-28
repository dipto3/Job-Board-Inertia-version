<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AdminAuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\SendVerificationCodeEmail;
use App\Models\User;

class AdminAuthController extends Controller
{
    protected $adminAuthService;

    public function __construct(AdminAuthService $adminAuthService)
    {
        $this->adminAuthService = $adminAuthService;
    }

    public function loginPage()
    {
        return view('admin.admin-auth.login');
    }

    public function login(Request $request)
    {
        $login = $this->adminAuthService->adminLogin($request);
        if ($login) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.page');
    }

    public function  mailSubmitPage()
    {
        return view('admin.reset-password.send-mail');
    }

    public function sendEmail(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'max:255'],
        ]);
        session()->put('email', $request->email);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()], 200);
        } else {
            $checkEmail = User::where('email', $request->email)->exists();
            if ($checkEmail) {
                $code = rand(10000, 99999);
                $storeRequestedData = DB::table('password_reset_tokens')->insert([
                    'email' => $request->email,
                    'token' => $code,
                    'created_at' => now()
                ]);

                if ($storeRequestedData) {
                    $sendMail = Mail::to($request->email)->send(new SendVerificationCodeEmail($code));
                    if ($sendMail) {
                        return redirect()->route('submit.otp');
                    } else {
                        return response()->json(['status' => 'failed', 'message' => 'Failed to send email'], 200);
                    }
                } else {
                    return response()->json(['status' => 'failed', 'message' => 'Failed to generate verification code'], 200);
                }
            } else {
                return response()->json(['status' => 'failed', 'message' => 'Your given email is not exist in our records'], 200);
            }
        }
    }

    public function submitOtpPage()
    {
        $email = session()->get('email');
        return view('admin.reset-password.submit-otp', compact('email'));
    }

    public function checkVerificationCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'max:255'],
            'token' => ['required'],
        ]);
        // session()->put('email', $request->email);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()], 422);
        }
        $records = DB::table('password_reset_tokens')->where([['email', $request->email], ['token', $request->token]]);
        if ($records->exists()) {
            $difference = Carbon::now()->diffInSeconds($records->first()->created_at);
            if ($difference > 600) {
                return response()->json(['success' => false, 'message' => "Token Expired"], 400);
            }
            DB::table('password_reset_tokens')->where([['email', $request->email], ['token', $request->token]])->delete();

            return redirect()->route('new.password')->with(['email' => $request->email,]);
        } else {

            return redirect()->back()->with('error', 'Invalid!');
        }
    }
    public function newPasswordForm()
    {
        $email = session()->get('email');
        // dd($email);
        return view('admin.reset-password.reset-password', compact('email'));
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()], 422);
        }
        $email = session()->get('email');
        $user = User::where('email', $email)->first();
       dd($email);
        $user->update([
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('login.page');
    }
}
