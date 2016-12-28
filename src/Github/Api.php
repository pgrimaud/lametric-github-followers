<?php
namespace Lametric\Github;

use GuzzleHttp\Client;

class Api
{
    /** @var array */
    private $parameters = [];

    /**
     * @param array $parameters
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * @return array
     */
    public function getResult()
    {
        $endpoint = 'https://api.github.com/users/' . $this->parameters['username'];

        $client = new Client();
        $result = $client->request('GET', $endpoint);

        $body = $result->getBody();

        $data = json_decode($body, JSON_OBJECT_AS_ARRAY);

        return [
            'followers' => (int)$data['followers']
        ];
    }
}
