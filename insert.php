<?php

require_once "pdo.php";
if ( isset($_POST['name']) && isset($_POST['mobile'])
      && isset($_POST['email']) && isset($_POST['occupation'])) {
    $sql = "INSERT INTO participants (name, mobile, email, occupation)
               VALUES (:name, :mobile, :email, :occupation)";
    header("refresh:0; url=index.php");
    echo '<script>alert("You have register successfully.")</script>';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => $_POST['name'],
        ':mobile' => $_POST['mobile'],
        ':email' => $_POST['email'],
        ':occupation' => $_POST['occupation']));
}

$stmt = $pdo->query("SELECT name, mobile, email, occupation, p_id FROM participants");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


