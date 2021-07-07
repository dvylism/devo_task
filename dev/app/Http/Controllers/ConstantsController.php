<?php

namespace App\Http\Controllers;

use App\Constant;
use Illuminate\Http\Request;

class ConstantsController extends Controller
{
    protected $object;

    public function __construct()
    {
        if (Constant::take(1)->first() == null) {
            Constant::create();
        }
        $this->object = Constant::take(1)->first();
    }

    public function setDataRefreshTime(int $minutes)
    {
        $this->object->update(['data_refresh_time' => $minutes]);
    }

    public function getDataRefreshTime(): int
    {
        return $this->object->data_refresh_time;
    }
}
