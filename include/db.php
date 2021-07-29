<?php
include 'connect.php';
function getUserById($id){
    $sql = 'SELECT * FROM users WHERE id=:id;';//requête SQL avec paramètre nommé (:id) au lieu de ?
    $cnx =connect(); //ouverture de la connexion
    $pstmt = $cnx->prepare($sql); //envoi de la requête
    //$pstmt->bindValue(':id',$id);//execution
    //ou
    $pstmt->execute([':id'=>$id,]);
    return $pstmt->fetch();//récupération dans un ResultSet (tab associatif)
}
function getUserByPseudo($pseudo)
{
    $sql = 'SELECT * FROM users WHERE pseudo=:pseudo;';//requête SQL avec paramètre nommé (:id) au lieu de ?
    $cnx = connect(); //ouverture de la connexion
    $pstmt = $cnx->prepare($sql); //envoi de la requête
    //$pstmt->bindValue(':id',$id);//execution
    //ou
    $pstmt->execute([':pseudo' => $pseudo,]);
    return $pstmt->fetch();//récupération dans un ResultSet (tab associatif)
}
    function selectTweetsById($author_id){
    $sql = 'SELECT tweets.*,users.pseudo as username FROM tweets JOIN users ON tweets.author_id=users.id WHERE author_id=:author_id;';//requête SQL avec paramètre nommé (:id) au lieu de ?
    $cnx =connect(); //ouverture de la connexion
    $pstmt = $cnx->prepare($sql); //envoi de la requête
    //$pstmt->bindValue(':id',$id);//execution
    //ou
    $pstmt->execute([':author_id'=>$author_id,]);
    return $pstmt->fetchAll();//récupération dans un ResultSet (tab associatif)

}
function select10Tweets(){
    $sql = 'SELECT tweets.*,users.pseudo as username FROM tweets JOIN users ON tweets.author_id=users.id ORDER BY date_created desc limit 10;';//requête SQL
    $cnx =connect(); //ouverture de la connexion
    $pstmt = $cnx->prepare($sql); //envoi de la requête
    $pstmt->execute();//execution
    return $pstmt->fetchAll(); //récupération dans un ResultSet (tab associatif dans un tab indicé numérique)

}
function selectAllTweets(){
    $sql = 'SELECT * FROM tweets;';//requête SQL
    $cnx =connect(); //ouverture de la connexion
    $pstmt = $cnx->prepare($sql); //envoi de la requête
    $pstmt->execute();//execution
    return $pstmt->fetchAll(); //récupération dans un ResultSet (tab associatif dans un tab indicé numérique)

}
function insertTweet(string $tweet){
    $sql ="INSERT INTO tweets (id,author_id,message,likes_quantity,date_created) VALUE (null,1,:tweet,0,now());";
    $cnx =connect(); //ouverture de la connexion
    $pstmt = $cnx->prepare($sql); //envoi de la requête
    $pstmt->execute([':tweet'=>$tweet,]);//execution
}
function insertUser($email,$pseudo,$password,$biographie){
    $sql ="INSERT INTO users (id,email,pseudo,password,biographie,date_created) VALUE (null,:email,:pseudo,:password,:biographie,now());";
    $cnx =connect(); //ouverture de la connexion
    $pstmt = $cnx->prepare($sql); //envoi de la requête
    $pstmt->execute([':email'=>$email,':pseudo'=>$pseudo,':password'=>$password,':biographie'=>$biographie,]);//execution
}
function getUserByEmail($email){
    $sql = 'SELECT * FROM users WHERE email=:email;';//requête SQL avec paramètre nommé (:id) au lieu de ?
    $cnx =connect(); //ouverture de la connexion
    $pstmt = $cnx->prepare($sql); //envoi de la requête
    //$pstmt->bindValue(':id',$id);//execution
    //ou
    $pstmt->execute([':email'=>$email,]);
    return $pstmt->fetch();//récupération dans un ResultSet (tab associatif)
}
function addLike($id){
    $sql = "update tweets SET likes_quantity = likes_quantity+1 WHERE id=:id;";
    $cnx =connect(); //ouverture de la connexion
    $pstmt = $cnx->prepare($sql); //envoi de la requête
    $pstmt->execute([':id'=>$id,]);

}
?>