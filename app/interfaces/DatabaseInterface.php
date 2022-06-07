<?php

namespace App\Interfaces;

use App\Core\Database;

/** @author Agung Prasetyo Nugroho <agungpn33@gmail.com> */
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
     * binding one parameter query
     *
     * @param mixed $param
     * @param mixed $value
     * @param null|string $type
     * @return Database
     */
    public function singleBind(string $param, $value, ?string $type): Database;

	/**
	 * binding parameter query
	 *
	 * @param array $data array assoc, key is param 
	 * @return Database
	 */
	public function bind(array $data): Database;

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
	 * count how many row change in database
	 *
	 * @return ?int
	 */
	public function rowCount(): ?int;

}
