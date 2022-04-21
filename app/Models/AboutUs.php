<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

protected  $fillable = ['heading','content','bg_image','signature','happy_customer','experience','return_clients','awards',
                         'photo','full_name','designation','brand_photo'];
}
