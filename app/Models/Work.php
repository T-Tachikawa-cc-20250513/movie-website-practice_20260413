<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = [
        'work_name',
        'category_id',
        'genre_id',
        'release_year',
        'image_path',
        'maker_id',
        'country_id'
    ];

    public function castMembers()
{
    return $this->belongsToMany(Cast::class);
}
    public function maker()
    {
        return $this->belongsTo(Maker::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function awards()
    {
        return $this->belongsToMany(Award::class);
    }
    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class);
    }
}
