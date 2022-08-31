$pdo = new PDO(connexion bdd) 
switch($_GET['service']){
      case 'delete_contact': 
                $pdo->prepare('delete * from contact where id = :id_contact');
                $pdo->bindParam(':id_contact', $_GET['id_contact']);
               $pdo->execute();
    break;
    case 'delete_entreprise': 
                $pdo->prepare('delete * from  entreprise where id = :id_entreprise');
                $pdo->bindParam(':id_entreprise', $_GET['id_entreprise']);
               $pdo->execute();
    break;
   case 'create_entreprise':
                 $pdo->prepare('INSERT INTO entreprise ( nom,relation,adresse,etc) VALUES (:nom,:relation');
                $pdo->bindParam(':nom_entreprise', $_GET['nom_entreprise']);
                $pdo->bindParam(':relation', $_GET['relation']);
               $pdo->execute();ggggggggggggggggggggggggggggg