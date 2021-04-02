@extends('user/loginlayout')
@section('logincontainer')
<h2>Login</h2>

<form action="{{route('user.auth')}}" method="post">
                            @method('post')
                            @csrf
                            <div class="box">
                             <label>Email Address</label>
                                    <input type="email" name="email" placeholder="Email">
                                </br>
                                    <label>Password</label>
                                    <input  type="password" name="password" placeholder="Password">
                               </br>
                               
                                <button  type="submit">sign in</button>
                                
                              
                                    {{session('error')}}
	                        </div>					
</form>
<h3>For Direct Run use</h3>
<p>email:abc@abc.com </br>
password:abc</p>
@endsection