<?php 
 //Nous allons démarrer la session avant toute chose
   session_start() ;
  if(isset($_POST['boutton-valider'])){ // Si on clique sur le boutton , alors :
    //Nous allons verifiér les informations du formulaire
    $erreur = "" ;
    if(isset($_POST['name'])&&isset($_POST['email']) && isset($_POST['message'])){ //On verifie ici si l'utilisateur a rentré des informations
       //Nous allons verifier si les informations entrée sont correctes
       //Connexion a la base de données
       $mess = "" ;
       $nom_serveur = "localhost";
       $utilisateur = "root";
       $mot_de_passe ="";
       $nom_base_données ="form" ;
       $con = mysqli_connect($nom_serveur , $utilisateur ,$mot_de_passe , $nom_base_données) ;
       $req = mysqli_query($con , "INSERT INTO contact(Nom_complet,EMAIL,MESSAGES) VALUES 
       ('".$_POST['name']."','".$_POST['email']."', '".$_POST['message']."')" ) ;
       $mess ="Message enregistré avec succèes !" ;
       echo "<p class= 'message'>".$mess."</p>"  ;
    }
    else {//si non
        $erreur = "Veuillez entrer remplir toutes les informations!";
    }
  }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIEEMA-SEGOU</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li id="logo"><a href="#">LIEEMA-SEGOU</a></li>
                <li><a href="#langue">Langue</a></li>
                <li><a href="admin.php">Administrateurs</a><li>
                <li><a href="#contact">Nous contacter</a></li>
                <li><a href="Formulaire/bienvenu.php">Inscription</a></li>
            </ul>
        </nav>
        <div id="imagePrincipale">
            <h1> Ligue Islamique des Elèves et Etudiants du MALI</h1>
            <div id="premierTrait"></div>
            <h3>Et cramponnez-vous tous ensemble au HABL d'ALLAH et ne soyez pas divisés(Sourate 3 verset 103)</h3>
        </div>
    </header>
    <section id="presentation">
        <div id="texteIntro">
            <h2>Une communauté,une histoire</h2>
            <p>La Ligue Islamique des Eleves et Etudiants du MALI (LIEEMA) à été crée en ...Ella a pour objectif principal ....La section de SEGOU comporte en son sein plusieurs sous sections de plusieurs établissements à savoir le lycée technique de Ségou ,...

            </p>
        </div>
        <div id="prestations">
            <div class="imagesPrestations">
                <h4>Nous trouver</h4>
                <a href="#"><img src="support-projet-1-master/media/Mali.png"style="width:300px;height: 300px" alt="carte"></a>
            </div>
            <div class="imagesPrestations">
                <h4>Coté Activité</h4>
                <a href="#"><img src="support-projet-1-master\media\activite.jfif"style="width:300px;height: 300px" alt="Activite"></a>
            </div>
            <div class="imagesPrestations">
                <h4>Coté seminaire</h4>
                <a href="#"><img src="support-projet-1-master\media\sminaire.jpg" style="width:300px;height: 300px" alt = "seminaire"></a>
            </div> 
        </div>
    </section>
    <section id="tourisme">
        <h2>Et tant à découvrir...</h2>
        <ul>
            <li id="ocean"><p><a href="https://www.youtube.com/watch?v=ylTRSWqfZJ4&list=PLT0a9aNZsHG0Wo7RQmB47NniSx9tjNvOE">AT-TAWHID</a></p></li>
            <li id="chateau"><p><a href="https://www.youtube.com/watch?v=dodNVFUxdQg&list=PLT0a9aNZsHG2j-PuQ2pBtzhccRYQQ0Mu8">Saint QUR'AN</a></p></li>
            <li id="phare"><p><a href="https://www.youtube.com/channel/UCWVCYaNLQT9Y1HDIHJuzI2A">La prière</a></p></li>
            <li id="vignoble"><p><a href="https://www.youtube.com/channel/UCWVCYaNLQT9Y1HDIHJuzI2A">L'aumone</a></p></li>
        </ul>            
        </div>
    </section>
    <footer>
        <h2 id="contact">Contactez-nous</h2>
        <?php 
        if(isset($erreur)){// si la variable $erreur existe , on affiche le contenu ;
            echo "<p class= 'Erreur'>".$erreur."</p>"  ;
        }
        ?>
        <form name="myForm" method="post">
            <table class="form-style">
                <tr>
                   <td>
                      <label>
                         Votre nom <span class="required">*</span>
                      </label>
                   </td>
                   <td>
                      <input type="text" name="name" class="_100"/>
                      <span class="error" id="errorname"></span>
                   </td>
                </tr>
                <tr>
                   <td>
                      <label>
                         Votre adresse e-mail <span class="required">*</span>
                      </label>
                   </td>
                   <td>
                      <input type="email" name="email" class="_100"/>
                      <span class="error" id="erroremail"></span>
                   </td>
                </tr>
                <tr>
                   <td>
                      <label>
                         Message <span class="required">*</span>
                      </label>
                   </td>
                   <td>
                      <textarea name="message" class="_100"></textarea>
                      <span class="error" id="errormsg"></span>
                   </td>
                </tr>
                <tr>
                   <td></td>
                   <td>
                      <input type="submit" value="Envoyer" name="boutton-valider">      
                      <input type="reset" value="Réinitialiser"> 
                   </td>
                </tr>
             </table>
        </form>
        <div id="deuxiemeTrait"></div>
        <div id="copyrightEtIcons">
            <div id="copyright">
                <span>© fromScratch();2022</span>
            </div>
            <div id="icons">
                <a href="http://www.twitter.fr"><i class="fa fa-twitter"></i></a>
                <a href="http://www.facebook.fr"><i class="fa fa-facebook"></i></a>
                <a href="https://www.youtube.com/channel/UCWVCYaNLQT9Y1HDIHJuzI2A"><i class="fa fa-youtube"></i></a>
                <a href="http://www.instagram.com"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
    </footer>
</body>
</html>
