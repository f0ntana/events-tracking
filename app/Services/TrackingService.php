<?php

namespace App\Services;

use GuzzleHttp\Client;

class TrackingService
{
    private $objectNumber;

    private $url = 'http://webservice.correios.com.br/service/rastro/Rastro.wsdl';

    private $defaultParams = [
        'usuario' => 'ECT',
        'senha' => 'SRO',
        'tipo' => 'L',
        'resultado' => 'T',
        'lingua' => '101'
    ];

    public function setObjectNumber(string $objectNumber)
    {
        $this->objectNumber =  strtoupper($objectNumber);
    }

    public function handle()
    {
        $params = array_merge(['objetos' => $this->objectNumber], $this->defaultParams);

        $this->soapRastro = new \SoapClient($this->url);

        $buscaEventos = $this->soapRastro->buscaEventos($params);
        dd($buscaEventos);
    }
}
