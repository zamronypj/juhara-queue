<?php

namespace Juhara\Queue;

use Juhara\Queue\QueueDataInterface as QueueData;
use \StdClass;

class KeyValueData implements QueueData {
    private $_data;

    public function __construct() {
        $this->_data = new StdClass();
    }

    /**
     * Store data to specified key
     * @param string $key
     * @param mixed $data
     */
    public function setData($key, $data) {
        $this->_data->{$key} = $data;
    }

    /**
     * Get data from specified key
     * @param string $key
     * @return mixed
     */
    public function getData($key) {
        return $this->_data->{$key};
    }

    /**
     * Serialize data so it can be store easily somewhere
     * @return string
     */
    public function serializedData() {
        return json_encode($this->_data);
    }

   /**
     * Unserialize data to its original object
     * @return string
     */
    public function unserializedData($data) {
        $this->_data = json_decode($data);
    }

}