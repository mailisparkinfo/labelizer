<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CreateProduct;

class CreatedProductsController extends Controller
{
    public function __construct()
    {
        $this->CreateProductService = new CreateProduct();
    }
    public function SaveProduct(Request $request)
    { 
    	try {
        $res = $this->CreateProductService->SaveProductInfo($request);
        if ($res) {
            $status = 200;
            $message = '';
            return response()->json(
                ['status' => 200, 'data' => $res,'message'=>'Data saved successfully.'],
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
    public function GetAllProducts(Request $request)
    {
        try {
        $res = $this->CreateProductService->GetAllProducts($request);
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
    public function GetProductbyId(Request $request)
    {
        try {
        $res = $this->CreateProductService->GetProductbyId($request);
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
            ['status' => $status, 'data' => '' ,'message'=>'Id does not exist.'],
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
}
