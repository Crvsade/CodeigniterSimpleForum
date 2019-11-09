<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_practice extends CI_Controller {
    public  function hello() {
        echo "Hello world";
    }

    public function show($id = null, $name = null) {
        if($id == null OR $name == null)
            echo "Error: id and name are not specified.";
        else
            $this -> load -> model('User_model_practice');
            $data = $this -> User_model_practice -> getUsers($id, $name);
            $this -> load -> view('view_user_practice', $data);
    }

}