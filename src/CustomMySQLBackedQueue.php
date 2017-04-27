<?php

namespace Juhara\Queue\Db;

use Juhara\Queue\InitializeableInterface;
use Juhara\Queue\BaseQueue;
use Juhara\Queue\Db\DbConfigInterface as DbConfig;
use Juhara\Queue\QueueDataInterface as QueueData;

/**
 * Queue that store its data in a table of MySQL database
 * with your own custom table schema
 *
 */
class CustomMySQLBackedQueue extends DbBackedQueue {
    private $db;
    private $insertDataCallback;
    private $selectDataCallback;
    private $deleteDataCallback;

    public function setInsertDataCallback($callback) {
        $this->insertDataCallback = $callback;
    }

    public function setSelectDataCallback($callback) {
        $this->selectDataCallback = $callback;
    }

    public function setDeleteDataCallback($callback) {
        $this->deleteDataCallback = $callback;
    }

    /**
     * Do something to initialize queue
     */
    public function initialize() {
        $dbConfig = $this->getConfig();
        $this->db = new mysqli($dbConfig->getHost(),
                               $dbConfig->getUserName(),
                               $dbConfig->getUserPassword(),
                               $dbConfig->getDbName());
    }

    /**
     * Do something here to finalize queue
     * for example when detroying queue
     */
    public function finalize() {
        $this->db->close();
    }


    /**
     * Push data to queue and return id of inserted queue item
     * @param QueueDataInterface $data
     * @return string
     */
    public function push(QueueData $data) {
        if (isset($this->insertDataCallback)) {
            return $this->insertDataCallback($this->db, $data->serializeData());
        } else {
            return null;
        }
    }

    /**
     * pop data from queue and return it
     * @return QueueDataInterface
     */
    public function pop() {
        if (isset($this->selectDataCallback)) {
            $row = $this->selectDataCallback($this->db);
            $this->deleteDataCallback($this->db, $row->id);
            return $row->data;
        } else {
            return null;
        }
    }
}