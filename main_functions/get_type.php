<?php
    function get_type($data) {
        if (is_numeric($data)) {
            return floatval($data) > floatval(intval($data)) ? 'double': 'integer';
        }
        return gettype($data);
    }
?>