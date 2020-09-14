<?php

namespace App\Models\Metrology;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Grafik extends Model
{
    protected $fillable = ['sit_id', 'next_id', 'datePlanWork', 'dateFactWork',
        'status_id', 'work_id', 'laboratory_id', 'laboratoryMesto_id', 'dateInbox', 'dateOutbox', 'protocol_id'];

    public function sit()
    {
        return $this->belongsTo(Sit::class, 'sit_id', 'id');
    }

    public function protocol()
    {
        return $this->belongsTo(Protocol::class, 'protocol_id', 'id');
    }

    public function setProtocol($id)
    {
        if ($id == null) {
            return;
        }
        $this->protocol_id = $id;
        $this->save();
    }

    public function delProtocol()
    {
        $this->protocol_id = null;
        $this->save();
    }

    public function work()
    {
        return $this->belongsTo(Work::class, 'work_id', 'id');
    }

    public function laboratory()
    {
        return $this->belongsTo(Laboratory::class, 'laboratory_id', 'id');
    }

    public function laboratoryMesto()
    {
        return $this->belongsTo(Laboratory::class, 'laboratoryMesto_id', 'id');
    }

    public function setFields($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function addNextDatePlanWork()
    {
        $this->dateNextWork = Carbon::parse($this->attributes['dateLastWork'])->
        addMonth($this->attributes['periodMetrology'])->
        format('Y-m-d');

        $this->save();
    }

    public function maxAllowDateInbox()
    {
        if (empty(self::protocol()->get()->implode('date'))) $dateProtocol = null;
        else $dateProtocol = self::protocol()->get()->implode('date');

        $arr = [$this->dateOutbox, $this->dateFactWork, $dateProtocol];
        $min = null;

        foreach ($arr as $value) {
            if (!$value) continue;
            if ($value < $min or $min === null) {
                $min = $value;
            }
        }

        if ($min === null) $min = 0;
        return $min;
    }

    public function minAllowDateOutbox()
    {
        if (empty(self::protocol()->get()->implode('date'))) $dateProtocol = null;
        else $dateProtocol = self::protocol()->get()->implode('date');

        $arr = [$this->dateInbox, $this->dateFactWork, $dateProtocol];
        $max = null;

        foreach ($arr as $value) {
            if (!$value) continue;
            if ($value > $max or $max === null) {
                $max = $value;
            }
        }

        if ($max === null) $max = 0;
        return $max;
    }

    public function minAllowDateFactWork()
    {
        if (empty(self::protocol()->get()->implode('date'))) {
            if (empty($this->dateInbox)) return 0;
            else return $this->dateInbox;
        } else {
            $dateProtocol = self::protocol()->get()->implode('date');
            return $dateProtocol;
        }
    }

    public function maxAllowDateFactWork()
    {
        if (empty(self::protocol()->get()->implode('date'))) {
            if (empty($this->dateOutbox)) return 0;
            else return $this->dateOutbox;
        } else {
            $dateProtocol = self::protocol()->get()->implode('date');
            return $dateProtocol;
        }
    }

    public function setColor()
    {
        if ($this->dateFactWork != null) $color = null;

        else {
            if ($this->datePlanWork < Carbon::now()) {
                $color = ('red');
            } elseif ($this->datePlanWork < Carbon::now()->addDays(14)) {
                $color = ('yellow');
            } else $color = null;
        }

        return $color;
    }
}
