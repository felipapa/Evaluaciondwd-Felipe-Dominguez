<?php

function esadmin(){
    if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "admin") {
        http_response_code(403);
        die("error");
    }
}


?>