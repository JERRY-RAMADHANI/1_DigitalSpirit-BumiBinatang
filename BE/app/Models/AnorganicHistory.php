<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnorganicHistory extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the AnorganicHistory
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function authorAnorganic(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
