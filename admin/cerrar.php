<?php
session_start();
$_SESSION["usuario"] = NULL;
session_destroy();
    echo '<script>window.location.href = "/admin"</script>';
?>
