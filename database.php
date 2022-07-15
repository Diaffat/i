<?php
  $host = 'localhost';
  $dbname = 'form';
  $username = 'root';
  $password = '';
    
  $dsn = "mysql:host=$host;dbname=$dbname"; 
  // récupérer tous les utilisateurs
  $sql = "SELECT * FROM contact";
  $sql2 = "SELECT * FROM infopersomembres";
   
  try{
   $pdo = new PDO($dsn, $username, $password);
   $stmt = $pdo->query($sql);
   $stm = $pdo->query($sql2);
   if($stm === false){
    die("Erreur");
   }

   
   if($stmt === false){
    die("Erreur");
   }
   
  }catch (PDOException $e){
    echo $e->getMessage();
  }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BASE DE DONNEES</title>
    <link rel="stylesheet" href="Formulaire\styles.css">
</head>
<body>
    <form class="_50">
        <h2 class="_100">Liste des utilisateurs(ceux qui ont un message à passer)</h2>
        <table>
            <thead>
                <tr>
                <th>ID</th>
                <th>Nom Complet</th>
                <th>MESSAGES</th>
                <th>DATE D'ENVOI</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                <tr>
                <td><?php echo htmlspecialchars($row['ID']); ?></td>
                <td><?php echo htmlspecialchars($row['Nom_complet']); ?></td>
                <br>
                <td><?php echo htmlspecialchars($row['MESSAGES']); ?></td>
                <td><?php echo htmlspecialchars($row['DATE_ENVOI']); ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </form>
    <form class="_50">
        <h2 class="_150">Liste des militants(ceux enregistrés)</h2>
        <table>
            <thead>
                <tr>
                <th>ID</th>
                <th>GENRE</th>
                <th>NOM</th>
                <th>PRENOM</th>
                <th>EMAIL</th>
                <th>MOT DE PASSE</th>
                <th>SITUATION MATRIMONIALE</th>
                <th>TEL</th>
                <th>NATIONALITE</th>
                <th>VILLE ACTUELLE</th>
                <th>PROFESSION</th>
                <th>ADRESSE</th>
                <th>MESSAGES</th>
                <th>SECTION</th>
                <th>COMITE</th>
                <th>ADHESION</th>
                <th>POSTE_OCCUPEE</th>
                <th>DATE_DEBUT</th>
                <th>DATE FIN</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $stm->fetch(PDO::FETCH_ASSOC)) : ?>
                <tr>
                <td><?php echo htmlspecialchars($row['ID']); ?></td>
                <td><?php echo htmlspecialchars($row['GENRE']); ?></td>
                <td><?php echo htmlspecialchars($row['NOM']); ?></td>
                <td><?php echo htmlspecialchars($row['PRENOM']); ?></td>
                <td><?php echo htmlspecialchars($row['EMAIL']); ?></td>
                <td><?php echo htmlspecialchars($row['MOT_DE_PASSE']); ?></td>
                <td><?php echo htmlspecialchars($row['SITUATION_M']); ?></td>
                <td><?php echo htmlspecialchars($row['TEL']); ?></td>
                <td><?php echo htmlspecialchars($row['NATIONALITE']); ?></td>
                <td><?php echo htmlspecialchars($row['VILLE_ACTU']); ?></td>
                <td><?php echo htmlspecialchars($row['PROFESSION']); ?></td>
                <td><?php echo htmlspecialchars($row['ADRESSE']); ?></td>
                <td><?php echo htmlspecialchars($row['MESSAGE']); ?></td>
                <td><?php echo htmlspecialchars($row['SECTION']); ?></td>
                <td><?php echo htmlspecialchars($row['COMITE']); ?></td>
                <td><?php echo htmlspecialchars($row['ADHESION']); ?></td>
                <td><?php echo htmlspecialchars($row['POSTE_OCCUPEE']); ?></td>

                <br>
                <td><?php echo htmlspecialchars($row['DATE_DEBUT']); ?></td>
                <td><?php echo htmlspecialchars($row['DATE_FIN']); ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </form>
</body>
</html>