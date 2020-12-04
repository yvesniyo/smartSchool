<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'nfc',
        'parent_phone_number',
        'is_active',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url', "full_name"];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/students/' . $this->getKey());
    }


    public function attendancies()
    {
        return $this->hasMany(Attendancy::class);
    }


    public function getParentPhoneAttribute()
    {
        return $this->parent_phone_number;
    }


    public function getFullNameAttribute()
    {
        return $this->last_name . " " . $this->first_name;
    }
}
