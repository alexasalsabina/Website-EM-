<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventFoto extends Model
{
    protected $fillable = ['event_id', 'foto'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
