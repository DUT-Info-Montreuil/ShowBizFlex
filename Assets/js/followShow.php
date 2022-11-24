<?php

extract($_POST);

$dsn = "mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201637;charset=UTF8";
$bdd = new PDO($dsn, 'dutinfopw201637', 'suqebamu');

$sql = 'SELECT * FROM Show WHERE idShow = :idShow';
$showExist=$bdd->prepare($sql);
$showExist->execute(array(':idShow'=>$idShow));
$verif = $showExist->fetch();

if(!$verif){
    $sql2 = 'INSERT INTO `Show` (`idShow`, `rating`) VALUES (:idShow, NULL)';
    $sth=$bdd->prepare($sql2);
    $sth->execute(array(':idShow'=>$idShow));
}

$verifShowInFollowed=$bdd->prepare('SELECT * FROM FollowedShows WHERE idUser=:idUser AND idShow=:idShow');
$verifShowInFollowed->execute(array(':idUser'=>$idUser,':idShow'=>$idShow));
$row = $verifShowInFollowed->fetch();

if(!$row){
    $sql3 = 'INSERT INTO `FollowedShows` (`idUser`, `idShow`) VALUES (?, ?)';
    $inser=$bdd->prepare($sql3);
    $inser->execute(array($idUser,$idShow));

    echo '1';
 }
 
 else{

    $inser=$bdd->prepare('DELETE FROM FollowedShows WHERE idUser=:idUser AND idShow=:idShow');
    $inser->execute(array(':idUser'=>$idUser,':idShow'=>$idShow));

    echo '0';
 }
 


?>