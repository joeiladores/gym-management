<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Member extends Model
{
    use HasFactory;

    protected $table = 'members';

    protected $fillable = [
        'name',
        'email',
        'membership_type',
        'membership_expiration',
    ];

    // public function membership()
    // {
    //     return $this->belongsTo(Membership::class);
    // }

    // public function trainer()
    // {
    //     return $this->belongsTo(Trainer::class);
    // }

    
}
