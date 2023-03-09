<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndividualCases extends Model
{
    use HasFactory;
    
    public $table = 'individual_cases';

    public $fillable = [
        'no',
        'idkd',
        'idkd_address',
        'lat',
        'long',
        'city',
        'subdistrict',
        'region',
        'count_of_cases',
        'age',
        'age_group',
        'sex',
        'transmission',
        'year',
    ];
}
