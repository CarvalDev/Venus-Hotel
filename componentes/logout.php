<?php
    session_start();
    session_destroy();
    header('Location: ../area-admin/index.php');
?>