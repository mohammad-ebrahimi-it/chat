<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static latest()
 * @property mixed $user_id
 */
class Message extends Model
{
    use HasFactory;

    const  BODY='body', SELF_OWNED='selfOwned';

    protected $appends = [self::SELF_OWNED];

    public function getSelfOwnedAttribute(): bool
    {
        return $this->user_id === auth()->user()->id;
    }

    protected $fillable = [ self::BODY];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
