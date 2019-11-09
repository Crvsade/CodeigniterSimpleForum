<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <?php 
        echo '<div>Post a message for: '.($this -> session -> userdata('username')).'</div>';
        echo form_open('/Message/doPost');
            $setup = array('name' => 'message');
            echo form_input($setup);
            $setup = array('name' => 'post', 'value' => 'Post message');
            echo form_submit($setup);
        echo form_close();
    ?>

<!--     <form method = 'get' action = <?php echo base_url().'Index.php/Message/doPost' ?>>
        <div><input type = 'text' name = 'message'></div>
        <div><input type = 'submit' name = 'post' value = 'Post'></div>
    </form> -->
</body>
</html>