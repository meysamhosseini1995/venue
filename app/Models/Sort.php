<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Sort extends Model
{
    use HasFactory;


    protected $fillable = [
        'sortable_id',
        'sortable_type',
        'venue_id',
        'sortId'
    ];

    /**
     * Get the parent sortable model
     */
    public function sortable(): MorphTo
    {
        return $this->morphTo();
    }
}
