<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Services\ProductListing;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductListingController extends Controller
{
	public function __construct()
    {
        $this->ProductListingService = new ProductListing();
    }
    public function GetProduct(Request $request)
    {
	    try {
        $res = $this->ProductListingService->GetProductInfo($request);
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

}

