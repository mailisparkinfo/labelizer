<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Order;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->OrderService = new Order();
    }
    public function GetOrder(Request $request)
    { 
    	try {
        $res = $this->OrderService->GetOrderInfo($request);
        if ($res) {
            $status = 200;
            $message = '';
            return response()->json(
                ['status' => 200, 'data' => $res],
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
        } catch (\Exception $e) {
            return $this->response([
                        'error' => [
                            'message' => $e,
                        ]
                    ]);
        }

    }
    public function InsertOrder(Request $request)
    { 
    	try {
        $res = $this->OrderService->SaveOrder($request);
        if ($res) {
            $status = 200;
            $message = '';
            return response()->json(
                ['status' => 200, 'data' => $res],
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
