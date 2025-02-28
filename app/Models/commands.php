<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;



use Illuminate\Database\Eloquent\Model;

class Commands extends Model
{
    use HasFactory ;

    
    protected $fillable =[
        "oner_id" ,
        "vendor_id" ,
        "confirmed" ,
        "product_id",
    ];

    protected $table = 'commands' ;
}
