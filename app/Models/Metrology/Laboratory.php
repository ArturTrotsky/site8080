<?php

namespace App\Models\Metrology;

use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    protected $fillable = ['name', 'name_full', 'address', 'dir_posada', 'dir_name', 'edrpou', 'tel', 'iban'];
}
