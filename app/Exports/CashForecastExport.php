<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Quarter;
use App\Models\Category;
use App\Models\Component;
use App\Models\CashForecast;
use App\Models\ClosingCashForecast;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CashForecastExport implements FromView
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function view(): View
    {

        $categories = Category::pluck('name','id');
        $components = Component::pluck('name','id');
        $quarter = Quarter::findOrFail($this->id);
        $selectedQuarter=$quarter->start_date.'-'.$quarter->end_date;
        $currentYear = Carbon::now()->year;
        $quarterForYear = Quarter::whereRaw("YEAR(STR_TO_DATE(start_date, '%d/%m/%Y')) = ?", [$currentYear])->get()->pluck('id');

        $cashForecasts= CashForecast::with('donor')->where('quarter_id', $this->id)->get();
        $donors=$cashForecasts->groupBy('donor.id');
        $data = [
            'categories' => $categories,
            'components' => $components,
            'quarter' => $quarter,
            'selectedQuarter' => $selectedQuarter,
            'cashForecasts' => $cashForecasts,
            'donors' => $donors,
            'quarterForYear' => $quarterForYear,
            // Add more data from other tables
        ];
        // dd($data);
        return view('admin.cashForecast.excel_report', $data);
    }
}
