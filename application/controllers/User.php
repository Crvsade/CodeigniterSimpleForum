<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct() { 
        parent::__construct();
        $this -> load -> library('session');
        $this -> load -> helper('URL');
        $this -> load -> helper('form');
    }

    public function view($name = null) {

        $loggedInUser = $this -> session -> userdata('username');
        
        $this -> load -> model('Messages_model');
        $data1 = $this -> Messages_model -> getMessagesByPoster($name); 

        $this -> load -> model('Users_model');

        if(($loggedInUser != null) && ($loggedInUser != $name)) {
            $data2 = $this -> Users_model -> isFollowing($loggedInUser, $name); 
        }
        else {
            $data2 = true;
        }

        $finalData = array('data' => $data1, 
                            'followFlag' => $data2, 
                            'viewedUser' => $name, 
                            'pageStyle' => 'singleUser');

        $this -> load -> view('ViewMessages', $finalData);
    }
    
    public function login() {

        $this -> load -> view('Login');
    }

    public function doLogin() {

        $this -> load -> model('Users_model');
        $postData = $this -> input -> post();
        
        if($this -> Users_model -> checkLogin($postData['username'], $postData['pass'])) {
            $this -> session -> set_userdata('username', $postData['username']);
            redirect('/user/view/'.$postData['username']);
        }
        else {
            $this -> login();
            echo '<div>Error: Your login or password is incorrect.</div>';
        }

    }

    public function logout() {
        
        $this -> session -> unset_userdata('username');
        redirect('/user/login');
    }

    public function follow() {
        $postData = $this -> input -> post();
        $this -> load -> model('Users_model');
        $this -> Users_model -> follow($postData['followed']);
        redirect('/user/view/'.$postData['followed']);
    }

    public function feed($name) {
        $this -> load -> model('Messages_model');
        $data = $this -> Messages_model -> getFollowedMessages($name);
        $data = array('data' => $data,
                        'viewedUser' => $name, 
                        'followFlag' => true, 
                        'pageStyle' => 'feed');

        $this -> load -> view('ViewMessages', $data);
    }
}