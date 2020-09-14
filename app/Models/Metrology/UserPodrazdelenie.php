<?php

namespace App\Models\Metrology;

use Illuminate\Database\Eloquent\Model;

class UserPodrazdelenie extends Model
{
    protected $fillable = [
        'user_id',
        'podrazdelenie_id'
    ];

    public $timestamps = false;

    protected $primaryKey = 'user_id';
}
