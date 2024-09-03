<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'company'; // Specify the table name if different from the model name convention

    protected $fillable = [
        'name',
        'email',
        'address',
        'department',
    ]; // Define fillable fields

    protected $hidden = [
        'remember_token',
    ];
}
