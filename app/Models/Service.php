<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_name',
        'created_by',
        'image',
        'description',
    ];

    public function creates(){
       return $this->belongsTo(User::class,'created_by','id');
    }
}


