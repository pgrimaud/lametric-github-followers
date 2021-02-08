<?php

declare(strict_types=1);

namespace Github;

class Response
{
    /**
     * @param string $error
     *
     * @return string
     */
    public function setError(string $error): string
    {
        return $this->asJson([
            'frames' => [
                [
                    'index' => 0,
                    'text'  => $error,
                    'icon'  => 'i6574',
                ],
            ],
        ]);
    }

    /**
     * @param array $data
     *
     * @return string
     */
    public function asJson(array $data = []): string
    {
        header("Content-Type: application/json");
        return json_encode($data);
    }

    /**
     * @param array $data
     *
     * @return string
     */
    public function setData($data = []): string
    {
        return $this->asJson([
            'frames' => [
                [
                    'index' => 0,
                    'text'  => $data['followers'],
                    'icon'  => 'i6574',
                ],
            ],
        ]);
    }
}
