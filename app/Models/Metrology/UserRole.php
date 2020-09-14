<?php

namespace App\Models\Metrology;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $fillable = [
        'role_id'
    ];

    public $timestamps = false;

    protected $primaryKey = 'role_id';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault();
    }
}
