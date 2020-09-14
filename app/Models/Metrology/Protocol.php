<?php

namespace App\Models\Metrology;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Protocol extends Model
{
    protected $fillable = [
        'status',
        'date',
        'temperature',
        'davlenie',
        'valazhnost',
        'etalon1_id',
        'etalon2_id',
        'etalon3_id',
        'sit_id',
        'grafik_id',
        'work_id',
        'laboratory_id',
        'user_id',
        'valueEtalon11',
        'valueEtalon12',
        'valueEtalon13',
        'valueEtalon14',
        'valueEtalon15',
        'valueEtalon16',
        'valueSitPryamoy11',
        'valueSitPryamoy12',
        'valueSitPryamoy13',
        'valueSitPryamoy14',
        'valueSitPryamoy15',
        'valueSitPryamoy16',
        'valueSitObratniy11',
        'valueSitObratniy12',
        'valueSitObratniy13',
        'valueSitObratniy14',
        'valueSitObratniy15',
        'valueSitObratniy16',
        'valueEtalon21',
        'valueEtalon22',
        'valueEtalon23',
        'valueEtalon24',
        'valueEtalon25',
        'valueEtalon26',
        'valueSitPryamoy21',
        'valueSitPryamoy22',
        'valueSitPryamoy23',
        'valueSitPryamoy24',
        'valueSitPryamoy25',
        'valueSitPryamoy26',
        'valueSitObratniy21',
        'valueSitObratniy22',
        'valueSitObratniy23',
        'valueSitObratniy24',
        'valueSitObratniy25',
        'valueSitObratniy26',
        'valueEtalon31',
        'valueEtalon32',
        'valueEtalon33',
        'valueEtalon34',
        'valueEtalon35',
        'valueEtalon36',
        'valueSitPryamoy31',
        'valueSitPryamoy32',
        'valueSitPryamoy33',
        'valueSitPryamoy34',
        'valueSitPryamoy35',
        'valueSitPryamoy36',
        'valueSitObratniy31',
        'valueSitObratniy32',
        'valueSitObratniy33',
        'valueSitObratniy34',
        'valueSitObratniy35',
        'valueSitObratniy36',
        'valueEtalon41',
        'valueEtalon42',
        'valueEtalon43',
        'valueEtalon44',
        'valueEtalon45',
        'valueEtalon46',
        'valueSitPryamoy41',
        'valueSitPryamoy42',
        'valueSitPryamoy43',
        'valueSitPryamoy44',
        'valueSitPryamoy45',
        'valueSitPryamoy46',
        'valueSitObratniy41',
        'valueSitObratniy42',
        'valueSitObratniy43',
        'valueSitObratniy44',
        'valueSitObratniy45',
        'valueSitObratniy46',
        'valueEtalon51',
        'valueEtalon52',
        'valueEtalon53',
        'valueEtalon54',
        'valueEtalon55',
        'valueEtalon56',
        'valueSitPryamoy51',
        'valueSitPryamoy52',
        'valueSitPryamoy53',
        'valueSitPryamoy54',
        'valueSitPryamoy55',
        'valueSitPryamoy56',
        'valueSitObratniy51',
        'valueSitObratniy52',
        'valueSitObratniy53',
        'valueSitObratniy54',
        'valueSitObratniy55',
        'valueSitObratniy56',
        'valueEtalon61',
        'valueEtalon62',
        'valueEtalon63',
        'valueEtalon64',
        'valueEtalon65',
        'valueEtalon66',
        'valueSitPryamoy61',
        'valueSitPryamoy62',
        'valueSitPryamoy63',
        'valueSitPryamoy64',
        'valueSitPryamoy65',
        'valueSitPryamoy66',
        'valueSitObratniy61',
        'valueSitObratniy62',
        'valueSitObratniy63',
        'valueSitObratniy64',
        'valueSitObratniy65',
        'valueSitObratniy66',
        'valueEtalon71',
        'valueEtalon72',
        'valueEtalon73',
        'valueEtalon74',
        'valueEtalon75',
        'valueEtalon76',
        'valueSitPryamoy71',
        'valueSitPryamoy72',
        'valueSitPryamoy73',
        'valueSitPryamoy74',
        'valueSitPryamoy75',
        'valueSitPryamoy76',
        'valueSitObratniy71',
        'valueSitObratniy72',
        'valueSitObratniy73',
        'valueSitObratniy74',
        'valueSitObratniy75',
        'valueSitObratniy76',
        'valueEtalon81',
        'valueEtalon82',
        'valueEtalon83',
        'valueEtalon84',
        'valueEtalon85',
        'valueEtalon86',
        'valueSitPryamoy81',
        'valueSitPryamoy82',
        'valueSitPryamoy83',
        'valueSitPryamoy84',
        'valueSitPryamoy85',
        'valueSitPryamoy86',
        'valueSitObratniy81',
        'valueSitObratniy82',
        'valueSitObratniy83',
        'valueSitObratniy84',
        'valueSitObratniy85',
        'valueSitObratniy86',
        'valueEtalon91',
        'valueEtalon92',
        'valueEtalon93',
        'valueEtalon94',
        'valueEtalon95',
        'valueEtalon96',
        'valueSitPryamoy91',
        'valueSitPryamoy92',
        'valueSitPryamoy93',
        'valueSitPryamoy94',
        'valueSitPryamoy95',
        'valueSitPryamoy96',
        'valueSitObratniy91',
        'valueSitObratniy92',
        'valueSitObratniy93',
        'valueSitObratniy94',
        'valueSitObratniy95',
        'valueSitObratniy96',
        'valueEtalon101',
        'valueEtalon102',
        'valueEtalon103',
        'valueEtalon104',
        'valueEtalon105',
        'valueEtalon106',
        'valueSitPryamoy101',
        'valueSitPryamoy102',
        'valueSitPryamoy103',
        'valueSitPryamoy104',
        'valueSitPryamoy105',
        'valueSitPryamoy106',
        'valueSitObratniy101',
        'valueSitObratniy102',
        'valueSitObratniy103',
        'valueSitObratniy104',
        'valueSitObratniy105',
        'valueSitObratniy106',
        'valueEtalon111',
        'valueEtalon112',
        'valueEtalon113',
        'valueEtalon114',
        'valueEtalon115',
        'valueEtalon116',
        'valueSitPryamoy111',
        'valueSitPryamoy112',
        'valueSitPryamoy113',
        'valueSitPryamoy114',
        'valueSitPryamoy115',
        'valueSitPryamoy116',
        'valueSitObratniy111',
        'valueSitObratniy112',
        'valueSitObratniy113',
        'valueSitObratniy114',
        'valueSitObratniy115',
        'valueSitObratniy116',
        'valueEtalon121',
        'valueEtalon122',
        'valueEtalon123',
        'valueEtalon124',
        'valueEtalon125',
        'valueEtalon126',
        'valueSitPryamoy121',
        'valueSitPryamoy122',
        'valueSitPryamoy123',
        'valueSitPryamoy124',
        'valueSitPryamoy125',
        'valueSitPryamoy126',
        'valueSitObratniy121',
        'valueSitObratniy122',
        'valueSitObratniy123',
        'valueSitObratniy124',
        'valueSitObratniy125',
        'valueSitObratniy126',
        'valueEtalon131',
        'valueEtalon132',
        'valueEtalon133',
        'valueEtalon134',
        'valueEtalon135',
        'valueEtalon136',
        'valueSitPryamoy131',
        'valueSitPryamoy132',
        'valueSitPryamoy133',
        'valueSitPryamoy134',
        'valueSitPryamoy135',
        'valueSitPryamoy136',
        'valueSitObratniy131',
        'valueSitObratniy132',
        'valueSitObratniy133',
        'valueSitObratniy134',
        'valueSitObratniy135',
        'valueSitObratniy136',
        'valueEtalon141',
        'valueEtalon142',
        'valueEtalon143',
        'valueEtalon144',
        'valueEtalon145',
        'valueEtalon146',
        'valueSitPryamoy141',
        'valueSitPryamoy142',
        'valueSitPryamoy143',
        'valueSitPryamoy144',
        'valueSitPryamoy145',
        'valueSitPryamoy146',
        'valueSitObratniy141',
        'valueSitObratniy142',
        'valueSitObratniy143',
        'valueSitObratniy144',
        'valueSitObratniy145',
        'valueSitObratniy146',
        'valueEtalon151',
        'valueEtalon152',
        'valueEtalon153',
        'valueEtalon154',
        'valueEtalon155',
        'valueEtalon156',
        'valueSitPryamoy151',
        'valueSitPryamoy152',
        'valueSitPryamoy153',
        'valueSitPryamoy154',
        'valueSitPryamoy155',
        'valueSitPryamoy156',
        'valueSitObratniy151',
        'valueSitObratniy152',
        'valueSitObratniy153',
        'valueSitObratniy154',
        'valueSitObratniy155',
        'valueSitObratniy156',
        'valueEtalon161',
        'valueEtalon162',
        'valueEtalon163',
        'valueEtalon164',
        'valueEtalon165',
        'valueEtalon166',
        'valueSitPryamoy161',
        'valueSitPryamoy162',
        'valueSitPryamoy163',
        'valueSitPryamoy164',
        'valueSitPryamoy165',
        'valueSitPryamoy166',
        'valueSitObratniy161',
        'valueSitObratniy162',
        'valueSitObratniy163',
        'valueSitObratniy164',
        'valueSitObratniy165',
        'valueSitObratniy166',
    ];

