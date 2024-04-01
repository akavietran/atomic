<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\DepartmentController;

class ComposerDepartmentProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        View::composer(['Departments.index', 'Departments.edit', 'Departments.create'], function ($view) {
            $departmentController = app()->make(DepartmentController::class);
            $viewName = $view->getName();
    
            if ($viewName === 'Departments.index') {
                $params = $departmentController->getViewParams('index');
            } elseif ($viewName === 'Departments.FormEditDepartment') {
                $id = $view->getData()['department']->id;
                $params = $departmentController->getViewParams('edit', $id);
            } elseif ($viewName === 'Departments.FormCreateDepartment') {
                $params = $departmentController->getViewParams('create');
            }
    
            $view->with($params);
        });
    }
}
