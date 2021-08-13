<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
class AdminRegisterController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except('create')->except('store');
        $this->middleware('admin')->except('create')->except('store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('admin.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users',
            'role'=>'required',
            'phone'=>'required',

            'profile_picture'=>'required',



        ]);
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->role=$request->role;
        $user->phone=$request->phone;
        $user->city=$request->city;
        $user->pin_code=$request->pin_code;
        $user->state=$request->state;
        $user->country=$request->country;
        $user->password=Hash::make($request['password']);
        if($request->file('profile_picture')) {
            $upload = $request->file('profile_picture');
            $fileformat = time() . '.' . $upload->getClientOriginalName();
            if ($upload->move('uploads/userimage/', $fileformat)) {
                $user->profile_picture = $fileformat;
            }
        }
        if($user->save()){
            return redirect()->route('users.index')->with('success',' User Added successfully.');
        }
        else{
            return redirect()->back()->with('unsuccess','Failed try again.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::findOrFail($id);
        return view('admin.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users',
            'role'=>'required',
            'phone'=>'required',

            'profile_picture'=>'required',

        ]);
        $user=User::findOrFail($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->role=$request->role;
        $user->phone=$request->phone;
        $user->city=$request->city;
        $user->pin_code=$request->pin_code;
        $user->state=$request->state;
        $user->country=$request->country;
        $user->password=Hash::make($request['password']);
        if($request->file('profile_picture')) {
            $upload = $request->file('profile_picture');
            $fileformat = time() . '.' . $upload->getClientOriginalName();
            if ($upload->move('uploads/userimage/', $fileformat)) {
                $user->profile_picture = $fileformat;
            }
        }
        if($user->update()){
            return redirect()->route('users.index')->with('success',' User Updated successfully.');
        }
        else{
            return redirect()->back()->with('unsuccess','Failed try again.');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user=User::findOrFail($id);
        if(User::where('id',$id)->delete()){
            return redirect()->back()->with('success',' User Deleted Successfully.');
        }
        else{
            return redirect()->back()->with('unsuccess','Failed try again.');
        }
    }


    public function changeStatus($id)
    {
        $user=User::findOrFail($id);

        $user->status=!$user->status;

        if($user->update()){
            return redirect()->back()->with('success',' User Updated Successfully.');
        }
        else{
            return redirect()->back()->with('unsuccess','Oops.! something went wrong.');
        }
    }
}
