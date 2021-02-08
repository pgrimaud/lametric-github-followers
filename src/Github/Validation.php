<?php

declare(strict_types=1);

namespace Github;

class Validation
{
    /**
     * @var array
     */
    private array $parameters = [
        'username',
    ];

    /**
     * Validation constructor.
     * @param array $parameters
     * @throws \Exception
     */
    public function __construct(array $parameters = [])
    {
        foreach ($this->parameters as $name) {
            if (empty($parameters[$name])) {
                throw new \Exception('Missing parameter');
            }

            $this->parameters[$name] = addslashes(urldecode($parameters[$name]));
        }
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }
}