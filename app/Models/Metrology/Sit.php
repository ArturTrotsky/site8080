<?php

namespace App\Models\Metrology;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Sit extends Model
{
    protected $fillable = [
        'type_id',
        'number',
        'pohibka',
        'podrazdelenie_id',
        'brigade_id',
        'status_id',
        'diapazon',
        'edizm_id',
        'minShkaly',
        'maxShkaly',
        'work_id',
        'periodMetrology',
        'laboratory_id',
        'laboratoryObladnannya_id',
        'laboratoryMesto_id',
        'dateLastWork',
        'dateNextWork',
        'dateBirka'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function podrazdelenie()
    {
        return $this->belongsTo(Podrazdelenie::class, 'podrazdelenie_id');
    }

    public function edizm()
    {
        return $this->belongsTo(Edizm::class, 'edizm_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function work()
    {
        return $this->belongsTo(Work::class, 'work_id');
    }

    public function brigade()
    {
        return $this->belongsTo(Brigade::class, 'brigade_id');
    }

    public function laboratory()
    {
        return $this->belongsTo(Laboratory::class, 'laboratory_id', 'id');
    }

    public function laboratoryMesto()
    {
        return $this->belongsTo(Laboratory::class, 'laboratoryMesto_id', 'id');
    }

    public function laboratoryObladnannya()
    {
        return $this->belongsTo(Laboratory::class, 'laboratoryObladnannya_id', 'id');
    }

    public function inbox()
    {
        return $this->hasMany(Inbox::class, 'sit_id', 'id');
    }

    public function outbox()
    {
        return $this->hasMany(Outbox::class, 'sit_id', 'id');
    }

    public function editDate($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function addDateNextWork()
    {
        $this->dateNextWork = Carbon::parse($this->attributes['dateLastWork'])->
        addMonth($this->attributes['periodMetrology'])->
        format('Y-m-d');

        $this->save();
    }

    public function protocol()
    {
        return $this->HasMany(Protocol::class, 'sit_id', 'id');
    }

    public function getLastProtocol()
    {
        return ($this->protocol()->first() != null)
            ? $this->protocol()->latest()->first()
            : null;
    }

    public function grafik()
    {
        return $this->hasMany(Grafik::class, 'sit_id', 'id');
    }
}
