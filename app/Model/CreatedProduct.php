<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CreatedProduct extends Model
{

	protected $table = 'created_products';
	Protected $primaryKey = "id";
    protected $fillable = [
        'user_id','product_id','name','type','tag_line_1','tag_line_2','Alc/Vol','Volume','label_image','color'
    ];

}
