<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{

    use HasFactory ;

    protected $primaryKey = 'product_id' ;
    public $incrementing = true; // Ensures it auto-increments
    protected $keyType = 'int'; 

    protected $fillable =[

        "oner_id",

        "img" ,
        "price" ,
        "title" ,
        "description" ,
        "to_sell",
    ];

    protected $table = 'products' ;

    public $timestamps = false ;

}
