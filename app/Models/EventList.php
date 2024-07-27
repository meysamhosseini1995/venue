<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EventList extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
