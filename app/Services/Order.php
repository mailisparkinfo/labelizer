<?php

namespace App\Services;
use App\Model\Order as OrderModel;
use DB;
use App\Model\User;
use Carbon\Carbon;

class Order
{
	
   public function GetOrderInfo($request)
   {
         $getdata = OrderModel::all();
         return $getdata;
   }
	public function SaveOrder($request)
   	{
   	DB::beginTransaction();
   	if ($request->user_id) {
         $array=[
            'user_id'=>$request->user_id,
            'created_product_id'=>$request->created_product_id,
            'product_listing_id'=>$request->product_listing_id,
            'customer_name'=>$request->customer_name,
            'company_name'=>$request->company_name,
            'quantity'=>$request->quantity,
            'order_date'=>$request->order_date,
            'payment_status'=>$request->payment_status,
         ]; //dd($array);
         $res=OrderModel::create($array);
   	}
      if ($res) {
         DB::commit();
         return true;
      }
      DB::rollBack();
      return false;
   	
	}

}

