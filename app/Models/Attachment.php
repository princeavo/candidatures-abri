<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attachment extends Model
{
    protected $fillable = [
        'application_id',
        'type',
        'original_name',
        'storage_path',
        'mime_type',
        'size_bytes',
    ];

    public function application(): BelongsTo
    {
        return $this->belongsTo(Application::class);
    }
}
