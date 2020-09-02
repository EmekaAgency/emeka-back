<?php
    function is_mail($str) {
        return preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', $str) == 0 ? false : true;
    }
?>