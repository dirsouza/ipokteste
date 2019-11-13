<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Department;
use Illuminate\Support\Facades\DB;

class DepartmentService
{
    /**
     * @var \App\Models\Department
     */
    private $departmentModel;

    public function __construct(Department $departmentModel)
    {
        $this->departmentModel = $departmentModel;
    }

    /**
     * Retorna a lista de departamentos com o total de salários e percentual sob o total geral
     *
     * @return array
     */
    public function getDepartmentsForPayments(): array
    {
        try {
            $departments = $this->departmentModel
                ->select('departments.*', DB::raw('SUM(salaries.salary) AS sal_dep_total'))
                ->join('dept_emp', 'departments.dept_no', 'dept_emp.dept_no')
                ->join('employees', 'dept_emp.emp_no', 'employees.emp_no')
                ->join('salaries', 'employees.emp_no', 'salaries.emp_no')
                ->whereYear('dept_emp.to_date', '9999')
                ->whereYear('salaries.to_date', '9999')
                ->groupBy('departments.dept_no')
                ->get();

            $sumSalDepTotal = $departments->sum('sal_dep_total');

            $depSalWithPercent = $departments->map(function (Department $department) use ($sumSalDepTotal) {
                $department->sal_dep_percent = round(($department->sal_dep_total / $sumSalDepTotal) * 100, 2);

                return $department;
            });

            return [
                'success' => true,
                'data'    => $depSalWithPercent
            ];
        } catch (\Throwable $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}
