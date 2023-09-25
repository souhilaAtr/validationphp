<?php
include "fonction.php";
//strip tag   //htmlentities
//
if (isset($_POST['send'])) {

    // validation 
    $nom = strip_tags($_POST['nom']);
    $prenom = htmlentities($_POST['prenom']);
    $email = strip_tags($_POST['email']);
    $password = $_POST['password'];
    $error = null;
    $errornom = null;
    $salaire = $_POST['salaire'];
    if (empty($nom)) {
        $error =  '<li>Veuillez remplir le champs nom</li>';
        $errornom =  'Veuillez remplir le champs nom';
    } elseif (strlen($nom) < 2 || strlen($nom) > 15) {
        $error .= '<li>longueur du nom est invalide (entre 2 et 15)</li>';
        $errornom =  'longueur du nom est invalide (entre 2 et 15)';
    }

    // le nom est entre 2 et 15 caracteres strlen 

    //prenom
    // le nom est entre 2 et 15 caracteres 
    if (empty($prenom)) {
        $error .= '<li>Veuillez remplir le champs prenom</li>';
    } elseif (strlen($prenom) < 2 || strlen($prenom > 15)) {
        $error .= '<li>longueur du prenom est invalide (entre 2 et 15)</li>';
    }

    //email


    if (empty($email)) {
        $error .= '<li>Veuillez remplir le champs email</li>';
    } elseif (!preg_match(" /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ ", $email)) {
        $error .= "<li>l'email n'est pas valide</li>";
    } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $error .= "<li>l'email n'est pas valide</li>";
    }

    // if (!preg_match(" /^(\d\d){4}(\d\d)$/ ", $_POST['genre'])) {
    //     $error .= "<li>le numero de telephone n'est pas valide</li> ";
    // }
    //password
    if (empty($password)) {
        $error .= '<li>Veuillez remplir le champs mot de passe</li>';
    }

    if (!valideDate(convertirstrtotime($_POST['jobdate']))) {
        $error .= "<li>la date n'est pas valide</li>";
    }

    if(empty($salaire)){

        $error .= "<li>Veuillez remplir le champs salaire</li>";
    }elseif(is_numeric($salaire) === false){
       $error .= "<li>le salaire doit etre un chiffre</li>"; 
    }
    // var_dump($nom, $prenom);
    // ajouter un select selection dans le formulaire avec les options  informatique  maths et physique  
    // afficher l'option choisie


    // sting@string.stri   //  " /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ "
    // 00 00 00 00 00   // /^(\d\d\s){4}(\d\d)$/    ^\d{10}$   10 chiffres consécutifs  ^\d{2}\s\d{2}\s\d{2}\s\d{2}\s\d{2}$


    // 00000    76200  /^[0-9]{5,5}$/ 



    // utiliser bootswatch
    // creer un dossier entreprise (index header(navbar)  footer) index=> formulaire d'inscription ( les champs de la table employes )
    // ajouter 2 champs email et password (obligatoire)
    //email valide
    // nom prenom date salaire obligatoire 
    // salaire est numrique
    // date valide 
    // le mon et prenom max 20 caracteres

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/minty/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>

    <?php include "header.php" ?>
    <div class="container">



        <form action="" method="post">





            <div class="form-group">
                <label for="exampleInputEmail1" class="form-label mt-4">nom :</label>
                <input type="text" class="form-control" placeholder="nom" name="nom">



            </div>
            <p class="text-danger"><?php if (!empty($errornom)) {
                                        echo $errornom;
                                    } ?> </p>




            <div class="form-group">
                <label for="exampleInputEmail1" class="form-label mt-4">prenom :</label>
                <input type="text" class="form-control" placeholder="prenom" name="prenom">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" class="form-label mt-4">Email :</label>
                <input type="text" class="form-control" placeholder="email" name="email">

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1" class="form-label mt-4">mot de passe: </label>
                <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off" name="votre numero de telephone">
            </div>


            <fieldset class="form-group">
                <legend class="mt-4">Genre:</legend>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="genre" id="optionsRadios1" value="option1" checked="">
                    <label class="form-check-label" for="optionsRadios1">
                        Homme
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="genre" id="optionsRadios2" value="option2">
                    <label class="form-check-label" for="optionsRadios2">
                        Femme
                    </label>
                </div>

            </fieldset>

            <div class="form-group">
                <label for="exampleInputPassword1" class="form-label mt-4">date de d'embauche : </label>
                <input type="text" class="form-control" placeholder="date d'embauche" autocomplete="off" name="jobdate">
            </div>

            <!--
            <div class="form-group">
                <label for="exampleInputPassword1" class="form-label mt-4">Mobile: </label>
                <input type="tel" class="form-control" placeholder="mobile" autocomplete="off" name="num">
            </div> -->
            <div class="form-group">
                <label for="exampleSelect1" class="form-label mt-4">service : </label>
                <select class="form-select" name="selection">
                    <option>commercial</option>
                    <option>informatique</option>
                    <option>production</option>
                    <option>direction</option>
                    <option>secretariat</option>
                    <option>juridique</option>
                    <option>comptabilite</option>

                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" class="form-label mt-4">salaire :</label>
                <input type="number" class="form-control" placeholder="salaire" name="salaire">



            </div>


            <button class="btn btn-lg btn-primary" type="submit" name="send">Envoyer</button>

        </form>
        <a href="index.php"> retour </a>
        <?php if (!empty($error)) { ?>
            <div class="alert alert-dismissible alert-warning">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <h4 class="alert-heading">Erreurs:</h4>
                <p class="mb-0">
                <?php
                echo $error;
            } ?></p>
            </div>


    </div>

    <?php
    separation();

    include "footer.php"  ?>

</body>

</html>