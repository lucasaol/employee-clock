<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dashboard\TimeRecordsReportRequest;
use App\Repositories\TimeRecordReportRepository;
use Carbon\Carbon;
use Illuminate\View\View;

class DashboardController extends Controller
{

    public function __construct(private TimeRecordReportRepository $repository)
    {
    }

    public function index(TimeRecordsReportRequest $request): View
    {
        $records = [];
        if (auth()->user()->is_admin()) {
            $start = $request->input('start')
                ? Carbon::parse($request->input('start'))->startOfDay()
                : now()->startOfMonth()->startOfDay();

            $end = $request->input('end')
                ? Carbon::parse($request->input('end'))->endOfDay()
                : now()->endOfDay();

            $records = $this->repository->getAllRegistersByPeriod($start, $end);
        }
        return view('dashboard.dashboard', compact('records'));
    }

}
