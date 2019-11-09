<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model_practice extends CI_Model {
    public function getUsers($id, $name) {
        $data = array();
        $data['id'] = $id;
        $data['name'] = $name;
        return $data;
    }
}
