<?php

namespace Lametric\Github;

class Validation
{
    /**
     * @var array
     */
    private $parameters = [
        'username'
    ];

    /**
     * Validation constructor.
     * @param array $parameters
     * @throws \Exception
     */
    public function __construct($parameters = [])
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
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param $parameter
     * @return mixed|null
     */
    public function getParameter($parameter)
    {
        return isset($this->parameters[$parameter]) ? $this->parameters[$parameter] : null;
    }
}