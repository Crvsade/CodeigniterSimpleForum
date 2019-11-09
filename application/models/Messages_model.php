<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages_model extends CI_Model {
    public function __construct() { $this -> load -> database(); }

    public function getMessagesByPoster($name) {
        
        $sql = 'SELECT user_username, text, posted_at 
                FROM Messages 
                WHERE user_username = "'.$name.'"
                ORDER BY posted_at DESC';
        
        $query = $this -> db -> query($sql);
        
        return $query -> result_array();
    }

    public function searchMessages($string) {
        
        $sql = 'SELECT text, posted_at FROM Messages 
                WHERE text LIKE "%'.$string.'%"
                ORDER BY posted_at DESC';
        
        $query = $this -> db -> query($sql);
        
        return $query -> result_array();
    }

    public function insertMessage($poster, $string) {
        
        $sql = 'INSERT INTO Messages (user_username, text, posted_at) 
                VALUES ("'.$poster.'", "'.$string.'", CURRENT_TIMESTAMP)';
        
        $this -> db -> query($sql);
    }

    public function getFollowedMessages($name) {
        
        $sql = 'SELECT user_username, text, posted_at 
                FROM Messages FULL 
                JOIN User_Follows 
                ON followed_username = user_username 
                WHERE follower_username = "'.$name.'"
                ORDER BY posted_at DESC';
        
        $query = $this -> db -> query($sql);
        
        return $query -> result_array();
    }
}