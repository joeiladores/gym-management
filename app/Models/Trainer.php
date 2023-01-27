<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    protected $table = 'trainers';

    protected $fillable = [
        'name',
        'email',
        'specialization',
        'phone',
    ];

    // A trainer can have multiple members
    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
