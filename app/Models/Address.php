<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{

    protected $fillable = [
        'zipcode',
        'street',
        'number',
        'complement',
        'neighborhood',
        'city',
        'state'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function setZipcodeAttribute(string $value): void
    {
        $this->attributes['zipcode'] = preg_replace('/\D/', '', $value);
    }
}
