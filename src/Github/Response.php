<?php

namespace Lametric\Github;

class Response
{
    /**
     * @return mixed
     */
    public function setError($error)
    {
        return $this->asJson([
            'frames' => [
                [
                    'index' => 0,
                    'text'  => $error,
                    'icon'  => 'i6574'
                ]
            ]
        ]);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function asJson($data = array())
    {
        header("Content-Type: application/json");
        return json_encode($data, JSON_PRETTY_PRINT);
    }

    /**
     * @param array $array
     * @return mixed
     */
    public function setData($array = [])
    {
        return $this->asJson([
            'frames' => [
                [
                    'index' => 0,
                    'text'  => $array['followers'],
                    'icon'  => 'i6574'
                ]
            ]
        ]);
    }
}
