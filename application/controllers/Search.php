<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this -> load -> library('session');
    }
    public function index() {
        $this -> session -> unset_userdata('username');
        $this -> load -> view('Search');
    }

    public function dosearch() {
        $getData = $this -> input -> get();
        $this -> load -> model('Messages_model');
        $data = $this -> Messages_model -> searchMessages($getData['string']);

        $data = array('data' => $data,
                        'followFlag' => true, 
                        'viewedUser' => $getData['string'], 
                        'pageStyle' => 'stringSearch');
        $this -> load -> view('ViewMessages', $data);
    }
}