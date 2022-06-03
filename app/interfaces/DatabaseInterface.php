<?php

namespace App\Interfaces;

use App\Core\Database;

interface DatabaseInterface
{
    /**
     * prepare sql query
     *
     * @param string $query
     * @return Database
     */
    public function query(string $query): Database;

    /**
     * binding parameter query
     *
     * @param mixed $param
     * @param mixed $value
     * @param null|string $type
     * @return Database
     */
    public function bind(string $param, $value, ?string $type): Database;

    /**
     * execute query
     *
     * @return Database
     */
    public function execute(): Database;

    /**
     * get rows from result query
     *
     * @return array|null
     */
    public function getList(): ?array;

    /**
     * get one row form result query
     *
     * @return mixed
     */
    public function getOne();

    /**
     * count rows from result query
     *
     * @return integer|null
     */
    public function numRows(): ?int;
}
