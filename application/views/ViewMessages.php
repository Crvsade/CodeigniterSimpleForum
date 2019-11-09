<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        table, th, tr, td {
            border : 1px solid black;
            border-collapse : collapse;
            padding : 4px;
        }
    </style>
</head>
<body>
    <?php
    
        if($this -> session -> userdata('username') != null) {
            echo '<div>Logged in as: '.($this -> session -> userdata('username')).'</div>';
        }
        if($pageStyle == 'stringSearch') {
            echo '<div>Search string: "'.$viewedUser.'" </div>';
        }
        if($pageStyle == 'feed') {
            echo '<div>Feed for: '.$viewedUser.' </div>';
        }

        if($pageStyle == 'singleUser') {
            echo '<div>Viewed user: '.$viewedUser.' </div>';
        }
    
    ?>

    <table>
        <?php

            if($pageStyle == 'singleUser' || $pageStyle == 'stringSearch') {
                echo '<th>Message</th><th>Time</th>';
                foreach($data as $row) {
                    echo '<tr><td> '.$row['text'].' </td><td> '.$row['posted_at'].' </td></tr>';
                }
            }

            if($pageStyle == 'feed' ) {
                echo '<th>User</th><th>Message</th><th>Time</th>';
                foreach($data as $row) {
                    echo '<tr><td> '.$row['user_username'].' </td><td> '.$row['text'].' </td><td> '.$row['posted_at'].' </td></tr>';
                }
            }
        ?>    
    </table>
    <?php
        if(!($followFlag)) {
            $hidden = array('followed' => $viewedUser);
            echo form_open('/User/follow', '' , $hidden);
                $setup = array('name' => 'follow', 'value' => 'Follow '.$viewedUser);
                echo form_submit($setup);
            echo form_close();
        }
    ?>
</body>
</html>