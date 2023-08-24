<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_id',
        'sheet_id',
        'date',
        'name',
        'email'
    ];

    public function sheet()
    {
        return $this->belongsTo(Sheet::class);
    }
}
