<?php 
$headers = '';
$headers.= 'MIME-Version: 1.0'."\n";
$headers.= 'Content-Transfer-Encoding: base64'."\n";
$headers.= "Content-type: text/html; charset= utf8\n";
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$message = $_POST['message'];
$formcontent="From: $nom $prenom \n Message: $message" ;
$recipient = "remi260995@live.fr";
$subject = "Message via formulaire";
$mailheader = "From: $email \r\n";
$envoi=mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Merci, le formulaire a bien été envoyé ! Vous allez être redirigé dans quelques instants. ";
if($envoi) header("refresh:5;url=index.php");
else echo"L'envoi a échoué, merci de renouveler l'opération !"; 
?>

<?php

try {

   $bdd = new PDO('mysql:host=localhost;dbname=;charset=utf8', "", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

} catch (PDOException $e) {

   print "Erreur !: " . $e->getMessage() . "<br/>";

   die();

}  if(isset($_POST) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['message'])) {

   $name =   $_POST['nom'];

   $firstname = $_POST['prenom'];

   $email = $_POST['email'];

   $message = $_POST['message'];    $requete = $bdd->prepare('INSERT INTO message(Nom, Prenom, Email, Message) VALUES (:nom, :prenom, :email, :message)');

   $requete->execute(array("nom" => $name, "prenom" => $firstname, "email" => $email, "message"=> $message));  }

?>