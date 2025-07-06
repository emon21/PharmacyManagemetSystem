<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProfile extends Model
{
    use HasFactory;

    protected $table = 'user_profiles';

    protected $guarded = [];

    # Relationship on User

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
