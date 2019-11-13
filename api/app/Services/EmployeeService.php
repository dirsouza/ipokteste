<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Employee;
use Carbon\Carbon;

class EmployeeService
{
    /**
     * @var \App\Models\Employee
     */
    private $employeeModel;

    public function __construct(Employee $employeeModel)
    {
        $this->employeeModel = $employeeModel;
    }

    /**
     * Retorna o total de Funcionários
     *
     * @return array
     */
    public function getTotalEmployees(): array
    {
        try {
            $count = $this->employeeModel->count();
            
            return [
                'success' => true,
                'data'    => $count
            ];
        } catch (\Throwable $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    /**
     * Retorna uma Lista de Funcionários com sua evolução salarial
     *
     * @param int $skip
     * @param int $limit
     *
     * @return array
     */
    public function getAnnualEmployeeSalary(int $skip = 0, int $limit = 10): array
    {
        try {
            $employees = $this->employeeModel
                ->with('salaries')
                ->skip($skip)
                ->limit($limit)
                ->get()
                ->map(function($employee) {
                    return [
                        'name'      => "{$employee->first_name} {$employee->last_name}",
                        'salaries'  => $employee->salaries->map(function($salary) {
                            return [
                                'salary' => $salary->salary,
                                'year'   => Carbon::createFromFormat('Y-m-d', $salary->from_date)->year
                            ];
                        })
                    ];
                });

            return [
                'success' => true,
                'data'    => $employees
            ];
        } catch (\Throwable $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}
