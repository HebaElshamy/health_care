<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\NewBooking;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;


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
            'no_id' => 'required|numeric|digits:10',
        ], [
            'no_id.digits' => 'يجب أن يحتوي رقم الهوية على 10 أرقام.',
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
        $validatedData= $request->validate([
            'no_id' => 'required|numeric|digits:10|unique:patients,no_id',
            'name' => 'required|string',
            'age' => 'required|numeric',
            'phone' => 'required|numeric',
            'password' => 'required|min:6|max:10',
        ], [
            'no_id.required' => 'حقل رقم الهوية مطلوب.',
            'no_id.numeric' => 'يجب أن يكون رقم الهوية قيمة رقمية.',
            'no_id.unique' => 'رقم الهوية مستخدم بالفعل.',
            'no_id.digits' => 'يجب أن يحتوي رقم الهوية على 10 أرقام.',

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

            return redirect()->route('patient.new.booking')->with('message', 'مرحباً بك ');

        }
    }
    public function login(Request $request)
    {

        if (auth()->guard('patients')->attempt(['no_id' => $request->no_id, 'password' => $request->password])) {
            return redirect()->route('patient.new.booking')->with('message', 'مرحباً بك ');
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
    public function add_data(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'description' => 'required|string',
            'temp' => 'required|numeric',
            'heart' => 'required|numeric',
            'spo2' => 'required|numeric',
        ], [
            'description.required' => 'حقل الوصف مطلوب',
            'temp.required' => 'حقل الحرارة مطلوب',
            'temp.numeric' => 'يجب أن يكون حقل الحرارة رقمًا',
            'heart.required' => 'حقل النبض مطلوب',
            'heart.numeric' =>' يجب أن يكون حقل النبض رقمًا',
            'spo2.required' => 'حقل الاكسجين مطلوب',
            'spo2.numeric' =>' يجب أن يكون حقل الاكسجين رقمًا',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'st' => 1,
                'message' => $validator->errors()->all()
            ]);
        }
        if(($request->input('heart') >=90 && $request->input('heart')<100) && ($request->input('temp') >=36.5 && $request->input('temp') <= 37.5)){
            $status =0;
        }else{
            $status = 1;
        }

        $new_booking = NewBooking::create([
            'patient_id' => auth()->guard('patients')->user()->id,
            'description' => $request->input('description'),
            'temp' => $request->input('temp'),
            'heart' => $request->input('heart'),
            'spo2' => $request->input('spo2'),
            'status' => $status,
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
    public function confirm(){
        return view('patient.confirm_booking');
    }
    public function done(){
        return response()->json(['status' => 'success']);
    }
    public function done_bye(){
        Auth::logout();


        return view('patient.done_bye');
    }
    public function add_sensor(Request $request){
        // CSRF token for Laravel form submission
        $token = $request->input('_token');

        // Send a POST request to Arduino
        $response = Http::post('http://192.168.1.10/heart', ['_token' => $token]);

        // Get the response from Arduino
        $arduinoResponse = $response->body();

        return response()->json(['success' => true, 'arduino_response' => $arduinoResponse]);
    }
    public function heart(){
        // Send a GET request to Arduino
        $response = Http::get('http://192.168.8.92/heart');
        // $response = Http::get('http://192.168.8.92/temp');

        // Get the response from Arduino
        $arduinoResponse = $response->body();

        return response()->json(['success' => true, 'arduino_response' => $arduinoResponse]);

    }
    public function temp(){
        // Send a GET request to Arduino
        // $response = Http::get('http://192.168.8.92/heart');
        $response = Http::get('http://192.168.8.92/temp');

        // Get the response from Arduino
        $arduinoResponse = $response->body();

        return response()->json(['success' => true, 'arduino_response' => $arduinoResponse]);

    }



}
