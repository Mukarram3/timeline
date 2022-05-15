<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{

    function adduser(){
        return view('user/add_user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_data=User::all();
        return view('user/user',compact('user_data'));
    }

    function login(Request $req){
        $req->validate([

            'email'=>'required|email',
            'password'=>'required|min:5|max:20'


        ]);

        $remember_me = $req->has('remember_me') ? true : false;
        $credentail=$req->only('email','password');

        if(Auth::attempt($credentail)){


                return redirect()->route('user_index');

        }
        else{
            return back()->with('error','Wrong email or password');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user/register');
    }

    public function login_page()
    {
        return view('user/login');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $req->validate([

            'name'=>'required',
            'address'=>'required',
            'mobile'=>'required',
            'city'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:5|max:15',


        ]);




    $admin=new User;
    $admin->name=$req->name;
    $admin->email=$req->email;
    $admin->password=Hash::make($req->password);
    $admin->address=$req->address;
    $admin->city=$req->city;
    $admin->mobile=$req->mobile;
        $admin->CName=$req->CName;
        $admin->zipcode=$req->zipcode;
        $admin->country=$req->country;
        $admin->phone=$req->phone;
        $admin->website=$req->website;

    $save=$admin->save();
    if($save){

        return redirect()->route('login_page')->with('success','You are Sign Up... Please Login');

    }
    else{
        return back()->with('fail','Smoething went wrong, try again...');

    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=User::find($id);
        return view('user/edituser',['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $req->validate([

            'name'=>'required',
            'address'=>'required',
            'mobile'=>'required',
            'image'=>'required',
            'city'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:5|max:15',


        ]);




    $admin=user::find($req->id);
    $admin->name=$req->name;
    $admin->email=$req->email;
    $admin->password=Hash::make($req->password);
    $admin->address=$req->address;
    $admin->city=$req->city;
    $admin->Mobile=$req->mobile;
    // $admin->image=$req->image;
    $save=$admin->save();
    if($save){

        return redirect()->route('user_index');
    }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user=User::find($id);
        $user->delete();
        return redirect()->route('user_index');
    }

    function logout(){
        if(Auth::check()){
            Auth::logout();
            return redirect()->route('login_page')->with('error','You are Logged Out.. Please Login');
        }else{
            // return redirect()->route('login_page');

        }
    }
}
