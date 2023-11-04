<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use App\Models\BudgetForecast;
use App\Models\CashForecast;
use App\Models\E_business_info;
use App\Models\E_personal_info;
use App\Models\ELoan;
use App\Models\Entrepreneur_info;
use App\Models\FundRelease;
use App\Models\Pfi;
use App\Models\Repayment;
use App\Models\SourcesOfFund;
use App\Models\User;
use App\Models\VarianceAnalysis;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

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
    public function index(){

        return view('dashboard');
    }

}
