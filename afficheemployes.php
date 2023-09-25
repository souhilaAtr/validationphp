<?php
include "header.php";
require "DB.php";


$employes = $statment->fetchAll();


?>
<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">nom</th>
                <th scope="col">prenom</th>
                <th scope="col">email</th>
                <th scope="col">mot de passe</th>
                <th scope="col">genre</th>
                <th scope="col">service</th>
                <th scope="col">date d'embauche</th>
                <th scope="col">salaire</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employes as $employe) {
                // var_dump($employe['nom']) 
            ?>
                <tr class="table-success">

                    <td><?= $employe['nom'] ?></td>
                    <td><?= $employe['prenom'] ?></td>
                    <td><?= $employe['email'] ?></td>
                    <td><?= $employe['password'] ?></td>
                    <td><?= $employe['genre'] ?></td>
                    <td><?= $employe['service'] ?></td>
                    <td><?= $employe['date_embauche'] ?></td>
                    <td><?= $employe['salaire'] ?></td>

                </tr>
            <?php    } ?>
        </tbody>
    </table>
</div>
<?php include "footer.php"; ?>
