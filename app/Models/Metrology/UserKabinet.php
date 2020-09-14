<?php

namespace App\Models\Metrology;

use Illuminate\Database\Eloquent\Model;

class UserKabinet extends Model
{
    protected $fillable = [
        'user_id',
        'kabinet_id'
    ];

    public $timestamps = false;

    protected $primaryKey = 'user_id';
}
