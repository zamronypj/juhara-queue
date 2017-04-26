<?php

namespace Juhara\Queue\Db;

use Juhara\Queue\Db\DbConfigInterface;

class DbConfig implements DbConfigInterface {
    private $dbHost = 'localhost';
    private $dbName = 'queuedb';
    private $username = 'juhara';
    private $password = 'juhara';
    private $tableName = 'queue';

    public function __construct($host, $username, $password, $dbname, $tablename) {
        $this->dbHost = $host;
        $this->dbName = $dbname;
        $this->username = $username;
        $this->password = $password;
        $this->tableName = $tablename;
    }

    /**
     * Set host of database (IP or hostname)
     * @param string $host
     */
    public function setHost($host) {
        $this->dbHost = $host;
    }

    /**
     * get host of database
     * @return string
     */
    public function getHost() {
        return $this->dbHost;
    }

    /**
     * Set database name
     * @param string $dbName
     */
    public function setDbName($dbName) {
        $this->dbName = $dbName;
    }

    /**
     * get database name
     * @return string
     */
    public function getDbName() {
        return $this->dbName;
    }

    /**
     * Set username
     * @param string $userName
     */
    public function setUserName($userName) {
         $this->username = $userName;
    }

    /**
     * get username
     * @return string
     */
    public function getUserName() {
        return $this->username;
    }

    /**
     * Set user password
     * @param string $userPassword
     */
    public function setUserPassword($userPassword) {
         $this->password = $userPassword;
    }

    /**
     * get userpassword
     * @return string
     */
    public function getUserPassword() {
        return $this->password;
    }

    /**
     * Set table name to store queue
     * @param string $tableName
     */
    public function setTableName($tableName) {
        $this->tableName = $tableName;
    }

    /**
     * get table name to store queue
     * @return string
     */
    public function getTableName() {
        return $this->tableName;
    }

}