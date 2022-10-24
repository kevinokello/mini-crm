<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'branch',
        'department',
        'website',
        'logo',
   
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'company_id', 'id');
    }
}
