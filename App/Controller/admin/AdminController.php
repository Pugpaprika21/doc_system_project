<?php

namespace App\Controller\admin;

use App\Http\Controller\Controllers;
use App\models\queryBuilder\Query;
use App\ResponseCode\Response;
use DateTime;
use PDOException;

require_once("../../../App/Controller/Controller.php");
require_once("../../../App/Model/Querybuilder/QueryBuilder.php");
require_once("../../../App/Response/Response.php");

class AdminController extends Controllers
{
    /**
     * Undocumented function
     *
     * @param object $request
     * @return void
     */
    public function adminLogin(object $request): void
    {
        try {

            $this->store = [
                'admin_name' =>  $request->admin_name,
                'admin_pass' =>  $request->admin_pass,
            ];

            $this->sql = "SELECT admin_id, admin_name, admin_pass FROM tbl_admin 
                          WHERE admin_name=:admin_name AND admin_pass=:admin_pass";

            $login = new Query();
            echo json_encode($login->select($this->sql, $this->store));
        } catch (PDOException $err) {
            Response::error($err->getMessage());
        }
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function loadDoc(): void
    {
        try {

            $this->sql = "SELECT * FROM tbl_document";

            $loadDoc = new Query();
            echo json_encode($loadDoc->select($this->sql));
        } catch (PDOException $err) {
            Response::error($err->getMessage());
        }
    }
    /**
     * Undocumented function
     *
     * @param object $request
     * @return void
     */
    public function loadMenuAdmin(object $request): void
    {
        try {

            $this->store = ['admin_id' => $request->admin_id];
            $this->sql = "SELECT * FROM tbl_admin WHERE admin_id=:admin_id";

            $loadMenu = new Query();
            echo json_encode($loadMenu->select($this->sql, $this->store));
        } catch (PDOException $err) {
            Response::error($err->getMessage());
        }
    }
    /**
     * Undocumented function
     *
     * @param object $request
     * @return void
     */
    public function getDocByID(object $request): void
    {
        try {

            $this->store = ['doc_id' => $request->doc_id];
            $this->sql = "SELECT * FROM tbl_document WHERE doc_id=:doc_id";

            $getDoc = new Query();
            echo json_encode($getDoc->select($this->sql, $this->store));
        } catch (PDOException $err) {
            Response::error($err->getMessage());
        }
    }
    /**
     * Undocumented function
     *
     * @param object $request
     * @return void
     */
    public function updateFile(object $request): void
    {
        try {

            $doc_file_name = $request->doc_file;
            $tmp_name = $_FILES['doc_file']['tmp_name'];

            $doc_file = rand(0, microtime(true)) . '-' . $doc_file_name;
            $moveTo = "../../../App/public/auth_upload_file/" . $doc_file;

            if (move_uploaded_file($tmp_name, $moveTo)) {

                $dateEdit = new DateTime();

                $this->store = [
                    'doc_name' => $request->doc_name,
                    'doc_type' => $request->doc_type,
                    'doc_sender' => $request->doc_sender,
                    'doc_recipient' => $request->doc_recipient,
                    'doc_com' => $request->doc_com,
                    'date_upload' => $dateEdit->format("Y/m/d H:i:s"),
                    'doc_file' => $doc_file,
                    'doc_id' => $request->doc_id
                ];

                $this->sql = "UPDATE tbl_document SET 
                            doc_name=:doc_name,
                            doc_type=:doc_type,
                            doc_sender=:doc_sender,
                            doc_recipient=:doc_recipient,
                            doc_com=:doc_com,
                            date_upload=:date_upload,
                            doc_file=:doc_file
                            WHERE doc_id=:doc_id
                ";

                $updateFiles = new Query();
                $updateFiles->update($this->sql, $this->store);

                Response::success();
            }
        } catch (PDOException $err) {
            Response::error($err->getMessage());
        }
    }
    /**
     * Undocumented function
     *
     * @param object $request
     * @return void
     */
    public function loadDocToDelete(): void
    {
        try {

            $this->sql = "SELECT * FROM tbl_document";

            $loadDoc = new Query();
            echo json_encode($loadDoc->select($this->sql));
        } catch (PDOException $err) {
            Response::error($err->getMessage());
        }
    }
    /**
     * Undocumented function
     *
     * @param object $request
     * @return void
     */
    public function deleteDocByID(object $request): void
    {
        try {

            $this->store = ['doc_id' => $request->doc_id];
            $this->sql = "SELECT doc_file FROM tbl_document WHERE doc_id=:doc_id";

            $getDocFile = new Query();
            $docFileDb = $getDocFile->select($this->sql, $this->store);
            $docResult = $docFileDb[0]->doc_file;

            if (unlink("../../../App/public/auth_upload_file/" . $docResult)) {
                $deleteFile = new Query();
                $this->sql = "DELETE FROM tbl_document WHERE doc_id=:doc_id";
                $deleteFile->delete($this->sql, $this->store);

                Response::success();
            } else {

                Response::error($docResult);
            }
        } catch (PDOException $err) {
            Response::error($err->getMessage());
        }
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function getAllUsers(): void
    {
        try {

            $this->sql = "SELECT * FROM tbl_users";
            $getUsers = new Query();
            echo json_encode($getUsers->select($this->sql));
        } catch (PDOException $err) {
            Response::error($err->getMessage());
        }
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function adminSearchDocument(object $request): void
    {
        try {

            $this->sql = "SELECT * FROM tbl_document WHERE doc_name LIKE :doc_name";
            $this->store = [':doc_name' => "%$request->search%"];

            $searchDoc = new Query();
            echo json_encode($searchDoc->select($this->sql, $this->store));
        } catch (PDOException $err) {
            Response::error($err->getMessage());
        }
    }
    /**
     * Undocumented function
     *
     * @param object $request
     * @return void
     */
    public function getUserToModal(object $request): void
    {
        try {

            $this->sql = "SELECT * FROM tbl_users WHERE user_id=:user_id";
            $this->store = [':user_id' => $request->user_id];

            $searchDoc = new Query();
            echo json_encode($searchDoc->select($this->sql, $this->store));
        } catch (PDOException $err) {
            Response::error($err->getMessage());
        }
    }
    /**
     * Undocumented function
     *
     * @param object $request
     * @return void
     */
    public function searchUsers(object $request): void
    {
        try {

            $this->sql = "SELECT * FROM tbl_users WHERE fname=:fname";
            $this->store = [':fname' => $request->fname];

            $searchDoc = new Query();
            echo json_encode($searchDoc->select($this->sql, $this->store));
        } catch (PDOException $err) {
            Response::error($err->getMessage());
        }
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function countDocAsUsers(): void
    {
        try {

            $countToChart = new Query();
            $docResult = $countToChart->countRows("SELECT COUNT(doc_file) FROM tbl_document");
            $userResult = $countToChart->countRows("SELECT COUNT(user_id) FROM tbl_document");

            echo json_encode(array_merge($docResult, $userResult));

        } catch (PDOException $err) {
            Response::error($err->getMessage());
        }
    }
}
