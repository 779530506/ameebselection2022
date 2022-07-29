<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\vote;
class membre extends Model
{
    use HasFactory;


    public function vote(){
        return $this->belongsTo(vote::class);
     }
}
