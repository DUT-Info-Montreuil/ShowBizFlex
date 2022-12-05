<?php
    extract($_POST);

    $dsn = "mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201637;charset=UTF8";
    $db = new PDO($dsn, 'dutinfopw201637', 'suqebamu');

    if($com != null && isset($com) && isset($idUser) && isset($idShow)){
        try{
            $requestSendComments = $db->prepare("INSERT INTO Comment VALUES (NULL, :comment, :idUser, :idShow, NULL)");
            $requestSendComments->execute(array(":comment" => $com, "idUser" => $idUser, ":idShow" => $idShow));
            echo 'NonVide';
        }
        catch (Exception $e) {
            echo 'Erreur survenue : ',  $e->getMessage(), "\n";
        }
    }
    else {
        echo 'Vide';
    }
   
?>


<?php
/*
ShowBizFlex - 2022/12/05
GNU GPL CopyLeft 2022-2032
Initiated by Rachid ABDOULALIME - Steven CHING - Yanis HAMANI
WebSite : <https://dev.showbizflex.com/>
*/
?>