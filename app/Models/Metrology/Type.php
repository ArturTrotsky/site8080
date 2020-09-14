<?php

namespace App\Models\Metrology;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'name',
        'naimen_id',
        'kabinet_id',
        'group_id',
        'periodPpr',
        'periodTo',
        'periodVerification',
        'cenaKalibrovki',
        'kodKalibrovki',
        'cenaPoverki',
        'kodPoverki'
    ];

    public function naimen()
    {
        return $this->belongsTo(Naimen::class, 'naimen_id');
    }

    public function kabinet()
    {
        return $this->belongsTo(Kabinet::class, 'kabinet_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
}
