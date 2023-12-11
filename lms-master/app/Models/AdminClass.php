<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminClass extends Model
{
    use HasFactory;
    protected $fillable=['id','name','startdate','enddate','duration'];
}
