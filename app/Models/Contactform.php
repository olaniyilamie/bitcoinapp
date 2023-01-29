<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactform extends Model
{
    use HasFactory;

    protected $fillable = ['fullname', 'email', 'subject', 'message'];
}
