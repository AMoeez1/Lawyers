<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    public $fillable = ['email', 'title', 'details', 'price'];

    public function user(){
        return $this->belongsTo(User::class,'email','email');
    }
}
