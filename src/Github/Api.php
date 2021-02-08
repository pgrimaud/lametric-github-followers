<?php

declare(strict_types=1);

namespace Github;

use GuzzleHttp\Client;

class Api
{
    /** @var array */
    private array $parameters = [];

    /**
     * @param array $parameters
     */
    public function setParameters(array $parameters = [])
    {
        $this->parameters = $parameters;
    }

    /**
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getResult(): array
    {
        $endpoint = 'https://api.github.com/users/' . $this->parameters['username'];

        $client = new Client();
        $result = $client->request('GET', $endpoint);

        $body = $result->getBody();

        $data = json_decode((string)$body, true);

        return [
            'followers' => (int)$data['followers'],
        ];
    }
}
