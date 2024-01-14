<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\NewBooking;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthPatientController extends Controller
{
    //
    public function index(){

        return view("patient.index");
    }
    public function search(){
        return view("patient.auth.search_id");
    }
    public function search_no_id(Request $request){
        // dd($request->all());
        $request->validate([
            'no_id' => 'required|numeric',
        ], [
            'no_id.required' => 'حقل رقم الهوية مطلوب.',
            'no_id.numeric' => 'يجب أن يكون رقم الهوية قيمة رقمية.',
        ]);
        $no_id = $request->input('no_id');
        $patient = Patient::where('no_id', $no_id)->first();
        if($patient){
            return redirect()->route('patient.login_form')->with('no_id', $no_id);
        }else{
            return redirect()->route('patient.register_form')->with('no_id', $no_id);
        }


    }
    public function register_form(){
        $no_id = session('no_id');
        return view("patient.auth.register", compact('no_id'));
    }
    public function login_form(){
        $no_id = session('no_id');
        return view("patient.auth.login", compact('no_id'));
    }

    public function store(Request $request){
        // dd($request->all());
        $validatedData= $request->validate([
            'no_id' => 'required|numeric|unique:patients,no_id',
            'name' => 'required|string',
            'age' => 'required|numeric',
            'phone' => 'required|numeric',
            'password' => 'required|min:6|max:10',
        ], [
            'no_id.required' => 'حقل رقم الهوية مطلوب.',
            'no_id.numeric' => 'يجب أن يكون رقم الهوية قيمة رقمية.',
            'no_id.unique' => 'رقم الهوية مستخدم بالفعل.',
            'name.required' => 'حقل الاسم مطلوب.',
            'name.string' => 'يجب أن يكون الاسم قيمة نصية.',
            'age.required' => 'حقل العمر مطلوب.',
            'age.numeric' => 'يجب أن يكون العمر قيمة رقمية.',
            'phone.required' => 'حقل رقم الهاتف مطلوب.',
            'phone.numeric' => 'يجب أن يكون رقم الهاتف قيمة رقمية.',
            'password.required' => 'حقل كلمة المرور مطلوب.',
            'password.min' => 'يجب أن تحتوي كلمة المرور على الأقل 6 أحرف.',
            'password.max' => 'يجب أن تحتوي كلمة المرور على الأكثر 10 أحرف.',
        ]);
        $validatedData['password'] = Hash::make($request->input('password'));
        $patient = Patient::create($validatedData);


        if ($patient) {
            auth()->guard('patients')->login($patient);

            return redirect()->route('patient.home')->with('message', 'مرحباً بك ');

        }
        //  else {
        //     dd('فشل في إنشاء المريض');
        // }
    }
    public function login(Request $request)
    {

        if (auth()->guard('patients')->attempt(['no_id' => $request->no_id, 'password' => $request->password])) {
            return redirect()->route('patient.home')->with('message', 'مرحباً بك ');
        }
        return redirect()->back()->with('error', 'البريد الإلكترونى او كلمة المرور خطأ');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function new_booking(){
        return view('patient.new_booking');
    }
    public function add_descroption(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'value' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'st'=>1,
                'message' => 'حقل الشكوي مطلوب']);
        }
        $new_booking = NewBooking::create([
            'patient_id' => auth()->guard('patients')->user()->id,
            'descroption' => $request->input('value'),
        ]);
        if ($new_booking) {
            return response()->json([
                'st' => 2,
                'message' => 'تم إرسال القيمة بنجاح'
            ]);
        } else {
            return response()->json([
                'st' => 3,
                'message' => 'فشل في إرسال القيمة'
            ]);
        }

    }



}
