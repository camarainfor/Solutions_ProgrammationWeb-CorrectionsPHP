<html>
<head>
	<title>Tableaux</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="white">


<h1>Potes de promo</h1>

<h3>Avec une boucle for</h3>
<ul>
<!-- debut de la generation PHP -->
<?php 
	$PotesDePromo[]="Pierre";
	$PotesDePromo[]="Paul";
	$PotesDePromo[]="Jean";
	$PotesDePromo[]="Sophie";
	$PotesDePromo[]="Julie";
	// �quivalent �
	//$PotesDePromo=array("Pierre","Paul","Jean","Sophie","Julie");
	
	$nb=count($PotesDePromo);
	for($i=0; $i<$nb; $i++)  
	  { 
		echo "<li>".$PotesDePromo[$i]."</li>\n";
	  }
?>
<!-- fin de la generation PHP -->
</ul>


<h3>Avec une boucle foreach</h3>
<ul>
<!-- debut de la generation PHP -->
<?php 
	foreach($PotesDePromo as $Indice => $Pote)
	  {
	    echo "<li>$Pote</li>\n";
	  }
?>
<!-- fin de la generation PHP -->
</ul>



<h1>Cantine</h1>
<h3>Affichage par print_r(tableau)</h3>

<!-- debut de la generation PHP -->
<?php 
  $menu=array("Lundi" 	 => array("Entr�e"  => "Salade",
								  "Plat"    => "Boudin/Pur�e",
								  "Dessert" => "Mousse au chocolat"
								  ),
			  "Mardi"	 => array("Entr�e"  => "Tomates",
								  "Plat"    => "Couscous",
								  "Dessert" => "Glace"
								  ),
			  "Mercredi" => array("Entr�e"  => "Sardines",
			  					  "Plat"    => "Steack/Frites",
								  "Dessert" => "Yaourt"
								  )
			  );

  $menu["Jeudi"]["Entr�e"]="Jambon";
  $menu["Jeudi"]["Plat"]="Paella";
  $menu["Jeudi"]["Dessert"]="G�teau";

  $menu["Vendredi"]["Entr�e"]="Poireaux vinaigrette";
  $menu["Vendredi"]["Plat"]="Poisson/Riz";
  $menu["Vendredi"]["Dessert"]="Pomme";

  echo "<pre>\n";
  print_r($menu);
	
	?>
	
<!-- fin de la generation PHP -->
</pre>
	
<h3>Affichage en tableau avec la premi�re ligne fixe</h3>
	<table border="1" width="100%">
			<tr>
				<th width="25%">&nbsp;</th>
				<th width="25%">Entr&eacute;e</th>
				<th width="25%">Plat</th>
				<th width="25%">Dessert</th>
			</tr>

<!-- debut de la generation PHP -->
	
	<?php		
	foreach($menu as $jour=>$plats) 
          { 
            echo '
			<tr>
				<th align="left">'.$jour.'</th>
				<td>'.$plats["Entr�e"].'</td>
				<td>'.$plats["Plat"].'</td>
				<td>'.$plats["Dessert"].'</td>
			</tr>';
          }
?>

<!-- fin de la generation PHP -->


        </table>


		<h3>Affichage en tableau avec la premi�re ligne dynamique</h3>
		<table border="1" width="100%">
			<tr>
				<th width="25%">&nbsp;</th>
<?php			
    // Possibilit� de r�cup�er 1 cellule d'un tableau sans sp�cifier son indice
	// $menu[array_keys($menu)[0]]
	// array_rand($menu);
	// foreach($menu as $plats) break;
	
	foreach(reset($menu) as $typePlat => $plat)
		  { echo '
				<th width="25%">'.$typePlat."</th>";
		  }
	echo "</tr>";

	foreach($menu as $jour=>$plats) 
          { 
            echo '
			<tr>
				<th align="left">'.$jour.'</th>';
			foreach($plats as $plat)
			      { echo '
				<td>'.$plat.'</td>';
				  }
			echo '
			</tr>';
          }
?>

        </table>


		<h3>Affichage en tableau tout dynamique</h3>
		<table border="1" width="100%">
			<tr>
				<th width="25%">&nbsp;</th>
<?php				
	// Rajout de plats dans les menus
    $menu["Mercredi"]["2�me dessert"]="Poire";
    $menu["Vendredi"]["Fromage"]="Munster";

	// R�cup�ration des cl�s de deuxi�me niveau
	foreach($menu as $jour => $plats)
		  { foreach($plats as $typePlat => $plat)
		           { $TabEntetesColonnes[$typePlat]=$typePlat;
				   }
		  }
	print_r($TabEntetesColonnes);	  
	// Affichage la premi�re ligne
	foreach($TabEntetesColonnes as $typePlat)
		  { echo '
		  		<th width="25%">'.$typePlat."</th>";
		  }
	echo "</tr>\n";

	foreach($menu as $jour=>$plats) 
          { 
            echo '
			<tr>
				<th align="left">'.$jour.'</th>';
				foreach($TabEntetesColonnes as $typePlat)
			      { if(isset($plats[$typePlat])) 
				 	  { echo '
					  <td>'.$menu[$jour][$typePlat].'</td>';
					  } 
				  	else 
					  { echo "
					  <td>&nbsp;</td>";
					  }
				  }
			echo '
			</tr>';
          }
?>
	</table>

</body>
</html>