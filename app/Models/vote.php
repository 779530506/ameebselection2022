<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\membre;
class vote extends Model
{
    use HasFactory;
    public function membre(){
        return $this->hasOne(membre::class);
    }

}
