<?php 
 //Nous allons démarrer la session avant toute chose
   session_start() ;
  if(isset($_POST["boutton-valider"])){ 
    // Si on clique sur le boutton , alors :
    //Nous allons verifiér les informations du formulaire
    if(isset($_POST['gender']) &&isset($_POST['nom']) &&isset($_POST['prenom']) &&isset($_POST['mail']) && isset($_POST['confirm_mail']) &&isset($_POST['mdp'])&&isset($_POST['confirm_mdp']) &&isset($_POST['statusm']) &&isset($_POST['mobile']) &&isset($_POST['city']) && isset($_POST['adress_1'])){
         //On verifie ici si l'utilisateur a rentré des informations
         //Nous allons mettres l'email et le mot de passe dans des variables
        $mail = $_POST['mail'] ;
        $Cmail = $_POST['confirm_mail'] ;
        $mdp = $_POST['mdp'] ;
        $Cmdp = $_POST['confirm_mdp'] ;
        $erreur = "" ;
        //Nous allons verifier si les informations entrée sont correctes
        //Connexion a la base de données
        $nom_serveur = "localhost";
        $utilisateur = "root";
        $mot_de_passe ="";
        $nom_base_données ="form" ;
        if($mail==$Cmail && $mdp==$Cmdp){
            $con = mysqli_connect($nom_serveur , $utilisateur ,$mot_de_passe , $nom_base_données) ;
            $req = mysqli_query($con , "INSERT INTO infopersomembres (GENRE,NOM,PRENOM,EMAIL,CONFIRM_EMAIL, MOT_DE_PASSE,CONFIRM_MOT_PAS,SITUATION_M, TEL, NATIONALITE, VILLE_ACTU, PROFESSION, ADRESSE, MESSAGE, SECTION, COMITE, ADHESION, POSTE_OCCUPEE, DATE_DEBUT, DATE_FIN) VALUES 
            ('".$_POST['gender']."','".$_POST['nom']."', '".$_POST['prenom']."','".$_POST['mail']."','".$_POST['confirm_mail']."', '".$_POST['mdp']."', '".$_POST['confirm_mdp']."', '".$_POST['statusm']."', '".$_POST['mobile']."', '".$_POST['country']."', '".$_POST['city']."', '".$_POST['profession']."', 
            '".$_POST['adress_1']."', '".$_POST['messag']."','".$_POST['section']."', '".$_POST['comite']."', '".$_POST['dat']."', '".$_POST['occupee']."','".$_POST['datedebut']."', '".$_POST['datefin']."' )" ) ;
            echo("Militant(e) '".$_POST['nom']."' enregistré(e) avec succèes !") ;
        }else {//si non
            $erreur = "Mail ou/et Mots de passe de confirmation incorrecte(s) !";
        }
    }
    else {//si non
        $erreur = "Un ou plusieurs champs obligatoire(s) ne sont pas remplis !";
    }
  }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inscription</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    </head>
    <body>
        <form action="" method="post">
            <header>
                <h1>Formulaire d'inscription</h1>
                <?php 
                if(isset($erreur)){// si la variable $erreur existe , on affiche le contenu ;
                    echo "<p class= 'Erreur'>".$erreur."</p>"  ;
                }
                ?>
            </header>
            <form method="post" class="_50">
                <fieldset>
                    <h2>Infos personnelles
                    <br>
                        <div class="_100" id="container">
                            <div id="bloc_1" class="_50">
                                <label for="genre">Genre*:</label>
                                <select name="gender" id="genre">
                                    <option value="">--Veuillez choisir une option--</option>
                                    <option value="fem">Feminin</option>
                                    <option value="masc">Masculin</option>
                                </select>
                                <br>
                                <label for="nom">Nom *</label>
                                <input type="text" name="nom" id="nom" required />
                                <br>
                                <label for="prenom">Prénom *</label>
                                <input type="text" name="prenom" id="prenom" required />
                                <br>
                                <label for="mail">E-mail *</label>
                                <input type="email" name="mail" id="mail" size="30" required  />
                                <br>
                                <label for="confirm_mail">Confirmer e-mail *</label>
                                <input type="email" name="confirm_mail" id="confirm_mail" size="30" required />
                                <br>
                                <label for="mdp">Mot de passe *</label>
                                <input type="password" name="mdp" id="mdp" required/>
                                <br>
                                <label for="confirm_mdp">Confirmer mot de passe *</label>
                                <input type="password" name="confirm_mdp" id="confirm_mdp" required/>
                                <br>
                            </div>
                            <div id="bloc_2" class="_50">
                                <label for="statusm">Situation Matrimoniale*:</label>
                                        <select name="statusm" id="statusm">
                                            <option value="">--Veuillez choisir une option--</option>
                                            <option value="marie">Marié(e)</option>
                                            <option value="celib">Célibataire</option>
                                        </select>
                                        <br>
                                <label for="mobile">Numéro de téléphone*</label>
                                <input type="tel" name="mobile" id="mobile" value="  /  /  /  /  " />
                                <br>
                                <label for="country">Nationalité</label>
                                <input type="text" name="country" id="country" />
                                <br>
                                <label for="city">Ville de résidence*</label>
                                <input type="text" name="city" id="city" />
                                <br>
                                <label  for="adress_1">Adresse actuelle*</label>
                                <input type="text" name="adress_1" id="adress_1"/>
                                <br>
                                <label for="profession">Situation professionnel</label>
                                <textarea type="text" name="profession" id="profession"></textarea>
                                <br>
                            </div> 
                        </div>
                        <label  for="messag" class="_100">Autres informations ou message à passer</label>
                        <textarea type="text" name="messag" id="messag" class="_100" ></textarea>
                    </h2>
                </fieldset>
            </form>
            <br>
            <form method="post">
                <fieldset>
                    <h2>Infos consernant la LIEEMA
                        <div id="container">
                            <div class="_100">
                                <label for="section">Section*:</label>
                                <select name="section" id="section">
                                    <option value="">--Veuillez choisir une option--</option>
                                    <option value="segou">Ségou ville</option>
                                    <option value="tominian">Tominian</option>
                                    <option value="san">San</option>
                                    <option value="markala">Markala</option>
                                </select>  
                            </div>
                        </div>
                        <div class="_100">
                            <p><label for="comite">Nom du comité *</label>
                            <input name="comite" id="comite" type="text" value="exemple:lycée technique de ségou"/></p>
                        </div>
                        <div class="_100">
                            <p><label for="dat">Date d'adhesion à la LIEEMA*</label>
                            <input  name="dat"id="dat" type="date"/></p>
                        </div>
                        <div class="_100">
                            <label for="occupee">Poste Occupée au sein de la LIEEMA*:</label>
                            <select name="occupee" id="occupee">
                                <option value="">--Veuillez choisir une option--</option>
                                <option value="sg">Sécretaire général </option>
                                <option value="tre">Trésorière</option>
                                <option value="com">Chargé à la communication</option>
                                <option value="sympa">Membre sympatisan</option>
                                <option value="autre">Autres</option>
                            </select>
                        </div>
                        <div class="_100">
                            <p><label for="comite">Nom du comité *</label><input name="" id="comite" type="text" value="exemple:lycée technique de ségou"/></p>
                        </div>
                        <div class="_50">
                            <p><label for="datedebut">Date de debut de la fonction*</label><input name="datedebut" id="datedebut" type="date"></p>
                        </div>
                        <div class="_50">
                            <p><label for="datefin">Date de fin de la fonction*</label><input name="datefin" id="datefin" type="date"></p>
                        </div>
                    </h2>
                </fieldset>    
            </form>
            <fieldset class="_100">
                <p>* Champs obligatoires <input type="submit" class="_50" value="Valider" name="boutton-valider"/></p>
            </fieldset>
        </form>
   </body>
</html>

