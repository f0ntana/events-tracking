<?php

namespace App\Http\Controllers;

use App\Services\TrackingService;
use GuzzleHttp\Client;

class TrackingController extends Controller
{
    public function index2()
    {
        $tracking = new TrackingService();
        $tracking->setObjectNumber('PM639389044BR');
        // $tracking->setObjectNumber('PM718334272BR');
        $tracking->handle();
    }

    public function index3()
    {
        $url = 'https://tenor.com/search/pokemon-gifs';

        $client = new Client();
        $result = $client->request('get', $url);
        $body = $result->getBody()->getContents();

        preg_match('/(?<=\<img src\=\")http(|s)\:\/\/media\.tenor\.com\/.*?(?=\")/i', $body, $image);
        return $image[0];
    }

    public function index()
    {
        $url = 'https://www.bing.com/search?q=pao+de+queijo';
        $client = new Client();
        $result = $client->request('get', $url);
        $body = $result->getBody()->getContents();
        $body = substr($body, strpos($body, '<div class="b_caption"'), strpos($body, "</div>") + 4);
        $body = substr($body, strpos($body, '<p>'), strpos($body, "</p>") + 4);
        $body = substr($body, strpos($body, '<p>'), strpos($body, "</p>") + 4);
        return $body;
    }
}
