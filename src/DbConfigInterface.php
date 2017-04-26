<?php

namespace Juhara\Queue\Db;

interface DbConfigInterface {
    /**
     * Set host of database (IP or hostname)
     * @param string $host
     */
    public function setHost($host);

    /**
     * get host of database
     * @return string
     */
    public function getHost();

    /**
     * Set database name
     * @param string $dbName
     */
    public function setDbName($dbName);

    /**
     * get database name
     * @return string
     */
    public function getDbName();

    /**
     * Set username
     * @param string $userName
     */
    public function setUserName($userName);

    /**
     * get username
     * @return string
     */
    public function getUserName();

    /**
     * Set user password
     * @param string $userPassword
     */
    public function setUserPassword($userPassword);

    /**
     * get userpassword
     * @return string
     */
    public function getUserPassword();

    /**
     * Set table name to store queue
     * @param string $tableName
     */
    public function setTableName($tableName);

    /**
     * get table name to store queue
     * @return string
     */
    public function getTableName();

}