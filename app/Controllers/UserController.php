<?php
class UserController
{

    use Controller;
    private $client;

    function __construct()
    {
        $this->client = $this->model("UserModel");
        // session_start();
    }

    function index()
    {
        $this->view("admin.layout.Components.Client.list", ["clients" => $this->client->all()]);
    }

   
    function update($ClientID){
        $client = $this->client->getOneUser($ClientID);
        if (isset($_POST['btn-update'])) {
            if ($_FILES['avatar']['size'] === 0) {
                $img = $client['avatar'];
            } else {
                $img = $_FILES['avatar']['name'];
                move_uploaded_file($_FILES['avatar']['tmp_name'], "Public/upload/" . basename($img));
            }
            $result = $this->client->updateUser($_POST['email'], $_POST['username'], $_POST['accountName'], $_POST['address'], $_POST['phoneNumber'],$img,  $_POST['role'], $ClientID);
    
            if ($result) {
                header("location:" . URL . "Admin/listClient");
            }
        }
        $this->view("admin.layout.Components.Client.update", ['client' => $this->client->getOneUser($ClientID)]);
    }

    function delete($ClientID){
        $result = $this->client->deleteClient($ClientID);
        if ($result) {
            header("location:" . URL . "Admin/listClient");
            $this->view("admin.layout.Components.Client.list", ['clients' => $this->client->all()]);
        }
        return false;
    }


    
}
