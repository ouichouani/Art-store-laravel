<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{

    use HasFactory ;
    protected $primaryKey = 'product_id' ;
    protected $fillable =[

        "oner_id",
        "command_id",

        "img" ,
        "price" ,
        "title" ,
        "description" ,
        "to_sell",
    ];

    protected $table = 'products' ;

    public $timestamps = false ;

}
