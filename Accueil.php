<?php 
 
  // r�cup�ration du pr�nom
  if(isset($_COOKIE["prenom"]))   { $prenom=$_COOKIE["prenom"]; }
  elseif(isset($_POST["prenom"])) { $prenom=$_POST["prenom"];   }
	
  if(isset($prenom))
    {
      $cas="CONNU";
	  $nb_visite=$_COOKIE["nb_visite"]+1;
      setcookie("nb_visite",$nb_visite); 
	  // $_COOKIE["nb_visite"]=$_COOKIE["nb_visite"]+1;
	  // ou setcookie("nb_visite",++$_COOKIE["nb_visite"]);	  
	  // ou setcookie("nb_visite",$_COOKIE["nb_visite"]++);	  
	  if(!isset($_COOKIE["prenom"])) 
	    { setcookie("prenom",$prenom); }
    }
  else 
    { $cas="INCONNU";
	  $nb_visite=1;
      setcookie("nb_visite",1);
    }
	
/* Questions de compr�hension du code PHP

(1pt+1pt) 1. Quand est-ce que le test de la ligne 4 est vrai ? A quel chargement ?
(1pt+1pt) 2. Quand est-ce que le test de la ligne 5 est vrai ? A quel chargement ?
(1pt+1pt) 3. Quand est-ce que le test de la ligne 7 est vrai ? A quel chargement ?
(1pt) 4. A quoi sert le test de la ligne 13 ?
(2pt) 5. Expliquez (en 3 lignes mximum) ce qu'est une session PHP.
(1pt) 6. Dans la configuration actuelle, l'identifiant de session est-il pass� par COOKIE ou par URL ?

*/

?>
<html>
<head>
	<title>Cookies</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

<!-- debut de la generation PHP -->
<?php 
  if($cas=="INCONNU")
    { // demande d'identification
      ?>
      Bonjour, je ne vous connais pas.
      C'est la 1�re fois que vous acc�dez � cette page.
      Veuillez saisir votre pr�nom.<br /><br />
      <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
            <input type="text"   name="prenom"> 
            <input type="submit" value="OK">
      </form>
	  <?php
    } 
  else
    { switch($nb_visite)
        {
          case 2  : echo"Bonjour $prenom, je suis ravi de faire votre connaissance.<br />\n";
                    break;
          case 3  : 
          case 4  : 
          case 5  : echo" Bonjour $prenom,
                          c'est la $nb_visite �me fois que tu acc�des � mon site.<br />\n";
                    break;
          default : echo" Salut $prenom, bienvenu sur mon site.<br />\n";
                    break;
        }
	  echo "<a href=".$_SERVER["PHP_SELF"].">Recharger.</a>\n";	

    }

?>
<!-- fin de la generation PHP -->
</body>
</html>
