<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Listing extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $hidden = ['types'];
    protected $appends = ['typeNames'];
    // typeNames
    public function getTypeNamesAttribute()
    {
        return $this->types->pluck('name');
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function listingTypes(): HasMany
    {
        return $this->hasMany(ListingType::class);
    }

    public function types(): BelongsToMany
    {
        return $this->belongsToMany(Type::class);
    }

}
