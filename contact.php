<?php 

class Formulaire {
	private $erreur = array();
	private $donnee = array();
    private $testafaire = FALSE;
	
	function __construct() {
	  // si le champ caché est renseigné alors on a appuyé sur validé
	  if (isset($_POST['action'])) $this->testafaire = TRUE;
	}
	public function setDonnee($champ) {
	  $val = ltrim(isset($_POST[$champ]) ? $_POST[$champ] : "");
	  $this->donnee[$champ] = $val;
	}
		
	public function getDonnee($champ) {
		return (isset($this->donnee[$champ]) ? $this->donnee[$champ] : "");
	}
	
	public function echoErreur ($champ) {
	   if (isset($this->erreur[$champ]) && $this->erreur[$champ] != "") echo '<span class="erreur">'.$this->erreur[$champ].'</span>';
	}
	public function testGlobal () {
		if (!$this->testafaire) return FALSE;
        $test = TRUE;  		
		foreach ($this->donnee as $key => $value) {
		    // Il faut continuer la boucle même s'il y a des erreurs pour les messages d'erreur
			if (!$this->testDonnee($key,$value)) $test = FALSE;
		}
		return $test;
	}
	public function testDonnee ($champ,$valeur) {
	  $err = "";
      if ($valeur == "") $err = 'Champ obligatoire';
	  if ($champ == "email") {
		$valeur = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
		if ($valeur == FALSE) $err ='Adresse mail n\'est pas valide';
	  }
	  $this->erreur[$champ] = $err;
	  return ($err=="");
	}
}

class GestionMail extends Formulaire {
	public $mailTo;
	private $msg;
	private $formulaireOK;
	
	function __construct() {
	    Formulaire::__construct();
		$this->formulaireOK = FALSE;
	}
	function getTest() {
		return $this->formulaireOK;
	}
	function getMsgEnvoiMail() {
		return $this->msg;
	}
	public function envoiMail () {
	    $this->formulaireOK = $this->testGlobal();
		if ($this->formulaireOK) {
			$entete='From:'.$this->getDonnee('email')."\n";
			// s'il n'y a pas d'erreur alors on peut envoyer le mail
			try {
			    if ( mail($this->mailTo, $this->getDonnee('sujet'),$this->getDonnee('message'), $entete) ) 
					$this->msg ="Le mail a bien été envoyé à Erwan Dagorn, merci.";
				else $this->msg = "Echec de l’envoi du mail.";
			} catch (Exception $e) {
				$this->msg = "Echec de l’envoi du mail.";
				$this->msg .= "\n".$e->getMessage();
			}
		}
	}

}

$form = new GestionMail();
$form->setDonnee('nom');
$form->setDonnee('email');
$form->setDonnee('sujet');
$form->setDonnee('message');
$form->mailTo = "erwan.dagorn@gmail.com";
$form->envoiMail();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0014)about:internet -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description"
	content="CV Développeur Web sur Quimper, Développeur Web sur Lorient, Développeur Web sur Brest,  compétences en HTML, CSS, Jquery, PHP..." />

<title>Erwan Dagorn Développeur Web Quimper Lorient Brest </title>
<?php include('php/head.php'); ?>

</head>
<body id="contact">
<div id="contener">
<h1> <a href="index.php"> Erwan Dagorn Developpeur Web</a></h1>
<div id="main">
<h2 id="first-h2">Contact</h2>

<p> Pour me contacter, utilisez le formulaire ci-dessous ou consultez mes coordonnées complètes en droite de page.</p>
<br />
<?php 
if ($form->getTest()) {
    echo '<p>'.$form->getMsgEnvoiMail().'</p>'; 
} else {
?>

<form method="post" action="contact.php">
<p><label for="nom">Nom :</label>  
<input type="text" name="nom" id="nom" <?php echo 'value="'.$form->getDonnee('nom').'"'; ?> /> 
<?php  $form->echoErreur('nom'); ?></p>
<p><label for="email">Email :</label> 
<input type="text" name="email" id="email" <?php echo 'value="'.$form->getDonnee('email').'"'; ?> /> 
<?php $form->echoErreur('email'); ?></p>
<p><label for="sujet">Sujet :</label> 
<input type="text" name="sujet" id="sujet" <?php echo 'value="'.$form->getDonnee('sujet').'"'; ?>/> <?php $form->echoErreur('sujet'); ?></p>
<p><label for="message">Message : </label>  <textarea type="text" name="message" id="message" > <?php echo $form->getDonnee('message'); ?></textarea> <?php echo $form->echoErreur('message'); ?></p>
<input type="hidden" name="action" value="process" />
<p> <input class="col2" type="submit" value="Envoyer" /></p>
</form>

<?php } ?>
<div class="col-droite">
<table> 
<tr> <td>
<img src="images/email.gif" alt="Email" title="Email" /> </td>
<td>
<script type="text/javascript">
//<![CDATA[
var m9="";for(var w6=0;w6<201;w6++)m9+=String.fromCharCode(("8#4A3!^CC\\(14I8#4A+Y^Q\\+Y]YT\\+YLLJ3!L^t64+0)O(41/d*#4d1&\'IIC\\9E~DJ79J2Nie;~}H~M7~D:\\c}H;FB79;]d~d=aWW^`WcWc9>7}HvJ]e^`)J}H?D=c<}HE}Cx>7}HxE:;]fegaffi^CO%*#4d1&\'b6I+YJNISQJLQ:T(JFIVKZLVQJLTSNQJ\\\'8#.I3!J".charCodeAt(w6)-(33)+0x3f)%(0x5f)+6*6-4);document.write(eval(m9))
//]]>
</script>
</td></tr>
<tr><td><img src="images/telephone.jpg" alt="Téléphone" title="Téléphone" /> </td>
<td>06 32 40 25 71 </td></tr>

</table>

    </div>

<h2>  </h2>
<p>
</p>
<?php include('php/footer.php'); ?>

</div>
</div>

<?php include('php/navigation.php'); ?>

</body>
</html>
