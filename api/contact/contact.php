<?php
// db donncetion
$server = "localhost";
$username = "root";
$password = "";
$db = "stock";
$dbh = new PDO('mysql:host=localhost;dbname=tc_projet_web', $username,$password);


$request_method = $_SERVER["REQUEST_METHOD"];

function getContacts()
{
	global $dbh;
	$pdo = $dbh;
	$query = "SELECT * FROM contact";
	$req = $pdo->prepare($query);
	$req->execute();

	$data = $req->fetchAll(PDO::FETCH_ASSOC);

	header('Content-Type: application/json');
	echo json_encode($data, JSON_PRETTY_PRINT);
}

function getContact($id = 0)
{
	global $dbh;
	$pdo = $dbh;

	$sql =  "SELECT * FROM produit where id = :id_contact";

	$req = $pdo->prepare($sql);
	$req->bindParam(':id_contact', $id);
	$req->execute();

	$data = $req->fetchAll(PDO::FETCH_ASSOC);
	$req->closeCursor();

	header('Content-Type: application/json');
	echo json_encode($data, JSON_PRETTY_PRINT);
}

function AddContact()
{
	global $dbh;

	$name = $_POST["name"];
	$first_name = $_POST["first_name"];
	$birth_date = date('Y-m-d H:i:s');
	$phone_number = $_POST["phone_number"];
	$email = $_POST["email"];
	$job = $_POST["job"];


	$statement = $dbh->prepare('INSERT INTO contact (id_contact,nom_contact,prenom_contact,date_naissance_contact,telephone_contact,email_contact,poste_contact) VALUES (:id_contact,:nom_contact,:prenom_contact,:date_naissance_contact,:telephone_contact,:email_contact,:poste_contact');
	$statement->bindParam(':nom_contact', $name);
	$statement->bindParam(':prenom_contact', $first_name);
	$statement->bindParam(':date_naissance_contact', $birth_date);
	$statement->bindParam(':telephone_contact', $phone_number);
	$statement->bindParam(':email_contact', $email);
	$statement->bindParam(':poste_contact', $job);

	$res = $statement->execute();


	header('Content-Type: application/json');
	echo json_encode($res);
}

function updateContact($id)
{
	global $dbh;
	$pdo = $dbh;

	$name = $_POST["name"];
	$first_name = $_POST["first_name"];
	$birth_date = date('Y-m-d H:i:s');
	$phone_number = $_POST["phone_number"];
	$email = $_POST["email"];
	$job = $_POST["job"];

	$statement = $pdo->prepare('UPDATE contact SET nom_contact = :nom_contact, prenom_contact = :prenom_contact, date_naissance_contact = :date_naissance_contact, telephone_contact = :telephone_contact, email_contact = :email_contact, poste_contact = :poste_contact WHERE id_contact = :id');
	$statement->bindParam(':nom_contact', $name);
	$statement->bindParam(':prenom_contact', $first_name);
	$statement->bindParam(':date_naissance_contact', $birth_date);
	$statement->bindParam(':telephone_contact', $phone_number);
	$statement->bindParam(':email_contact', $email);
	$statement->bindParam(':poste_contact', $job);
	$response = $statement->execute();

	header('Content-Type: application/json');
	echo json_encode($response);
}

function deleteContact($id)
{
	global $dbh;
	$pdo = $dbh;

	$sql = "DELETE FROM `CONTACT` WHERE ID = :ID";

	$req = $pdo->prepare($sql);
	$req->bindParam(':ID', $id);
	$response = $req->execute();

	$req->closeCursor();
	header('Content-Type: application/json');
	echo json_encode($response);
}

switch ($request_method) {

	case 'GET':
		// Retrive Contacts
		if (!empty($_GET["id"])) {
			$id = intval($_GET["id"]);
			getContact($id);
		} else {
			getContacts();
		}
		break;
	default:
		// Invalid Request Method
		header("HTTP/1.0 405 Method Not Allowed");
		break;

	case 'POST':
		// Ajouter un produit
		AddContact();
		break;

	case 'PUT':
		// Modifier un produit
		$id = intval($_GET["id"]);
		updateContact($id);
		break;

	case 'DELETE':
		// Supprimer un produit
		$id = intval($_GET["id"]);
		deleteContact($id);
		break;
}
?>