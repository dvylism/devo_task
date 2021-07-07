<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Country extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'updated', 'name', 'country_id', 'flag', 'cases', 'today_cases', 'deaths', 'today_deaths', 'recovered',
        'today_recovered', 'active', 'critical', 'cases_per_one_million', 'deaths_per_one_million', 'tests',
        'tests_per_one_million', 'population', 'continent', 'one_case_per_people', 'one_death_per_people',
        'one_test_per_people', 'undefined', 'active_per_one_million', 'recovered_per_one_million',
        'critical_per_one_million'
    ];

    protected $table = "countries";

}
