<?php

namespace App\models\queryBuilder;

use App\DataBase\DB;
use App\ResponseCode\Response;
use PDO;
use PDOException;

require_once("../../../App/Model/database.php");
require_once("../../../App/Response/Response.php");

class Query
{
    public $db;

    public function __construct()
    {
        $this->db = new DB();
    }
    /**
     * Undocumented function
     *
     * @param string $sql
     * @param array $input_data
     * @return void
     */
    public function insert(string $sql, array $input_data): void
    {
        try {

            if (is_string($sql) && is_array($input_data)) {

                if (str_contains($sql, 'INSERT') || str_contains($sql, 'insert')) {

                    $stmt = $this->db->connect()->prepare($sql);
                    if ($stmt->execute($input_data)) {
                        $this->db = null;
                    } else {
                        Response::error();
                    }
                }
            }

        } catch (PDOException $err) {
            Response::error($err->getMessage());
            $this->db = null;
        }
    }
    /**
     * Undocumented function
     *
     * @param string $sql
     * @param array $input_data Select all without condition where
     * @return array
     */
    public function select(string $sql, array $input_data = []): array
    {
        try {

            $response = array();

            if (is_string($sql) && is_array($input_data)) {

                if (str_contains($sql, 'SELECT') || str_contains($sql, 'select')) {

                    if (!empty($input_data)) {
                        $stmt = $this->db->connect()->prepare($sql);
                        $stmt->execute($input_data);
                        $data = $stmt->fetchAll(PDO::FETCH_OBJ);

                        $this->db->connect()->beginTransaction();
                        foreach ($data as $row) {
                            array_push($response, $row);
                        }

                        $this->db = null;
                        return $response;

                    } else if (empty($input_data)) {
                        $stmt = $this->db->connect()->prepare($sql);
                        $stmt->execute();
                        $data = $stmt->fetchAll(PDO::FETCH_OBJ);

                        $this->db->connect()->beginTransaction();
                        foreach ($data as $row) {
                            array_push($response, $row);
                        }

                        $this->db = null;
                        return $response;
                    }
                }
            }

        } catch (PDOException $err) {
            Response::error($err->getMessage());
            $this->db = null;
        }
    }
    /**
     * Undocumented function
     *
     * @param string $sql
     * @param array $input_data
     * @return void
     */
    public function update(string $sql, array $input_data): void
    {
        try {

            if (is_string($sql) && is_array($input_data)) {

                if (str_contains($sql, 'UPDATE') || str_contains($sql, 'update')) {
                    $this->db->connect()->prepare($sql)->execute($input_data);
                    $this->db = null;
                }
            }

        } catch (PDOException $err) {
            Response::error($err->getMessage());
            $this->db = null;
        }
    }
    /**
     * Undocumented function
     *
     * @param string $sql
     * @param array $input_data
     * @return void
     */
    public function delete(string $sql, array $input_data): void
    {
        try {

            if (is_string($sql) && is_array($input_data)) {

                if (str_contains($sql, 'DELETE') || str_contains($sql, 'delete')) {
                    $this->db->connect()->prepare($sql)->execute($input_data);
                    $this->db = null;
                }
            }

        } catch (PDOException $err) {
            Response::error($err->getMessage());
            $this->db = null;
        }
    }
    /**
     * Undocumented function
     *
     * @param string $sql
     * @param array $input_data Count rows all without condition where
     * @return array
     */
    public function countRows(string $sql, array $input_data = []): array
    {
        try {

            $response = array();

            if (is_string($sql) && is_array($input_data)) {

                if (str_contains($sql, 'SELECT') || str_contains($sql, 'select')) {

                    if (!empty($input_data)) {

                        $stmt = $this->db->connect()->prepare($sql);
                        $stmt->execute($input_data);
                        $rowCount = $stmt->fetchColumn();

                        if ($rowCount > 0) {
                            array_push($response, $rowCount);
                            return $response;
                        }

                    } else if (empty($input_data)) {

                        $stmt = $this->db->connect()->prepare($sql);
                        $stmt->execute();
                        $rowCount = $stmt->fetchColumn();

                        if ($rowCount > 0) {
                            array_push($response, $rowCount);
                            return $response;
                        }
                    }
                }
            }
            
        } catch (PDOException $err) {
            Response::error($err->getMessage());
            $this->db = null;
        }
    }
}