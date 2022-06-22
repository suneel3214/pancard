<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;


class Package extends Model
{
    use HasFactory;

    protected $table = 'packages';

    protected $fillable = [
        'name',
        'role_id',
        'amount',
        'discount',
        'description',
    ];

    public function roles(){
        return  $this->belongsTo(Role::class , 'role_id','id');
    }
}
