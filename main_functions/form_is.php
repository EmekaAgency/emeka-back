<?php
    // Cette fonction vérifie si les données du formulaire correspondent à ce qui est nécessaire pour traiter la requête
    function form_is($_index = -1, $_form_array = array()){
        // echo '<p>form_is()</p>';
        foreach( array_keys($_form_array) as $key ) {
            // On vérifie d'abord si la valeur est NULL ou undefined alors qu'elle est obligatoire
            // echo '<p>$GLOBALS[\'_needs\']['.$_index.'][\''.$key.'\'][\'required\'] => '.$GLOBALS['_needs'][$_index][$key]['required'].'</p>';
            // echo '<p>type of '.$key.' = '.get_type($_form_array[$key]).'</p>';
            if (
                $GLOBALS['_needs'][$_index][$key][ 'required' ] == true &&
                (
                    !isset($_form_array[$key]) ||
                    is_null($_form_array[$key])
                )
            ) {
                // echo '<p>Required error on key '.$key.'</p>';
                return $GLOBALS['_WAS_REQUIRED'];
            }
            // On vérifie ensuite si le type de la valeur correspond au(x) type(s) attendu(s)
            // De cette façon, pour le formulaire de login, on peut quand même vérifier si les champs sont bons sans pour autant les marquer comme obligatoire
            if(
                !in_array(
                    get_type($_form_array[ $key ]),
                    $GLOBALS['_needs'][$_index][ $key ][ 'type' ]
                )
            ){
                // echo '<p>Type error on key '.$key.'</p>';
                return $GLOBALS['_WRONG_TYPE_NOT_REQUIRED'];
            }
            // On vérifie ensuite s'il existe une valeur numérique alors qu'aucun champ numérique n'est
            // requis pour le paramètre. L'envoi de données étant en string, un 2 devient '2' et pourrait
            // passer le précédent filtre pour un paramètre attendant un string, créant une erreur
            if(
                is_numeric($_form_array[$key]) &&
                !in_array('integer', $GLOBALS['_needs'][$_index][ $key ][ 'type' ]) && 
                !in_array('double', $GLOBALS['_needs'][$_index][ $key ][ 'type' ]) && 
                !in_array('float', $GLOBALS['_needs'][$_index][ $key ][ 'type' ]) && 
                !in_array('number', $GLOBALS['_needs'][$_index][ $key ][ 'type' ])
            ) {
                // echo '<p>Numeric error on key '.$key.'</p>';
                return $GLOBALS['_NEEDED_NO_NUMERIC'];
            }
            // On vérifie qu'aucun des paramètres passés ne soit null
            if($_form_array[$key] == null) {
                return $GLOBALS['_NON_REQUIRED_NULL'];
            }
            if($key == 'email') {
                if(!is_mail($_form_array['email'])) {
                    return $GLOBALS['_INVALID_MAIL_STRUCTURE'];
                }
            }
        }
        // On vérifie ensuite si le formulaire possède une spécialisation (type pour signup ou
        // login par exemple) et si la spécialisation est définie dans les settings de la fonction.
        // Si oui, on vérifie avec match_type_parameters que les bons champs soient présents.
        if(isset($GLOBALS['_needs'][$_index]['types'][$_form_array['type']])) {
            $retour = match_type_parameters($_form_array, $GLOBALS['_needs'][$_index]['types'][$_form_array['type']]);
            if(is_numeric($retour)) {
                return $retour;
            }
        }
        // Si tous les tests sont concluants, on renvoie un true
        return true;
    };
?>