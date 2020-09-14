<?php

namespace App\Models\Metrology;

use Illuminate\Database\Eloquent\Model;

class Period_history extends Model
{
    protected $fillable = ['sit_id', 'sit_period', 'date'];

    public static function add($sit_id, $fields)
    {

        $period = new static();

        $period->fill($fields);
        $period->sit_id = $sit_id;
        $period->sit_period = $fields['period_metrology'];
        $period->save();

        return $period;
    }
}



