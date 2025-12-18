<?php
require_once 'auth.php';
require_once '../db.php';

$id = (int)$_GET['id'];

mysqli_query($conn, "DELETE FROM blogs WHERE id=$id");

header("Location: blog_list.php");
exit;
