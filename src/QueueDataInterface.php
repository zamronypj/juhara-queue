<?php

namespace Juhara\Queue;

interface QueueDataInterface {
    /**
     * Store data to specified key
     * @param string $key
     * @param mixed $data
     */
    public function setData($key, $data);

    /**
     * Get data from specified key
     * @param string $key
     * @return mixed
     */
    public function getData($key);

    /**
     * Serialize data so it can be store easily somewhere
     * @return string
     */
    public function serializedData();
}