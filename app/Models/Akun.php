<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    protected $primaryKey = 'username';
    public $incrementing = false;
    protected $table = 'account';
    public $timestamps = false;

}

