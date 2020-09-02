<?php
    require_once("const/errors.php");

    function signup($datas = array()) {
        // echo '<p>signup()</p>';
        // echo '<pre>';
        // echo print_r($datas);
        // echo '</pre>';
        $now = (string)gmdate("m/d/Y H:i:s");
        $connexion = get_connection('root', '', 'inmode');
        $query = htmlspecialchars("INSERT INTO users (
            `firstname`,
            `lastname`,
            `email`,
            `password`,
            `created_at`,
            `last_connection`
        ) VALUES (
            '".$datas['firstname']."',
            '".$datas['lastname']."',
            '".$datas['email']."',
            '".$datas['password']."',
            STR_TO_DATE('".$now."', '%d/%m/%Y %H:%i:%s'),
            STR_TO_DATE('".$now."', '%d/%m/%Y %H:%i:%s')
        );");
        $result = $connexion->query($query);
        if(is_null($connexion->error) || $connexion->error == "") {
            $response = return_json(
                array(
                    'status' => 'success',
                    'message' => 'Success signup',
                    'query' => $query,
                    'test1' => utf8_encode($datas['firstname']),
                    'test2' => $datas['firstname']
                )
            );
        }
        else {
            $response = return_json(
                array(
                    'status' => 'error',
                    'message' => $connexion->error,
                    'query' => $query,
                    'test1' => utf8_encode($datas['firstname']),
                    'test2' => $datas['firstname']
                )
            );
        }
        $connexion->close();
        return print_r($response);
    };
?>