<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'event_type',
        'event_date',
        'guest_count',
        'message',
        'status' // Assuming status might be useful
    ];
}
