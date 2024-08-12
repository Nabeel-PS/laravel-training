<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class FrontEndController extends Controller
{
  public function homepage(){
    // $users = User::all();
    // $users = User::find(43);
    // $users = User::where('email','rosetta14@example.org')->get();
    // $users = User::whereIn('id',[23,45,56])->get();
    // $users  = User::active()->latest()->limit(10)->get();
    // $users  = User::latest()->limit(10)->get();
    $users  = User::withTrashed()->latest()->paginate(6);
    // $users  = User::withTrashed()->latest()->limit(10)->get();
    // return $users;



    session()->put('user_name','nabeel');
    session()->put('user_id','45');
    return view('welcome',compact('users'));
  }

public function create(){
  // return session()->get('user_id');
  session()->increment('user_id');
return view ('users.create');
}
public function save(){
  $name = request('name');
  $email = request('email');
  $dob = request('dateofbirth');
  $status = request('status');
// User::create([
//   'name' => $name,
//   'email' => $email,
//   'dateofbirth' => $dob,
//   'status' => $status,
// ]);
$user = User::updateOrCreate([
  'email' => request('email')
],
[   'name' => $name,
  'dateofbirth' => $dob,
  'status' => $status,
]);
// return $user;
return redirect()->route('home')->with('message','success user created');
//  return "1 row inserted" ;
}

public function edit($UserId){
$user =  User::find( decrypt($UserId));

  return view('users.edit',compact('user'));

}
public function update(){  
  // return request()->except('_token');
  // return request()->all();


  // $user = User::find(decrypt (request('id')));
  // $user->update ([   
  //   'name'=> request('name'),
  //   'email'=> request('email'),
  //   'dateofbirth'=> request('dateofbirth'),
  //   'status'=> request('status')
  //   ]);

  
$userid = decrypt(request('id'));
User::find($userid)->update([
  'name'=> request('name'),
  'email'=> request('email'),
  'dateofbirth'=> request('dateofbirth'),
  'status'=> request('status')
  ]);

  // return 'updated successfully';
  session()->forget('user_name');
  session()->flush();
  session()->flash('date',date( 'Y-m-d H:i:s'));
  return redirect()->route('home')->with('message','updated successfully!!');
  // return request()->only('name','email');

}
public function delete($userid){
  // User::where('status',0)->delete();
User::truncate(); //empty 
  // User::find(decrypt($userid))->delete();
  User::destroy( decrypt($userid));

 return redirect()->route('home')->with('message','deleted  successfully!!');
}
public function forceDelete($userid){
  User::find(decrypt($userid))->forceDelete();

 return redirect()->route('home')->with('message',' User Force deleted  successfully!!');
}
public function activate($userid)
{

  $user = User::withTrashed()->find(decrypt($userid));

   $user->restore();
  return redirect()->route('home')->with('message','User Activated  successfully!!');
}
}