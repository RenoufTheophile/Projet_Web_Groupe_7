<div class='recherche'>
  <?php 
  $bdd = new PDO('mysql:host=localhost;dbname=webproject;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

  /*récupération des id et noms des produits pour pouvoir faire le lien avec la page template d'un produit*/
  $requete =$bdd->query("CALL select_goodies_id_name()");
  $variableAPasser=[];
  $associé=[];

  while($data=$requete->fetch(PDO::FETCH_ASSOC)){
      $variableAPasser[]=$data['goodies_name'];
      $associé[$data['goodies_name']]=$data['goodies_id'];
  }
  ?>
<form name="test" method="post" action="redirect.php">
        <span class='text_recherche'>Barre de recherche: </span>
        <input id="tags" type="text" name="article"/>
        <input type="submit" class='redirection_article' name="valider" value="Aller à l'article"/>
</form>
</div>

<!-- script d'autocompletion avec en parametre d'entré la liste des noms de produits-->
<script>
$( function() {
  var tab = <?php echo json_encode($variableAPasser); ?>;
  $( "#tags" ).autocomplete({
    source: tab
  });
} );
</script>