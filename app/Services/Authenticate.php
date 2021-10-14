<?php

namespace App\Services;


class Authenticate
{
	
	public function check($request)
   	{
	 $user = UserModel::where('Email',$request->Email)->first();
	 $chk = false;
	 if($user){
	    $chk = Hash::check($request->Password,$user->Password);
		return $chk;
		}
	 }
}
