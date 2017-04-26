<?php

namespace Juhara\Queue\Db;

use Juhara\Queue\InitializeableInterface;
use Juhara\Queue\BaseQueue;
use Juhara\Queue\Db\DbConfigInterface as DbConfig;

/**
 * Queue that store its data in a table of MySQL database
 */
class MySQLBackedQueue extends DbBackedQueue {
    private $db;

    /**
     * Do something to initialize queue
     */
    public function initialize() {
        $dbConfig = $this->getConfig()
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
        //do nothing;
    }

    private function generateRandomString($len) {
        $alpanum = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWQYZ';
        return substr(str_shuffle($alpanum), 0, $len);
    }

    /**
     * Push data to queue and return id of inserted queue item
     * @param QueueDataInterface $data
     * @return string
     */
    public function push(QueueData $data) {
        $tableName = $this->getConfig()->getTableName();
        $col = $this->getColumnMapping();
        $primaryColumnName = $col->getPrimaryColumnName();
        $dataColumnName = $col->getDataColumnName();
        $timestampColumnName = $col->getTimestampColumnName();
        $key = $this->generateRandomString($col->getPrimaryColumnLength());
        $sql = "INSERT INTO $tableName ( $primaryColumnName, $dataColumnName, $timestampColumnName ) VALUES (?, ?, NOW())";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ss', $key, $data->serializedData());
        $stmt->execute();
        $stmtt->close();
        return $key;
    }

    /**
     * pop data from queue and return it
     * @return QueueDataInterface
     */
    public function pop() {
        $tableName = $this->getConfig()->getTableName();
        $col = $this->getColumnMapping();
        $primaryColumnName = $col->getPrimaryColumnName();
        $dataColumnName = $col->getDataColumnName();
        $timestampColumnName = $col->getTimestampColumnName();
        $key = $this->generateRandomString($col->getPrimaryColumnLength());
        $sql = "SELECT `$primaryColumnName`, `$dataColumnName` FROM $tableName WHERE $timestampColumnName = MIN($timestampColumnName) LIMIT 1";
        $result = $this->db->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch();
            $sql = "DELETE FROM $tableName WHERE `$primaryColumnName` = ".$row[0]." LIMIT 1";
            $this->db->query($sql);
            return $row[1];
        } else {
            return null;
        }
    }
}