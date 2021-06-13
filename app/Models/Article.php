<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    
    /* 
        Enables to change the information in the specified column.
    */
    protected $fillable = ['title', 'body'];    
}
