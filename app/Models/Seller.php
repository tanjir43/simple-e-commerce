<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Seller extends Authenticatable
{
    use HasFactory;

    protected $guard ='sellers';
    protected $filllable = ['full_name','username','email','email_verified_at','password','is_verified','photo','address','phone','status'];
}
