<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostalCode extends Model
{
    protected $fillable = [
        'postal_code',
        'urban_village',
        'sub_district',
        'district_city',
        'province',
    ];
}
