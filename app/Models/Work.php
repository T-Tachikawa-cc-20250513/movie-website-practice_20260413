<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = [
        'work_name',
        'category_id',
        'release_year',
        'image_path',
        'maker_id',
        'country_id',
        'duration',
        'description',
        'release_date'
    ];

    public function castMembers()
    {
        return $this->belongsToMany(Cast::class)
            ->withPivot('role_name','job_type');
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
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}
