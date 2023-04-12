<?php

namespace App\Controller;

use App\Entity\Conversion;
use Doctrine\ORM\EntityManagerInterface;
use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Response;

class ConversionController
{
    private $entityManager;
    private $apiUrl;
    private $apiKey;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->apiUrl = 'https://currency-converter-by-api-ninjas.p.rapidapi.com';
        $this->apiKey = $_ENV['635b6060ccmshe0a4d2423662c0ap1dbf00jsn24d4790c3c4a']; 
    }

    public function convert(): Response
    {
        $client = new Client([
            'headers' => [
                'X-RapidAPI-Key' => $this->apiKey,
            ],
        ]);

        $response = $client->request('GET', $this->apiUrl, [
            'query' => [
                'from' => 'USD',
                'to' => 'EUR',
                'amount' => '1.00',
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        $conversion = new Conversion();
        $conversion->setFromCurrency($data['base_currency']);
        $conversion->setToCurrency($data['target_currency']);
        $conversion->setExchangeRate($data['exchange_rate']);
        $conversion->setAmount($data['amount']);
        $conversion->setConvertedAmount($data['converted_amount']);

        $this->entityManager->persist($conversion);
        $this->entityManager->flush();

        return new Response(sprintf('Conversion saved with id %d', $conversion->getId()));
    }
}