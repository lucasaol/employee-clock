<?php

namespace App\Models;

use App\Enums\Role;
use Carbon\Carbon;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'document',
        'position',
        'birth_date',
        'email',
        'password',
        'created_by'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => Role::class,
        ];
    }

    public function is_admin(): bool
    {
        return $this->role === Role::ADMIN;
    }

    public function is_employee(): bool
    {
        return $this->role === Role::EMPLOYEE;
    }

    public function setDocumentAttribute(string $value): void
    {
        $this->attributes['document'] = preg_replace('/\D/', '', $value);
    }

    public function setBirthDateAttribute(string $value): void
    {
        $this->attributes['birth_date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }

    public function timeRecords(): HasMany
    {
        return $this->hasMany(TimeRecord::class);
    }
}
