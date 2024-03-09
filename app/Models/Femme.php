<?php

namespace App\Models;

use App\Concers\GenderEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Femme extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'prenon',
        'date_naissance',
        'carte_electeur',
        'photos',
        'commune_id',
        'user_id',
        'gender'
    ];

    protected $casts = [
        'date_naissance' => 'date',
        'carte_electeur' => 'integer',
        'gender' => GenderEnum::class,
    ];
}
