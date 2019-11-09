<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <?php
        echo form_open('/User/doLogin');
            $setup = array('name' => 'username');
            echo form_input($setup);
            echo '<div></div>';
            $setup = array('name' => 'pass');
            echo form_input($setup);
            echo '<div></div>';
            $setup = array('name' => 'submit', 'value' => 'Login');
            echo form_submit($setup);
        echo form_close();
    ?>
<!--     <form method = 'get' action = <?php echo base_url().'Index.php/User/doLogin' ?>>
        <div><input type = 'text' name = 'username'></div>
        <div><input type = 'text' name = 'pass'></div>
        <div><input type = 'submit' name = 'submit'></div>
    </form> -->

</body>
</html>