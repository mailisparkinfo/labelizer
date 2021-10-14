<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductListing extends Model
{
    protected $fillable = [
        'created_id', 'color_option', 'other_option',
    ];

}
