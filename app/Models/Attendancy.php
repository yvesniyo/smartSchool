<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Attendancy extends Model
{
    protected $fillable = [
        'notified',
        'student_id',

    ];


    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $appends = ['resource_url', 'attended_at'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/attendancies/' . $this->getKey());
    }


    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function getAttendedAtAttribute()
    {

        return $this->created_at->diffForHumans();
    }
}
