<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculums extends Model
{
    use HasFactory;
    protected $fillable=['id','year_id','title','description','image'];
    public function years()
    {
        return $this->belongsTo(YearController::class,'year_id');
    }
}
