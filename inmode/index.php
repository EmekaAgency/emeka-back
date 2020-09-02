 <?php
    header('Content-type: text/html; charset=UTF-8');
    date_default_timezone_set('UTC');
    ////////// INCLUDE MAIN FUNCTIONS //////////
    // echo "<br/>require_once('../main_functions/get_type.php')<br/>";
    require_once("../main_functions/get_type.php");
    // echo "<br/>require_once('../main_functions/is_mail.php')<br/>";
    require_once("../main_functions/is_mail.php");
    // echo "<br/>require_once('../main_functions/return_json.php')<br/>";
    require_once("../main_functions/return_json.php");
    // echo "<br/>require_once('../main_functions/get_connection.php')<br/>";
    require_once("../main_functions/get_connection.php");

    // INCLUDE CHECKING FUNCTIONS
    // echo "<br/>require_once('../main_functions/action_is_set.php')<br/>";
    require_once("../main_functions/action_is_set.php");
    // echo "<br/>require_once('../main_functions/action_exists.php')<br/>";
    require_once("../main_functions/action_exists.php");
    // echo "<br/>require_once('../main_functions/match_type_parameters.php')<br/>";
    require_once("../main_functions/match_type_parameters.php");
    // echo "<br/>require_once('../main_functions/form_is.php')<br/>";
    require_once("../main_functions/form_is.php");
    // echo "<br/>require_once('../main_functions/form_verify.php')<br/>";
    require_once("../main_functions/form_verify.php");
    // echo "<br/>require_once('../main_functions/reset_request.php')<br/>";
    require_once("../main_functions/reset_request.php");

    ////////// INCLUDE SPECIFIC FUNCTIONS //////////
    // echo "<br/>require_once('functions/signup.php')<br/>";
    require_once("functions/signup.php");
    // echo "<br/>require_once('functions/login.php')<br/>";
    require_once("functions/login.php");
    
    // INITIALIZE ENVIRONMENT CONSTANTS
    // echo "<br/>require_once('const/functions_settings.php')<br/>";
    require_once("const/functions_settings.php");
    // echo "<br/>require_once('const/errors.php')<br/>";
    require_once("const/errors.php");

    // Ici commence le index.php
    // On vérifie si le tableau est défini, ici et non pas de manière générique avec $_array dans le fichier form_verify.php puisque le paramètre est alors une copie, ce qui peut introduire un faux positif.
    // On retourne le retour de form_verify() puisque cette fonction va déclencher une cascade de tests et d'appels qui déboucheront soit sur un retour d'erreur soit sur le retour de la requête.
    if(isset($_POST)){
        $response = form_verify($_POST);
        if(action_is_set($_POST) && action_exists($_POST)) {
            reset_request($_POST['action'], "POST");
        }
        echo $response;
    }
    // if(isset($_GET)){
    //     $response = form_verify($_POST);
    //     if(action_is_set($_POST) && action_exists($_POST)) {
    //         reset_request($_POST->action, "POST");
    //     }
    //     echo return_json($response);
    // }
    // if(isset($_UPDATE)){
    //     $response = form_verify($_POST);
    //     if(action_is_set($_POST) && action_exists($_POST)) {
    //         reset_request($_POST->action, "POST");
    //     }
    //     echo return_json($response);
    // } // Pour le moment aucun UPDATE n'est prévu
    // if(isset($_DELETE)){
    //     $response = form_verify($_POST);
    //     if(action_is_set($_POST) && action_exists($_POST)) {
    //         reset_request($_POST->action, "POST");
    //     }
    //     echo return_json($response);
    // } // Pour le moment aucun DELETE n'est prévu
?>