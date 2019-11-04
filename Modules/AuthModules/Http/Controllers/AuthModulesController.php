<?php

namespace Modules\AuthModules\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class AuthModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function changepassword()
    {
        return view('authmodules::changepassword');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function login(Request $request)
    {
        
        $email=$request->email;
        $password=$request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('/dashboard');
        } elseif (Auth::attempt(['email' => $email, 'password' => $password])){
            Auth::logout();
            return redirect('/login')->with('status','Akunmu telah disuspend! silahkan hubungi Administrator');
        }
        else {
            return redirect('/login')->with('status','Email atau password salah!');
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    public function postpassword(Request $request){
        $current_password	=	$request->get('current_password');
		$password_user		=	Auth::user()->password;
		$new_password		=	$request->get('password');
		// check current password and new password same
		$validationpassword =	Hash::check($current_password , $password_user);

		if (!$validationpassword){
			return redirect('/auth/changepassword')->with('status','Your current password does not matches with the password you provided. Please try again.');
		}
			
		// Current password and new password are same
		if (strcmp($current_password ,$new_password) == 0){
		return redirect('/auth/changepassword')->with('status','New Password cannot be same as your current password. Please choose a different password.');
		}
		$validated		= array(
						'current_password'	=> 'required',
						'password' 		=> 'required|min:6|confirmed'
		);
		$request->validate($validated);

		// Change Password

		// $user 			= Auth::user();
		// $user->password = bcrypt($request->get('new_password'));
		// $user->save();
		$data = array(
			'password'	=> Hash::make($new_password)
		);
		// dd($data);
        DB::table('users')->where('id',Auth::id())->update($data);
		return redirect('/auth/changepassword')->with('success','Password changed successfully !'); 
    }
   
}