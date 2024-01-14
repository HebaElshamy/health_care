<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthDoctorController extends Controller
{
    //
    public function index(){

        return view('doctor.index');
    }
    public function login_form()
    {
        return view('doctor.auth.login');
    }
    public function login(Request $request)
    {
        if (auth()->guard('doctors')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/doctor/dashboard')->with('message', 'مرحباً بك ');
        }
        return redirect()->back()->with('error', 'البريد الإلكترونى او كلمة المرور خطأ');
    }
    public function change_password(Request $request){
        // dd($request->all());
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6',
        ]);
        $user = Auth::guard('doctors')->user();
        if (Hash::check($request->old_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);
            // return redirect()->route('your route name')->with('message', 'Data added Successfully');
            return redirect()->back()->with('message', 'تم تغيير كلمة المرور بنجاح.');
        } else {
            return redirect()->back()->with('error', 'كلمة المرور القديمة غير صحيحة.');
        }

    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
