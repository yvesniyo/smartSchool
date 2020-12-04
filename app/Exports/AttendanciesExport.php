<?php

namespace App\Exports;

use App\Models\Attendancy;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AttendanciesExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection()
    {
        return Attendancy::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            trans('admin.attendancy.columns.id'),
            trans('admin.attendancy.columns.notified'),
            trans('admin.attendancy.columns.student_id'),
        ];
    }

    /**
     * @param Attendancy $attendancy
     * @return array
     *
     */
    public function map($attendancy): array
    {
        return [
            $attendancy->id,
            $attendancy->notified,
            $attendancy->student_id,
        ];
    }
}
