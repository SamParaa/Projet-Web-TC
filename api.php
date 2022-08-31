<?php
$dbh = new PDO('mysql:host=localhost;dbname=tc_projet_web', $root);
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
                 $pdo->prepare('INSERT INTO entreprise (id_entreprise,nom_entreprise,raison_sociale,adresse_entreprise,nbr_employes,dernier_contact,chiffre_affaires) VALUES (:id_entreprise,:nom_entreprise,:raison_sociale,:adresse_entreprise,:nbr_employes,:dernier_contact,:chiffre_affaires');
                $pdo->bindParam(':nom_entreprise', $_GET['nom_entreprise']);
                $pdo->bindParam(':raison_sociale', $_GET['raison_sociale']);
                $pdo->bindParam(':adresse_entreprise', $_GET['adresse_entreprise']);
                $pdo->bindParam(':nbr_employés', $_GET['nbr_employes']);
                $pdo->bindParam(':chiffre_affaires', $_GET['chiffre_affaires']);
                $pdo->bindParam(':dernier_contact', $_GET['dernier_contact']);
               $pdo->execute();
    break;
    case 'create_contact':
                 $pdo->prepare('INSERT INTO contact (id_contact,nom_contact,prenom_contact,date_naissance_contact,telephone_contact,email_contact,poste_contact) VALUES (:id_contact,:nom_contact,:prenom_contact,:date_naissance_contact,:telephone_contact,:email_contact,:poste_contact');
                $pdo->bindParam(':nom_contact', $_GET['nom_contact']);
                $pdo->bindParam(':prenom_contact', $_GET['prenom_contact']);
                $pdo->bindParam(':date_naissance_contact', $_GET['date_naissance_contact']);
                $pdo->bindParam(':telephone_contact', $_GET['telephone_contact']);
                $pdo->bindParam(':email_contact', $_GET['email_contact']);
                $pdo->bindParam(':poste_contact', $_GET['poste_contact']);
               $pdo->execute();
    break;
    case 'update_entreprise':
                 $pdo->prepare('UPDATE entreprise SET nom_entreprise = :nom_entreprise, raison_sociale = :raison_sociale, adresse_entreprise = :adresse_entreprise, nbr_employes = :nbr_employés, dernier_contact = :dernier_contact, chiffre_affaires = :chiffre_affaires WHERE id_entreprise = :id');
                $pdo->bindParam(':nom_entreprise', $_GET['nom_entreprise']);
                $pdo->bindParam(':raison_sociale', $_GET['raison_sociale']);
                $pdo->bindParam(':adresse_entreprise', $_GET['adresse_entreprise']);
                $pdo->bindParam(':nbr_employés', $_GET['nbr_employes']);
                $pdo->bindParam(':chiffre_affaires', $_GET['chiffre_affaires']);
                $pdo->bindParam(':dernier_contact', $_GET['dernier_contact']);
               $pdo->execute();
    break;
    case 'update_contact':
                 $pdo->prepare('UPDATE contact SET nom_contact = :nom_contact, prenom_contact = :prenom_contact, date_naissance_contact = :date_naissance_contact, telephone_contact = :telephone_contact, email_contact = :email_contact, poste_contact = :poste_contact WHERE id_contact = :id');
                $pdo->bindParam(':nom_contact', $_GET['nom_contact']);
                $pdo->bindParam(':prenom_contact', $_GET['prenom_contact']);
                $pdo->bindParam(':date_naissance_contact', $_GET['date_naissance_contact']);
                $pdo->bindParam(':telephone_contact', $_GET['telephone_contact']);
                $pdo->bindParam(':email_contact', $_GET['email_contact']);
                $pdo->bindParam(':poste_contact', $_GET['poste_contact']);
               $pdo->execute();
    break;}