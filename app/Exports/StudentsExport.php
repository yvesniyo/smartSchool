<?php

namespace App\Exports;

use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StudentsExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection()
    {
        return Student::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            trans('admin.student.columns.id'),
            trans('admin.student.columns.first_name'),
            trans('admin.student.columns.last_name'),
            trans('admin.student.columns.nfc'),
            trans('admin.student.columns.parent_phone_number'),
            trans('admin.student.columns.is_active'),
        ];
    }

    /**
     * @param Student $student
     * @return array
     *
     */
    public function map($student): array
    {
        return [
            $student->id,
            $student->first_name,
            $student->last_name,
            $student->nfc,
            $student->parent_phone_number,
            $student->is_active,
        ];
    }
}
