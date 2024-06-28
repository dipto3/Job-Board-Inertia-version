<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRegistrationFormRequest;
use App\Models\CompanyInfo;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CompanyAuthController extends Controller
{
    public function registerPage()
    {
        return view('company.auth.register');
    }

    public function register(CompanyRegistrationFormRequest $request)
    {
        $request->validated();
        $role = Role::where('name', 'Company')->first();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $role->id,
        ]);
        $user->syncRoles('Company');

        CompanyInfo::create([
            'user_id' => $user->id,
            'contract_number' => $request->contract_number,
            'webpage' => $request->webpage,
            'approval' => 'pending',
            'package_id' => 1,

        ]);

        return redirect()->back();
    }
}
