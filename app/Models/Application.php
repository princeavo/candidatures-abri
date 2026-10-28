<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Application extends Model
{
    protected $fillable = [
        'uuid',
        'reference_code',
        'candidacy_type',
        'first_name',
        'last_name',
        'gender',
        'date_of_birth',
        'nationality',
        'phone',
        'email',
        'profession',
        'organization',
        'department',
        'municipality',
        'invention_name',
        'sector',
        'summary',
        'form_data',
        'submitted_at',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'submitted_at' => 'datetime',
        'form_data' => 'array',
    ];

    public function attachments(): HasMany
    {
        return $this->hasMany(Attachment::class);
    }
}
