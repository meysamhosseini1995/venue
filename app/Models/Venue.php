<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Venue extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','description', 'image', 'address','phone','latitude','longitude', 'sortid'
    ];

    public function eventLists(): BelongsToMany
    {
        return $this->belongsToMany(EventList::class, 'events');
    }


    public function propertyTypes(): BelongsToMany
    {
        return $this->belongsToMany(PropertyType::class, 'venue_property_type');
    }

    public function venueTypes(): BelongsToMany
    {
        return $this->belongsToMany(VenueType::class, 'venue_venue_type');
    }

    public function sort(): HasOne
    {
        return $this->hasOne(Sort::class);
    }

    public function sorts(): HasMany
    {
        return $this->hasMany(Sort::class);
    }
}
