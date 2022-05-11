<?php

namespace App\Controller\auth;

use App\Http\Controller\Controllers;
use App\models\queryBuilder\Query;
use App\ResponseCode\Response;
use DateTime;
use PDOException;

require_once("../../../App/Controller/Controller.php");
require_once("../../../App/Model/Querybuilder/QueryBuilder.php");
require_once("../../../App/Response/Response.php");

class UserController extends Controllers
{
    /**
     * Undocumented function
     *
     * @param object $request
     * @return void
     */
    public function userRegister(object $request): void
    {
        try {

            $filename = $request->imgs;
            $tmp_name = $_FILES['imgs']['tmp_name'];
            $imageFileType = pathinfo($filename, PATHINFO_EXTENSION);
            $valid_extensions = array("jpg", "jpeg", "png");

            if (in_array($imageFileType, $valid_extensions)) {
                $nameFile = explode(".", $filename);
                $imageFileType = $nameFile[1];
                $microsec = round(microtime(true) * 1000);
                $newFileName = $microsec . "." . $imageFileType;

                $moveTo = "../../../App/public/auth_upload_img/" . $newFileName;

                $this->store = [
                    'username' => $request->username,
                    'password' => $request->password,
                    'fname' => $request->fname,
                    'lname' => $request->lname,
                    'sex' => $request->sex,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'imgs' => $newFileName
                ];

                if (move_uploaded_file($tmp_name, $moveTo)) {
                    chmod("../../../App/public/auth_upload_img/" . $newFileName, 0777);

                    try {

                        $this->sql = "";
                        $this->sql .= "INSERT INTO tbl_users (username, password, fname, lname, sex, phone, email, imgs, regis_date)";
                        $this->sql .= "VALUES (:username, :password, :fname, :lname, :sex, :phone, :email, :imgs, NOW())";

                        $query = new Query();
                        $query->insert($this->sql, $this->store);

                        Response::success();
                    } catch (PDOException $err) {
                        Response::error($err->getMessage());
                    }
                }
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
    public function userLogin(object $request): void
    {
        if (is_object($request)) {

            $this->store = [
                'username' => $request->username,
                'password' => $request->password,
            ];

            $this->sql = "SELECT user_id, username, password FROM tbl_users 
                          WHERE username=:username AND password=:password";

            try {

                $query = new Query();
                echo json_encode($query->select($this->sql, $this->store));
            } catch (PDOException $err) {
                Response::error($err->getMessage());
            }
        } else {
            Response::error();
        }
    }
    /**
     * Undocumented function
     *
     * @param object $request
     * @return void
     */
    public function loadMenuUsers(object $request): void
    {
        try {

            $this->store = ['user_id' => $request->user_id];
            $this->sql = "SELECT * FROM tbl_users WHERE user_id=:user_id";

            $getUsersMenu = new Query();
            echo json_encode($getUsersMenu->select($this->sql, $this->store));
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
    public function uploadFile(object $request): void
    {
        try {

            $doc_file = $request->doc_file;
            $tmp_name = $_FILES['doc_file']['tmp_name'];

            $doc_str = "file";
            $doc_count = 1;

            foreach ($tmp_name as $key => $values) {
                $doc_file_name = $doc_file;
                $doc_file = rand(0, microtime(true)) . '-' . $doc_file_name[$key];
                $moveTo = "../../../App/public/auth_upload_file/" . $doc_file;

                if (move_uploaded_file($tmp_name[$key], $moveTo)) {

                    $date_upload = new DateTime();

                    $this->store = [
                        'user_id' => $request->user_id,
                        'doc_name' => $request->doc_name,
                        'doc_type' => $request->doc_type,
                        'doc_sender' => $request->doc_sender,
                        'doc_recipient' => $request->doc_recipient,
                        'doc_qty' => $doc_str . '-' . (string)$doc_count,
                        'doc_com' => $request->doc_com,
                        'date_upload' => $date_upload->format("Y/m/d H:i:s"),
                        'doc_file' => $doc_file
                    ];

                    $this->sql = "";
                    $this->sql .= "INSERT INTO tbl_document (user_id, doc_name, doc_type, doc_sender, doc_recipient, doc_qty, doc_com, date_upload, doc_file)";
                    $this->sql .= "VALUES (:user_id, :doc_name, :doc_type, :doc_sender, :doc_recipient, :doc_qty, :doc_com, :date_upload, :doc_file)";

                    $upload_files = new Query();
                    $upload_files->insert($this->sql, $this->store);
                    $doc_count++;
                }
            }

            Response::success();
        } catch (PDOException $err) {
            Response::error($err->getMessage());
        }
    }
    /**
     * Undocumented function
     * @var int $user_id
     * @param object $request
     * @return void
     */
    public function loadDocToTable(object $request): void
    {
        try {

            $this->store = ['user_id' => $request->user_id];
            $this->sql = "SELECT * FROM tbl_document WHERE user_id=:user_id";

            $loadDoc = new Query();
            echo json_encode($loadDoc->select($this->sql, $this->store));
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
    public function searchDocument(object $request): void
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
    public function updateProfile(object $request): void
    {
        try {

            $img_edit = $request->imgs;
            $tmp_name = $_FILES['imgs']['tmp_name'];
            $imageFileType = pathinfo($img_edit, PATHINFO_EXTENSION);
            $valid_extensions = array("jpg", "jpeg", "png");

            if (in_array($imageFileType, $valid_extensions)) {
                $nameFile = explode(".", $img_edit);
                $imageFileType = $nameFile[1];
                $microsec = round(microtime(true) * 1000);
                $newFileName = $microsec . "." . $imageFileType;

                $moveTo = "../../../App/public/auth_upload_img/" . $newFileName;

                $dateEdit = new DateTime();

                $this->store = [
                    'username' => $request->username,
                    'password' => $request->password,
                    'fname' => $request->fname,
                    'lname' => $request->lname,
                    'sex' => $request->sex,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'imgs' => $newFileName,
                    'regis_date' => $dateEdit->format("Y/m/d H:i:s"),
                    'user_id' => $request->user_id
                ];

                if (move_uploaded_file($tmp_name, $moveTo)) {
                    chmod("../../../App/public/auth_upload_img/" . $newFileName, 0777);

                    try {

                        $this->sql = "UPDATE tbl_users SET 
                            username=:username, 
                            password=:password,
                            fname=:fname,
                            lname=:lname,
                            sex=:sex,
                            phone=:phone,
                            email=:email,
                            imgs=:imgs,
                            regis_date=:regis_date
                            WHERE user_id=:user_id
                        ";

                        $updateProfile = new Query();
                        $updateProfile->update($this->sql, $this->store);

                        Response::success();
                    } catch (PDOException $err) {
                        Response::error($err->getMessage());
                    }
                }
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
    public function countFileOnUsers(object $request): void
    {
        try {

            $this->sql = "SELECT COUNT(doc_file) FROM tbl_document WHERE user_id=:user_id";
            $this->store = ['user_id' => $request->user_id];

            $countFile = new Query();
            echo json_encode($countFile->countRows($this->sql, $this->store));
            
        } catch (PDOException $err) {
            Response::error($err->getMessage());
        }
    }
}
