<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';
    protected $primaryKey = 'dept_no';
    protected $keyType = 'string';

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'dept_emp', 'dept_no', 'emp_no')
            ->orderBy('from_date');
    }

    public function managers()
    {
        return $this->belongsToMany(Employee::class, 'dept_manager', 'dept_no', 'emp_no')
            ->orderBy('from_date');
    }
}
