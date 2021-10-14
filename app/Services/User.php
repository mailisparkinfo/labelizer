<?php

namespace App\Services;
use App\Model\Order as OrderModel;
use DB;
use App\Model\User as UserModel;
use Carbon\Carbon;

class User
{
	public function Register($request){
		DB::beginTransaction();
		if ($request->email) {
         $array=[
            'name'=>$request->name,
            'email'=>$request->email,
            'user_type'=>$request->user_type,
            'phone'=>$request->phone,
            'password'=>$request->password,
         ];
         $res=UserModel::create($array);
         \Mail::to($request->email)->send(new \App\Mail\RegisterMail($array));
   		}
      if ($res) {
         DB::commit();
         return true;
      }
      DB::rollBack();
      return false;

	}
	public function UserInfo($request)
   	{
   		$getdata = UserModel::all();
   		return $getdata;
	}
	public function Delete($request)
   	{
   		DB::beginTransaction();
		$user = UserModel::find($request->id);    
		$user->delete();
		if ($user) {
         DB::commit();
         return true;
	    }
	      DB::rollBack();
	      return false;
	}
	public function Update($request)
   	{
   		DB::beginTransaction();
		$user = UserModel::find($request->id);
		$user->name=$request->name;
		$user->email=$request->email;
		$user->user_type=$request->user_type;
		$user->phone=$request->phone;
		$user->password=$request->password;
		$user->save();
		if ($user) {
         DB::commit();
         return true;
	    }
	      DB::rollBack();
	      return false;
	}

}

