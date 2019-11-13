<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $table = 'salaries';
    protected $primaryKey = 'emp_no';

    public function employees()
    {
        return $this->belongsTo(Employee::class, 'emp_no', 'emp_no');
    }
}
