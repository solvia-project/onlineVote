<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'election_id',
        'position_id',
        'name',
        'bio',
        'image_path',
    ];

    protected $appends = [
        'image_url',
    ];

    public function election(): BelongsTo
    {
        return $this->belongsTo(Election::class);
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }

    public function getImageUrlAttribute(): ?string
    {
        $p = $this->image_path;
        if (!$p) {
            return null;
        }
        if (Str::startsWith($p, ['http', '/storage'])) {
            return $p;
        }
        $relative = trim($p, '/');
        return Storage::url($relative);
    }
}
