<?php

namespace App\Models;

use App\Concers\GenderEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function commune(): BelongsTo
    {
        return $this->belongsTo(Commune::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'date_naissance' => 'date',
        'carte_electeur' => 'integer',
        'gender' => GenderEnum::class,
    ];

    public function mariage(): HasOne
    {
        return $this->hasOne(Mariage::class);
    }
}
