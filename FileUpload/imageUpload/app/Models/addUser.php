<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addUser extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $primaryKey = "employeeId";
}