    public function sit()
    {
        return $this->belongsTo(Sit::class, 'sit_id', 'id');
    }

    public function grafik()
    {
        return $this->hasOne(Grafik::class, 'id', 'grafik_id');
    }

    public function work()
    {
        return $this->belongsTo(Work::class, 'work_id', 'id');
    }

    public function laboratory()
    {
        return $this->belongsTo(Laboratory::class, 'laboratory_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function etalon1()
    {
        return $this->belongsTo(Sit::class, 'etalon1_id', 'id');
    }

    public function etalon2()
    {
        return $this->belongsTo(Sit::class, 'etalon2_id', 'id');
    }

    public function etalon3()
    {
        return $this->belongsTo(Sit::class, 'etalon3_id', 'id');
    }

    public function raschetAbsPoh($izmerenie, $etalon)
    {
        $result = $this->attributes[$izmerenie] - $this->attributes[$etalon];

        return $result;
    }

    public function raschetVidnPoh($izmerenie, $etalon)
    {
        if ($this->attributes[$etalon] == 0) return $result = 0;

        $abs = $this->raschetAbsPoh($izmerenie, $etalon);
        $result = round(abs($abs) / $this->attributes[$etalon] * 100, 2);

        return $result;
    }

    public function raschetZvedPoh($izmerenie, $etalon, $maxPredel)
    {
        $abs = $this->raschetAbsPoh($izmerenie, $etalon);
        $result = round(abs($abs) / $maxPredel * 100, 2);

        return $result; /*TODO: Когда предел равен 0 - ошибка функции*/
    }

    public function getValue($value)
    {
        $result = $this->attributes[$value];
        return $result;
    }
}
