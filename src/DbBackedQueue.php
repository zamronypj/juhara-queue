<?php

namespace Juhara\Queue\Db;

use Juhara\Queue\InitializeableInterface;
use Juhara\Queue\BaseQueue;
use Juhara\Queue\Db\DbConfigInterface as DbConfig;
use Juhara\Queue\Db\DbColumnMappingInterface as DbColumnMapping;

/**
 * Queue that store its data in a table of database
 */
abstract class DbBackedQueue extends BaseQueue implements InitializeableInterface {
    /**
     * private instance that store db configuration
     */
    private $config;

    /**
     * private instance that store column name mapping
     */
    private $columnMapping;

    /**
     * Do something to initialize queue
     */
    abstract public function initialize();

    /**
     * Do something here to finalize queue
     * for example when detroying queue
     */
    abstract public function finalize();

    public function __construct(DbConfig $dbConfig, DbColumnMapping $columnMapping) {
        $this->config = $dbConfig;
        $this->columnMapping = $columnMapping;
    }

    public function getConfig() {
        return $this->config;
    }

    public function getColumnMapping() {
        return $this->columnMapping;
    }
}