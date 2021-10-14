<?php

namespace App\Services;
use App\Model\ProductListing as ProductListingModel;

class ProductListing
{
	
	public function GetProductInfo($request)
   	{
   		$getdata = ProductListingModel::all();
   		return $getdata;
	}
}
