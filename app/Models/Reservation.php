<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'date',
        'time',
        'guests',
        'status', // Assuming there's a status column, good practice to include if we update it later
        'notes'   // Assuming there might be notes
    ];
}
