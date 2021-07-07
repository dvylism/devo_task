<?php

namespace App\Http\Controllers;

use App\Country;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CountriesController extends Controller
{

    public function getList()
    {
        return Country::all();
    }

    public function store(array $item)
    {
        $updated = Carbon::createFromTimestamp((int)substr('' . $item['updated'], 0, 10))
            ->toDateTimeString();
        return Country::updateOrCreate([
            'name' => $item['country']
        ], [
            'updated' => $updated,
            'name' => $item['country'],
            'country_id' => $item['countryInfo']['_id'],
            'flag' => $item['countryInfo']['flag'],
            'cases' => $item['cases'],
            'today_cases' => $item['todayCases'],
            'deaths' => $item['deaths'],
            'today_deaths' => $item['todayDeaths'],
            'recovered' => $item['recovered'],
            'today_recovered' => $item['todayRecovered'],
            'active' => $item['active'],
            'critical' => $item['critical'],
            'cases_per_one_million' => $item['casesPerOneMillion'],
            'deaths_per_one_million' => $item['deathsPerOneMillion'],
            'tests' => $item['tests'],
            'tests_per_one_million' => $item['testsPerOneMillion'],
            'population' => $item['population'],
            'continent' => $item['continent'],
            'one_case_per_people' => $item['oneCasePerPeople'],
            'one_death_per_people' => $item['oneDeathPerPeople'],
            'one_test_per_people' => $item['oneTestPerPeople'],
            'undefined' => $item['undefined'],
            'active_per_one_million' => $item['activePerOneMillion'],
            'recovered_per_one_million' => $item['recoveredPerOneMillion'],
            'critical_per_one_million' => $item['criticalPerOneMillion'],
        ]);
    }

    public function getCountry(string $name)
    {
        $client = new \GuzzleHttp\Client();
        $url = "https://disease.sh/v3/covid-19/countries/" . $name;
        $response = $client->request('GET', $url);
        $content = $response->getBody();
        $obj = json_decode($content->getContents(), true);
        $this->store($obj);
        return $obj;
    }
}
