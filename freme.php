<?php
// sans frameworks

$db = new PDO("mysql:host=localhost;dbname=test", "root", "");
$id = $_GET['id']; 
$query = $db->query("SELECT * FROM users WHERE id = $id");
$user = $query->fetch();
echo "Nom : " . $user['name'];










// solution manuelle 
$stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
$stmt->execute(['id' => $id]);























// framework (Laravel)
require_once __DIR__ . '/../models/plt.php';

public function show($id)
{
    $user = User::find($id);
    return view('user', ['user' => $user]);
}












?>