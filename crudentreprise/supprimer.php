<?php
include "../fonction.php";
include "../header.php";
require "../DB.php";


if (!empty($_GET)) {
    $query = $pdo->prepare("DELETE FROM employes where id_employes = :id");
    $query->execute([
        "id" => $_GET['id_employes']
    ]);
    echo "<div>suppression avec succes</div>";
}


?>
<a href="/validation/afficheemployes.php" class="text-secondary"> retour a la page des employes</a>