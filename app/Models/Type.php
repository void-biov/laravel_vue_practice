<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Type extends Model
{
    use HasFactory;
    public $timestamps = false;
    // protected $visible = ['name'];
    public function listings(): BelongsToMany
    {
        return $this->belongsToMany(Listing::class);
    }

    protected $fillable=[
        'name'
    ];

    // public function toArray(){
    //     return [$this->name];
    // }

}
