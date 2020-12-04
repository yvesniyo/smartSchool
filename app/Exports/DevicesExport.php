<?php

namespace App\Exports;

use App\Models\Device;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DevicesExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection()
    {
        return Device::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            trans('admin.device.columns.id'),
            trans('admin.device.columns.uuid'),
            trans('admin.device.columns.version'),
            trans('admin.device.columns.admin_user_id'),
            trans('admin.device.columns.enabled'),
            trans('admin.device.columns.school_id'),
        ];
    }

    /**
     * @param Device $device
     * @return array
     *
     */
    public function map($device): array
    {
        return [
            $device->id,
            $device->uuid,
            $device->version,
            $device->admin_user_id,
            $device->enabled,
            $device->school_id,
        ];
    }
}
