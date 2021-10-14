<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\User;

class UserController extends Controller
{
	public function __construct()
    {
        $this->UserService = new User();
    }
 	public function Register(Request $request)
    { 
    	try {
        $res = $this->UserService->Register($request);
        if ($res) {
            $status = 200;
            $message = '';
            return response()->json(
                ['status' => 200, 'data' => $res ,'message'=>'Data saved successfully.'],
                $status
            );
        }else{
            $status = 404;
            $message = '';
            return response()->json(
                ['status' => $status, 'data' => ''],
                $status
            );
        }
        } catch (\Exception $e) {dd($e);
            return $this->response([
                        'error' => [
                            'message' => $e,
                        ]
                    ]);
        }

    }
    public function GetUser	(Request $request)
    {
	    try {
        $res = $this->UserService->UserInfo($request);
        if ($res) {
        $status = 200;
        $message = '';
        return response()->json(
            ['status' => $status, 'data' => $res],
            $status
        );
        }
        else{
        $status = 404;
        $message = '';
        return response()->json(
            ['status' => $status, 'data' => ''],
            $status
        );
        }
        } catch (\Exception $e) {
            return $this->response([
                        'error' => [
                            'message' => $e,
                        ]
                    ]);
        }
    }
    public function DeleteUser(Request $request)
    {
	    try {
        $res = $this->UserService->Delete($request);
        if ($res) {
        $status = 200;
        $message = '';
        return response()->json(
            ['status' => $status, 'data' => $res ,'message'=>"Deleted successfully."],
            $status
        );
        }
        else{
        $status = 404;
        $message = '';
        return response()->json(
            ['status' => $status, 'data' => ''],
            $status
        );
        }
        } catch (\Exception $e) {
            return $this->response([
                        'error' => [
                            'message' => $e,
                        ]
                    ]);
        }
    }
    public function UpdateUser(Request $request)
    {
    	try {
        $res = $this->UserService->Update($request);
        if ($res) {
            $status = 200;
            $message = '';
            return response()->json(
                ['status' => 200, 'data' => $res ,'message'=>'User updated successfully.'],
                $status
            );
        }else{
            $status = 404;
            $message = '';
            return response()->json(
                ['status' => $status, 'data' => ''],
                $status
            );
        }
        } catch (\Exception $e) {dd($e);
            return $this->response([
                        'error' => [
                            'message' => $e,
                        ]
                    ]);
        }

    }


}
