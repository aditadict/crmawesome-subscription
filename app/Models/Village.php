<?php

/*
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 *
 */

namespace App\Models;

use AzisHapidin\IndoRegion\Traits\VillageTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\District;

/**
 * Village Model.
 */
class Village extends Model
{
    use VillageTrait;

    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'villages';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'district_id'
    ];

	/**
     * Village belongs to District.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    // get regencies from district
    public function regency()
    {
        return $this->belongsToThrough(Regency::class, District::class);
    }

    // get provinces from district

    public function province()
    {
        return $this->belongsToThrough(Province::class, District::class);
    }

    // relation for select option concantenated with province, regency, district

    public function getFullNameAttribute()
    {
        return $this->province->name . ', ' . $this->regency->name . ', ' . $this->district->name . ', ' . $this->name;
    }
}