<?php 
    require_once("db_config.php");

    //redirect if not auth
    if(!userIsAlreadyIn($dbh->db)){
        header('Location: ./../index.php');
    }
    
    //rimuove un mi piace ad un post se già presente, o ne aggiunge uno
    //però se un utente vuole aggiungere un like dove il like c'è già, non succede nulla, perchè nel db 
    //l'entità like ha come chiave primaria la coppia (idPost, idUtente), quindi un certo utente può mettere
    //like ad un post una sola volta
    $idPost = $_POST["postId"];
    $remove = false;
    if(isset($_POST["remove"])) {
        $remove = $_POST["remove"];
    }

    if($remove){
        $dbh->removeLike($idPost, $_SESSION["user_id"]);
    } else {
        $dbh->insertLike($idPost, $_SESSION["user_id"]);
    }
    $result["likes"] = $dbh->getLikesByPostId($idPost);
    $result["senderId"] = $_SESSION["user_id"];
    $result["receiverId"] = $dbh->getPostById($idPost)[0]["userId"];

    header('Content-Type: application/json');
    echo json_encode($result);
?>