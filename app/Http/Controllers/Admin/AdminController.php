<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function index()
    {
        $admins = User::all();
        return view("admin.admin", compact("admins"));
    }


    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string',
            'status' => 'required|numeric|in:0,1',
        ]);
        if ($request->has("status")) {
            if ($request->input("status") == 0) {
                $status = "super_admin";
            } elseif ($request->input("status") == 1) {
                $status = "admin";
            }
        }
        $validatedData['password'] = Hash::make('123456');
        $validatedData['status'] = $status;
        $user = User::create($validatedData);
        return redirect()->route('admin.admin')->with('success','تم إضافة المسئول بنجاح');
    }

    public function delete($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'تم حذف المسئول بنجاح.');
        } else {
            return redirect()->back()->with('error', 'لم يتم العثور على المستخدم.');
        }
    }

    public function login_form()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect('/dashboard');
        }
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
