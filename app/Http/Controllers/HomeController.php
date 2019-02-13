<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\CityController;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function loadPageContent(Request $request)
    {
      switch ($request['page']) {
        case 'employees':
          $employeeCtrlr = new EmployeeController;
          return $employeeCtrlr->index();
          break;
        case 'department':
          $departmentCtrlr = new DepartmentController;
          return $departmentCtrlr->index();
          break;
        case 'division':
          $divisionCtrlr = new DivisionController;
          return $divisionCtrlr->index();
          break;
        case 'country':
          $countryCtrlr = new CountryController;
          return $countryCtrlr->index();
          break;
        case 'state':
          $stateCtrlr = new StateController;
          return $stateCtrlr->index();
          break;
        case 'city':
          $cityCtrlr = new CityController;
          return $cityCtrlr->index();
          break;
        case 'user-profile':

          break;
        case 'user-list':
            $userCtrlr = new UserController;
            return $userCtrlr->index();
          break;
        default:
          return response()->view('test');
      }

    }
}
