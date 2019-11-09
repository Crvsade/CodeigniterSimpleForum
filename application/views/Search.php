<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <form method = 'get' action = <?php echo base_url().'Index.php/Search/dosearch' ?>>
        <div><input type = 'text' name = 'string'></div>
        <div><input type = 'submit' name = 'submit'></div>

    </form>
</body>
</html>