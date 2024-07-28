<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class PropertyType extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug'
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function venues(): BelongsToMany
    {
        return $this->belongsToMany(Venue::class, 'venue_property_type');
    }

    /**
     * Get all the phone's center.
     */
    public function sorts(): MorphMany
    {
        return $this->morphMany(Sort::class, 'sortable');
    }
}
