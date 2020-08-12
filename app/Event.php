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
}
