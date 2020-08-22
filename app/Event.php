<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    const RECURRENCIES = [
        0 => 'Semanal',
        1 => 'Mensal',
        2 => 'Semestral',
        3 => 'Anual',
    ];

    protected $fillable = [
        'name',
        'description',
        'date',
        'recurrency',
        'active',
    ];

    protected $dates = ['date'];

    public function getRecurrencyNameAttribute()
    {
        return self::RECURRENCIES[$this->recurrency];
    }

    public function getNextDateAttribute()
    {
        switch ($this->recurrency) {
            case 0:
                return $this->date->addWeeks(1);
                break;
            case 1:
                return $this->date->addMonths(1);
                break;
            case 2:
                return $this->date->addMonths(6);
                break;
            case 3:
                return $this->date->addYears(1);
                break;

            default:
                return $this->date;
                break;
        }
    }

    public function updateDate()
    {
        $this->date = $this->getNextDateAttribute();
        $this->save();
    }
}
