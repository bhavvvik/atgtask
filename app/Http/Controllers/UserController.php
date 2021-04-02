<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\User;

use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.login');
    }
    public function index1()
    {   
       
    
        return view('user.register');
    }
    

    public function auth(Request $request)
    {   dd($request);
        // $email=$request->post('email');
        // $password=$request->post('password');
        // $result=User::where(['email'=>$email,'password'=>$password])->first();
        // if(isset($result->id)){
            
        //     $request->session()->put('user',$result);
            
        //     return redirect('user/dashboard');

        // }else{
        //     $request->session()->flash('error',"please Enter Correct Email And Password");
        //     return redirect('login');
        // }
    }
    public function dashboard()
    { 
    //   return view('user/dashboard');
        $user = session()->get('user');
      return view('user/dashboard')->with('secarr',User::find($user->id));


    }
    public function logout()
    { 
        session()->forget('user');
        session()->flash('error','Logout succesfully.');
        return redirect('login');

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'name' => 'required|min:2|max:50|alpha',            
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',                
           
            
            ]);
   
        $res=new User;
        $res->name=$request->input('name');
        $res->email=$request->input('email');
        $res->password=$request->input('password');

        $res->save();

        $request->session()->flash('error','Data submited!!');
       return redirect('login');
       
    }

 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
