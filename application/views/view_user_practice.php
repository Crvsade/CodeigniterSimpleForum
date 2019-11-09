<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <title>View User</title>
    <style type = "text/css">    
        tr, table, th, td 
        {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <table>
        <tr><th>Field</th><th>Content</th></tr>
        <tr><td>ID</td><td><?php echo $id; ?></td><tr>
        <tr><td>Name</td><td><?php echo $name; ?></td><tr>
    </table>
</body>
</html>