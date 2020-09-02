<?php
    function action_is_set($_array = array()) {
        // echo '<p>action_is_set()</p>';
        if ( !isset($_array[ 'action' ]) || is_null($_array[ 'action' ]) ) {
            return false;
        }
        return true;
    };
?>