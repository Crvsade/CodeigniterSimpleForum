<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {
    public function __construct() { $this -> load -> database(); }

    public function checkLogin($username, $pass) {

        $pass_hashed = sha1($pass);
    
        $sql = 'SELECT username, password
                FROM Users 
                WHERE username = "'.$username.'"AND password = "'.$pass_hashed.'"';
        
        $query = $this -> db -> query($sql);
    
        return $query -> num_rows() > 0;
    
    }

    public function isFollowing($follower, $followed) {

        $sql = 'SELECT follower_username, followed_username
                FROM User_Follows
                WHERE follower_username = "'.$follower.'" 
                AND followed_username = "'.$followed.'"';

        $query = $this -> db -> query($sql);
        return $query -> num_rows() > 0;
    }

    public function follow($followed) {
        
        $follower = $this -> session -> userdata('username');
        $sql = 'INSERT INTO User_Follows (follower_username, followed_username)
                VALUES ("'.$follower.'", "'.$followed.'")';
        
        $query = $this -> db -> query($sql);
    }
}