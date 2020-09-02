<?php
function match_type_parameters($_form_datas, $_needs) {
    $temp = $_form_datas;
    unset($temp['type']);
    $temp = array_keys($temp);
    // [1, 2, 3] == [2, 3, 4]           false
    // [1, 2, 3] == [3, 2, 1]           false
    // [1, 2, 3] == [1, 2, 3]           true
    // [1, 2, 3] == ['1', '2', '3']     true
    if(sizeof($temp) < sizeof($_needs)) {
        // echo '<p></pre>';
        return (integer)$GLOBALS['_TYPED_REQUEST_MISSING_PARAMETERS'];
    }
    if(sizeof($temp) > sizeof($_needs)) {
        // echo '<p></p>';
        return (integer)$GLOBALS['_TYPED_REQUEST_TOO_MUCH_PARAMETERS'];
    }
    return (bool)true;
}
?>