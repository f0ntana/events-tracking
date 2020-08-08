<?php

namespace App\Http\Controllers;

use App\Services\TrackingService;

class TrackingController extends Controller
{
    public function index()
    {
        $params = [
            'object' => 'PM718334272BR'
        ];

        $tracking = new TrackingService();

        dd($tracking->handle($params));
    }

    public function index2()
    {
        $params = [
            'object' => 'PM718334272BR'
        ];

        $tracking = new TrackingService();

        dd($tracking->handle2($params));
    }
}
