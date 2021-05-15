<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    // protected $table = 'employees';
    // protected $primaryKey= 'id';

    protected $fillable = [
        'name',
        'userid',
        'email',
        'designation',
        'salary',
        'photo',
        'remarks'
    ];

    // public function salaries()
    // {
    //     return $this->hasMany(SalaryProcess::class);
    // }

}
