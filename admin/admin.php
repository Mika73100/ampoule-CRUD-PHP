<?php

require_once '../outils/connexion.php';
require_once'../outils/fonction.php';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="icon" href="../img/logo-favicon.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <title>Dashbord</title>
</head>

<body>
    <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <main><br>&nbsp;
    <a href="../index.php?deco=out"><button class="btn btn-danger">Déconnexion</button></a>
        <div class="row">
            <section class="col-12">
                <table class="table">
                    <h1>Dashbord admin</h1>
                    <br>
                    <thead>
                        <th></th>
                        <th>Username</th>
                        <th>Mail</th>
                        <th>Portable</th>
                        <th>Nom</th>
                        <th>Prenom</th>

                        <th><a href="../affiche.php"><button class="btn btn-success">Dashboard</button></a>

                        
                    
                    </th>
                    </thead>
                <tbody>

                        <?php
                    $prepare =$pdo->prepare("SELECT id, username, mail, portable, nom, prenom  FROM users");
                    $prepare->execute();
                    $result = $prepare->fetchAll();
                    //print_r($result);
                        $compteur = 1;
                        foreach($result as $users) {
                        
                        ?>
                            <tr>
                                <td><?= $compteur ?></td>
                                <td><?= $users['username'] ?><br></td>
                                <td><?= $users['mail'] ?><br></td>
                                <td><?= $users['portable'] ?><br></td>
                                <td><?= $users['nom'] ?><br></td>  
                                <td><?= $users['prenom'] ?><br></td>                  
                                <td>
                                    <a href="formadmin.php?id=<?= $users['id'] ?>"><button class="btn btn-primary">Détails</button></a><br><br>

                                    <a class="btn btn-danger" href="supprimer.php?id=<?=$users['id']?>" role="button">Supprimer</a>

                                </tr>
                            <?php $compteur++;} ?>
                        </tbody>
                    </table>
                </section>
            </div>
        </main>
    </body>
</html>



<?php
    if (isset($_SESSION['supprimer']) && $_SESSION['supprimer'] == true) { ?>
        <script type="text/javascript">
            $(function() {
                toastr.success(' <b>Changement supprimer !</b>', 'supprimer', {
                    positionClass: "toast-top-full-width",
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-center",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "3000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                });
            });
        </script>
    <?php }
    $_SESSION['supprimer'] = false;
    ?>
    