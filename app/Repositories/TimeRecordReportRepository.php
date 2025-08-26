<?php

namespace App\Repositories;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TimeRecordReportRepository
{

    public function getAllRegistersByPeriod(Carbon $start, Carbon $end): array
    {
        $sql = "
        SELECT t.id AS 'id',
               employee.name AS 'employee_name',
               employee.position AS 'employee_position',
               TIMESTAMPDIFF(YEAR, employee.birth_date, CURDATE()) AS 'employee_age',
               t.type AS 'record_type',
               t.recorded_at AS 'record_recorded_at',
               admin.name  AS 'admin_name'
        FROM time_records AS t
        JOIN users AS employee ON t.user_id = employee.id
        JOIN users AS admin ON employee.created_by = admin.id
        WHERE t.recorded_at BETWEEN ? AND ?
        ORDER BY record_recorded_at DESC
        ";

        return DB::select($sql, [
            $start->toDateTimeString(),
            $end->toDateTimeString()
        ]);
    }
}
