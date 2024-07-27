<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Venue extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','description', 'image', 'address','phone','latitude','longitude', 'sortid'
    ];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function propertyTypes(): BelongsToMany
    {
        return $this->belongsToMany(PropertyType::class, 'venue_property_type');
    }

    public function venueTypes(): BelongsToMany
    {
        return $this->belongsToMany(VenueType::class, 'venue_venue_type');
    }
}
