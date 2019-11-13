<?php

namespace App\Models;

use App\Models\Title;
use App\Models\Salary;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'emp_no';

    public function salaries()
    {
        return $this->hasMany(Salary::class, 'emp_no', 'emp_no')
            ->orderBy('from_date');
    }

    public function titles()
    {
        return $this->hasMany(Title::class, 'emp_no', 'emp_no')
            ->orderBy('from_date');
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'dept_emp', 'emp_no', 'dept_no')
            ->orderBy('from_date');
    }

    public function managers()
    {
        return $this->belongsToMany(Department::class, 'dept_manager', 'emp_no', 'dept_no')
            ->orderBy('from_date');
    }
}
