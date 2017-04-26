<?php

namespace Juhara\Queue\Db;

interface DbColumnMappingInterface {
    /**
     * Set primary column name
     * @param string $primaryColumnName
     */
    public function setPrimaryColumnName($primaryColumnName);

    /**
     * get primary column
     * @return string
     */
    public function getPrimaryColumnName();

    /**
     * Set primary column length
     * @param int $primaryColumnLength
     */
    public function setPrimaryColumnLength($primaryColumnLength);

    /**
     * get primary column length
     * @return int
     */
    public function getPrimaryColumnLength();

    /**
     * Set data column name
     * @param string $dataColumnName
     */
    public function setDataColumnName($dataColumnName);

    /**
     * get data column name
     * @return string
     */
    public function getDataColumnName($dataColumnName);

    /**
     * Set timestamp column name
     * @param string $timestampColumnName
     */
    public function setTimestampColumnName($timestampColumnName);

    /**
     * get timestamp column name
     * @return string
     */
    public function getTimestampColumnName();


}