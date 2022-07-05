<?php

namespace App\Interfaces;

use App\Core\Database;
use Exception;

/** @author Agung Prasetyo Nugroho <agungpn33@gmail.com> */
interface DatabaseInterface
{
    /**
     * prepare sql query
     *
     * @param string $query
     * @return Database
	 * @throws Exception
     */
    public function query(string $query): self;

    /**
     * binding one parameter query
     *
     * @param mixed $param
     * @param mixed $value
     * @param null|string $type
	 * @throws Exception
     * @return Database
     */
    public function singleBind(string $param, $value, ?string $type): self;

	/**
	 * binding parameter query
	 *
	 * @param array $data array assoc, key is param
	 * @throws Exception
	 * @return Database
	 */
	public function bind(array $data): self;

    /**
     * execute query
     *
	 * @throws Exception
     * @return Database
     */
    public function execute(): self;

    /**
     * get rows from result query
     *
	 * @throws Exception
     * @return array|null
     */
    public function getList(): ?array;

    /**
     * get one row form result query
     *
	 * @throws Exception
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
