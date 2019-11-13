<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Services\EmployeeService;
use App\Services\DepartmentService;

class ApiController extends Controller
{
    /**
     * @var \App\Services\EmployeeService
     */
    private $employeeService;

    /**
     * @var \App\Services\DepartmentService
     */
    private $departmentServece;

    public function __construct(EmployeeService $employeeService, DepartmentService $departmentServece)
    {
        $this->employeeService = $employeeService;
        $this->departmentServece = $departmentServece;
    }

    /**
     * Retorna o total de Funcionários
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTotalEmployees(): JsonResponse
    {
        $result = $this->employeeService->getTotalEmployees();

        if (!$result['success']) {
            return response()->json([
                'success' => false,
                'message' => $result['message']
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'Total de funciários encontrados com sucesso!',
            'data'    => $result['data']
        ], 200);
    }

    /**
     * Retorna uma Lista de Funcionários com sua evolução salarial
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAnnualEmployeeSalary(Request $request): JsonResponse
    {
        $result = $this->employeeService->getAnnualEmployeeSalary($request->skip, $request->limit);

        if (!$result['success']) {
            return response()->json([
                'success' => false,
                'message' => $result['message']
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'Lista de funciários encontrada com sucesso!',
            'data'    => $result['data']
        ], 200);
    }

    /**
     * Retorna a lista de departamentos com o total de salários e percentual sob o total geral
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDepartmentsForPayments(): JsonResponse
    {
        $result = $this->departmentServece->getDepartmentsForPayments();

        if (!$result['success']) {
            return response()->json([
                'success' => false,
                'message' => $result['message']
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'Lista de Departamentos encontrada com sucesso!',
            'data'    => $result['data']
        ], 200);
    }
}
