<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
  public function UserList(){
    $data['allData'] = User::all();
    return view('backend.user.users', $data);
  }

  public function UserAdd(){
    return view('backend.user.add-user');
  }

  public function UserStore(Request $request){
    $validatedData = $request->validate([
      'email' => 'required|unique:users',
      'name' => 'required'
    ]);

    $data = new User();
    $data->role = $request->role;
    $data->name = $request->name;
    $data->email = $request->email;
    $data->password = bcrypt($request->password);
    $data->save();

    $notification = array(
      'message' => 'User inserted successfully', 
      'alert-type' => 'success'
    );

    return redirect()->route('user.list')->with($notification);
  }

  public function UserEdit($id){
    $editData = User::find($id);
    return view('backend.user.edit-user', compact('editData'));
  }

  public function UserUpdate(Request $request, $id){

    $data = User::find($id);
    $data->role = $request->role;
    $data->name = $request->name;
    $data->email = $request->email;
    $data->save();

    $notification = array(
      'message' => 'User has been updated', 
      'alert-type' => 'info'
    );

    return redirect()->route('user.list')->with($notification);
  }

  public function UserDelete($id){
    $user = User::find($id);
    $user->delete();

    $notification = array(
      'message' => 'User has been deleted', 
      'alert-type' => 'info'
    );

    return redirect()->route('user.list')->with($notification);

  }
}
