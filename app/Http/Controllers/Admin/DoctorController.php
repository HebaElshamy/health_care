<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    //
    public function index(){
        $doctors = Doctor::all();
        $categories = Category::where('status',0)->get();
        return view("admin.doctor",compact("doctors","categories"));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:doctors,email',
            'phone' => 'required|string',
            'category_id' => 'required|string',
        ]);
        $validatedData['password'] = Hash::make('123456');
        $doctor = Doctor::create($validatedData);
        return redirect()->route('admin.doctor')->with('success','تم إضافة الطبيب بنجاح');
    }
    public function update(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:doctors,email,' . $doctor->id,
            'phone' => 'required|string',
            'category_id' => 'required|string',
        ]);

        $doctor->update($validatedData);
        return redirect()->route('admin.doctor')->with('success', 'تم تعديل بيانات الطبيب');
    }

    public function destroy($id){
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
        return redirect()->route('admin.doctor')->with('success', 'تم حذف بيانات الطبيب');


    }
}
