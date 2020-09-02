<?php
    $_NO_ACTION = 0;
    $_UNKNOWN_FUNCTION = $_NO_ACTION + 1;
    $_CORRUPTED_FORM = $_UNKNOWN_FUNCTION + 1;
    $_WAS_REQUIRED = $_CORRUPTED_FORM + 1;
    $_WRONG_TYPE_NOT_REQUIRED = $_WAS_REQUIRED + 1;
    $_NEEDED_NO_NUMERIC = $_WRONG_TYPE_NOT_REQUIRED + 1;
    $_NON_REQUIRED_NULL = $_NEEDED_NO_NUMERIC + 1;
    $_TYPED_REQUEST_MISSING_PARAMETERS = $_NEEDED_NO_NUMERIC + 1;
    $_TYPED_REQUEST_TOO_MUCH_PARAMETERS = $_TYPED_REQUEST_MISSING_PARAMETERS + 1;
    $_INVALID_MAIL_STRUCTURE = $_TYPED_REQUEST_TOO_MUCH_PARAMETERS + 1;
    $_NO_USER_WITH_PARAMS = $_INVALID_MAIL_STRUCTURE + 1;
    $_NB_ERROR = $_NO_USER_WITH_PARAMS + 1;

    $_error_messages = [];
    $_error_messages[$_NO_ACTION] = "Aucune action définie";
    $_error_messages[$_UNKNOWN_FUNCTION] = "Aucune fonctionnalité pour la requête";
    $_error_messages[$_CORRUPTED_FORM] = "Données manquantes, incomplètes ou incorrectes pour la requête";
    $_error_messages[$_WAS_REQUIRED] = "Un champ requis n'a pas été transmis";
    $_error_messages[$_WRONG_TYPE_NOT_REQUIRED] = "Paramètre facultatif passé avec le mauvais type";
    $_error_messages[$_NEEDED_NO_NUMERIC] = "Passage d'un paramètre numérique pour un champ non numérique";
    $_error_messages[$_NON_REQUIRED_NULL] = "Paramètre non requis passé nul";
    $_error_messages[$_TYPED_REQUEST_MISSING_PARAMETERS] = "Paramètre absent d'une requête avec type";
    $_error_messages[$_TYPED_REQUEST_TOO_MUCH_PARAMETERS] = "Paramètre excédentaire d'une requête avec type";
    $_error_messages[$_INVALID_MAIL_STRUCTURE] = "Structure de l'adresse mail incorrecte";
    $_error_messages[$_NO_USER_WITH_PARAMS] = "Aucun utilisateur pour les paramètres donnés";
    
    function return_error($_error_code = -1) {
        // echo '<p>return_error()</p>';
        return 'Error '.(integer)$_error_code.' => '.$GLOBALS['_error_messages'][$_error_code];
    };
?>