<?php

namespace Juhara\Queue\Db;

use Juhara\Queue\Db\DbColumnMappingInterface;

class DbColumnMapping implements DbColumnMappingInterface {
    private $primaryKey = 'id';
    private $primaryKeyLen = 10;
    private $dataKey = 'queueData';
    private $timestampKey = 'timestampData';

    /**
     * Set primary column name
     * @param string $primaryColumnName
     */
    public function setPrimaryColumnName($primaryColumnName) {
        $this->primaryKey = $primaryColumnName;
    }

    /**
     * get primary column
     * @return string
     */
    public function getPrimaryColumnName() {
        return $this->primaryKey;
    }

    /**
     * Set primary column length
     * @param int $primaryColumnLength
     */
    public function setPrimaryColumnLength($primaryColumnLength) {
        $this->primaryKeyLen = $primaryColumnLength;
    }

    /**
     * get primary column length
     * @return int
     */
    public function getPrimaryColumnLength() {
        return $this->primaryKeyLen;
    }

    /**
     * Set data column name
     * @param string $dataColumnName
     */
    public function setDataColumnName($dataColumnName) {
        $this->dataKey = $dataColumnName;
    }

    /**
     * get data column name
     * @return string
     */
    public function getDataColumnName($dataColumnName) {
        return $this->dataKey;
    }

    /**
     * Set timestamp column name
     * @param string $timestampColumnName
     */
    public function setTimestampColumnName($timestampColumnName) {
        $this->timestampKey = $timestampColumnName;
    }

    /**
     * get timestamp column name
     * @return string
     */
    public function getTimestampColumnName() {
        return $this->timestampKey;
    }

}