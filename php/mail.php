function formulaire ($champ) {
  $val = (isset($_GET[$champ]) ? $_GET[$champ] : "");
  return $val;
}

$nom = formulaire('nom');
$email = formulaire('email');
$object = formulaire('sujet');
$message = formulaire('message');
$destinataire = "contact@erwand.fr";

// On envoi l’email
if ( mail($destinataire, $objet, $message) ) echo "Envoi du mail réussi."
   else echo "Echec de l’envoi du mail."

