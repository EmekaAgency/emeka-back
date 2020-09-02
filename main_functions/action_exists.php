<?php
    require_once('const/functions_settings.php');

    function action_exists($_array = array()) {
        // echo '<p>action_exists()</p>';
        if ( !array_key_exists($_array[ 'action' ], $GLOBALS['_functions']) ) {
            return false;
        }
        return true;
    };
?>