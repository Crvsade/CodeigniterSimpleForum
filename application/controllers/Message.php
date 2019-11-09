<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this -> load -> library('session');
        $this -> load -> helper('URL');
        $this -> load -> helper('form');
    }
    public function index() {
        $poster = $this -> session -> userdata('username');
        if ($poster == null) {
            redirect('User/Login');
        }
        else {
            $this -> load -> view('Post');
        }
    }

    public function doPost() {
        $poster = $this -> session -> userdata('username');
        if ($poster == null) {
            redirect('User/Login');
        }
        else {
            $postData = $this -> input -> post('message');
            $this -> load -> model('Messages_model');
            $this -> Messages_model -> insertMessage($poster, $postData);
            redirect('User/view/'.$poster);
        }
    }

}