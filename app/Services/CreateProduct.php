<?php

namespace App\Services;
use App\Model\CreatedProduct;
use DB;
use App\Model\User;
use Carbon\Carbon;

class CreateProduct
{
	
	public function SaveProductInfo($request)
   	{
   	DB::beginTransaction();
   	if ($request->user_id) {
         $array=[
            'user_id'=>$request->user_id,
            'product_id'=>$request->product_id,
            'name'=>$request->name,
            'type'=>$request->type,
            'tag_line_1'=>$request->tag_line_1,
            'tag_line_2'=>$request->tag_line_2,
            'Alc/Vol'=>$request->Alc_Vol,
            'Volume'=>$request->Volume,
            'color'=>$request->color
         ];
         $res=CreatedProduct::create($array);
   	}
      if ($res) {
         DB::commit();
         return true;
      }
      DB::rollBack();
      return false;
   	
	}
   public function GetAllProducts($request)
   {
         $getdata = CreatedProduct::all();
         return $getdata;
   }

   public function GetProductbyId($request)
   {
         $getdata = CreatedProduct::find($request->id);
         return $getdata;
   }
}

