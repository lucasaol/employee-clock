<?php

namespace App\Http\Controllers;

use App\Enums\TimeRecordType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TimeRecordController extends Controller
{

    public function store(Request $request): RedirectResponse
    {
        $lastRecord = $request->user()
            ->timeRecords()
            ->whereDate('recorded_at', today())
            ->latest()
            ->first();

        $newType = match(optional($lastRecord)->type) {
            TimeRecordType::IN => TimeRecordType::OUT,
            default => TimeRecordType::IN,
        };

        $request->user()->timeRecords()->create([
            'type' => $newType,
            'recorded_at' => now()
        ]);

        return redirect(route('dashboard'))->with('success', __($newType->label() . ' registrada'));
    }
}
