<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $fillable = [
        'first_name',
        'last_name',
        'company_id',
        'branch',
        'department',
        'email',
        'phone',

    ];
    use HasFactory;
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}
