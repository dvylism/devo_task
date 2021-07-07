<?php

namespace App\Console\Commands;

use App\Country;
use App\Http\Controllers\CountriesController;
use Carbon\Carbon;
use http\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class getList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:getList';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to get corona infected countries list';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->getCountriesList();
        return 0;
    }

    public function getCountriesList()
    {
        $client = new \GuzzleHttp\Client();
        $url = "https://disease.sh/v3/covid-19/countries";
        $response = $client->request('GET', $url);
        $content = $response->getBody();
        $obj = json_decode($content->getContents(), true);

        $countriesController = new CountriesController();

        foreach ($obj as $key => $item) {
            $countriesController->store($item);
        }
    }
}
