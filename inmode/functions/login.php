<?php
    function login($datas = array()) {
        // echo '<p>login()</p>';
        $connexion = get_connection('root', '', 'inmode');
        $query = htmlspecialchars(
            "SELECT firstname AS firstname, lastname AS lastname, email AS email FROM users 
            WHERE 
            `email` = '".$datas['email']."' AND `password` = '".$datas['password']."'"
        );
        $result = $connection->query($query);
        if($result->num_rows > 0) {
            $response = return_json(
                array(
                    'status' => 'success',
                    'message' => 'Success login',
                    'query' => $query,
                    'result' => return_json($result->fetch_assoc())
                )
            );
        }
        else {
            if(is_null($connection->error) || $connection->error == "") {
                $response = return_json(
                    array(
                        'status' => 'success',
                        'message' => return_error($GLOBALS['_NO_USER_WITH_PARAMS']),
                        'query' => $query
                    )
                );
            }
            else {
                $response = return_json(
                    array(
                        'status' => 'error',
                        'message' => $connection->error,
                        'query' => $query
                    )
                );
            }
        }
        $connection->close();
        return print_r($response);
    };
?>