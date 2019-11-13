<?php

Route::prefix('v1')->group(function () {
    Route::post('get-total-employees', 'ApiController@getTotalEmployees');
    Route::post('get-annual-employee-salary', 'ApiController@getAnnualEmployeeSalary');
    Route::post('get-departments-for-payments', 'ApiController@getDepartmentsForPayments');
});
