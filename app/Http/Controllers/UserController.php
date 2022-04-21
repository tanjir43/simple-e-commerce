<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::orderBy('id','desc')->get();
        return view('backend.admin.users.manage',compact('users'));
    }

    public function userStatus(Request $request){
        if ($request->mode=='true'){
            DB::table('users')->where('id',$request->id)->update(['status'=>'active']);
        }
        else{
            DB::table('users')->where('id',$request->id)->update(['status'=>'inactive']);
        }
        return  response()->json(['msg'=>'Successfully updated status','status'=>true]);

    }

    public function create()
    {
        return view('backend.admin.users.create');
    }


    public function store(Request $request)
    {

        $this->validate($request,[
            'full_name'     => 'string|required',
            'username'      => 'string|nullable',
            'email'         => 'email|required|unique:users,email',
            'password'      => 'min:4|required',
            'phone'         => 'string|nullable',
            'photo'         => 'nullable',
            'address'       => 'string|nullable',
            'role'          => 'required|in:admin,customer,vendor',
            'status'        => 'required|in:active,inactive'
        ]);
         $data =  $request->all();
         $data['password'] = Hash::make($request->password);

         $status = User::create($data);
        if ($status){
            return redirect()->route('users.index')->with('success','User added successfully');
        }
        else{
            return  back()->with('errors','Something went wrong');
        }
        }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $user = User::find($id);

        if ($user){
            return view('backend.admin.users.edit',compact('user'));
        }else{
            return back()->with('errors','User not found');
        }
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user){
            $this->validate($request,[
                'full_name'     => 'string|required',
                'username'      => 'string|nullable',
                'email'         => 'email|required|exists:users,email',
                'phone'         => 'string|nullable',
                'photo'         => 'nullable',
                'address'       => 'string|nullable',
                'role'          => 'required|in:admin,customer,vendor',
                'status'        => 'required|in:active,inactive'
            ]);
            $data       = $request->all();

            $status = $user->fill($data)->save();
            if ($status){
                return redirect()->route('users.index')->with('success','User updated successfully');
            }
            else{
                return  back()->with('errors','Something went wrong');
            }
        }else{
            return back()->with('errors','Something went wrong');
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user){
            $status = $user->delete();
            if ($status){
                return redirect()->route('users.index')->with('success','User delete successfully');
            }else{
                return back()->with('errors','Something went wrong');
            }
        }else{
            return back()->with('errors','Data not found');
        }
    }
}
