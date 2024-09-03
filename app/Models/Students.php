<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $table = 'students'; // Specify the table name if different from the model name convention

    protected $fillable = [
        'name',
        'email',
        'address',
        'gender',
        'password',
    ]; // Define fillable fields

    protected $hidden = [
        'remember_token',
        'password',
    ];
}
