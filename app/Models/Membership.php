<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $table = 'membership';

    protected $fillable = [
        'membership_type',
        'membership_price',
    ];

    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
