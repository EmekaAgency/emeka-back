<?php
    function reset_request($method = "", $action = ""){
        // echo '<p>reset_request()</p>';
        if($method == "POST") {unset($_POST[$action]);}
        if($method == "GET") {unset($_GET[$action]);}
        if($method == "DELETE") {unset($_DELETE[$action]);}
        if($method == "UPDATE") {unset($_UPDATE[$action]);}
    };
?>