<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;

class StudentClassController extends Controller
{
  public function ViewStudent(){
    $data['allData'] = StudentClass::all();
    return view('backend.setup.student-class.view-class', $data);
  }

  public function StudentClassAdd(){
    return view('backend.setup.student-class.add-class');
  }

  public function StudentClassStore(Request $request){
    $validatedData = $request->validate([
      'name' => 'required|unique:student_classes,name'
    ]);

    $data = new StudentClass();
    $data->name = $request->name;
    $data->save();

    $notification = array(
      'message' => 'Student class inserted successfully', 
      'alert-type' => 'success'
    );

    return redirect()->route('student.class.view')->with($notification);
  }

  public function StudentClassEdit($id){
    $editData = StudentClass::find($id);
    return view('backend.setup.student-class.edit-class', compact('editData'));
  }

  public function StudentClassUpdate(Request $request, $id){

    $data = StudentClass::find($id);

    $validatedData = $request->validate([
      'name' => 'required|unique:student_classes,name,'.$data->id
    ]);

    $data->name = $request->name;
    $data->save();

    $notification = array(
      'message' => 'Student class has been updated', 
      'alert-type' => 'success'
    );

    return redirect()->route('student.class.view')->with($notification);
  }

  public function StudentClassDelete($id){
    $studentClass = StudentClass::find($id);
    $studentClass->delete();

    $notification = array(
      'message' => 'Student class has been deleted', 
      'alert-type' => 'info'
    );

    return redirect()->route('student.class.view')->with($notification);
  }
}
