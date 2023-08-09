<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingType extends Model
{
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'listing_type';

    public $timestamps = false;
    use HasFactory;
}
