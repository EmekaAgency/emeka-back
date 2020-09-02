<?php
    require_once("const/errors.php");

    // Cette fonction permet de vérifier l'intégrité du formulaire
    function form_verify($_array = array()){
        // echo '<p>form_verify()</p>';
        // On vérifie d'abord que le paramètre d'action soit bien défini
        $action_is_set = action_is_set($_array);
        if($action_is_set === true) {
            // Ensuite que cette action est bien définie
            $action_exists = action_exists($_array);
            if($action_exists === true) {
                // Ensuite que les données du formulaire correspondent bien à l'action demandée
                $form_is = form_is($GLOBALS['_functions'][$_array[ 'action' ]][ 'index' ], $_array[ 'data' ]);
                if ($form_is === true) {
                    // Enfin, si tous les tests sont concluants, on lance la fonction et on retourne son résultat
                    return $GLOBALS['_functions'][$_array[ 'action' ]][ 'function' ]($_array[ 'data' ]);
                }
                else {
                    return return_json(
                        array(
                            'status' => 'error',
                            'reason' => return_error($GLOBALS['_CORRUPTED_FORM']),
                            'message' => return_error($form_is)
                        )
                    );
                }
            }
            else {
                return return_json(
                    array(
                        'status' => 'error',
                        'reason' => return_error($GLOBALS['_UNKNOWN_FUNCTION']),
                        'message' => return_error($action_exists)
                    )
                );
            }
        }
        else {
            return return_json(
                array(
                    'status' => 'error',
                    'reason' => return_error($GLOBALS['_NO_ACTION'])
                )
            );
        }
    };
?>