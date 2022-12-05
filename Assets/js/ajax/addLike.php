<?php
    extract($_POST);

   require_once('connection.php');

    $requesteVerifLike = $db->prepare("SELECT * FROM ListLikes WHERE idUser = :idUser AND idShow = :idShow");
    $requesteVerifLike->execute(array(":idUser" => $idUser, ":idShow" => $idShow));
    $requesteVerifLike2 = $requesteVerifLike->fetch();

    if(!$requesteVerifLike2){
         try {
            $requestSendLike = $db->prepare("INSERT INTO ListLikes VALUES (:idUser, :idShow, NULL)");
            $requestSendLike->execute(array(":idUser" => $idUser, ":idShow" => $idShow));
        }
        catch (Exception $e) {
            echo 'Erreur survenue : ',  $e->getMessage(), "\n";
        }
        echo '0';
    }
    else {
        try{
            $requestDeleteLike = $db->prepare("DELETE FROM ListLikes WHERE idUser = :idUser AND idShow = :idShow");
            $requestDeleteLike->execute(array(":idUser" => $idUser, ":idShow" => $idShow));
        }
        catch (Exception $e) {
            echo 'Erreur survenue : ',  $e->getMessage(), "\n";
        }
        echo '1';  
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