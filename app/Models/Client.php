<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Client extends Authenticatable
{
    use HasFactory;
    public $fillable = ['name', 'email', 'password', 'image'];
    protected $keyType = 'string';
    public $incrementing = false;
    
    public $hidden = ['password'];


protected static function boot()
{
    parent::boot();

    static::creating(function ($model) {
        $model->{$model->getKeyName()} = (string) Str::uuid();
    });
}

}
