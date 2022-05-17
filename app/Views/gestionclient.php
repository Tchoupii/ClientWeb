<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="<?php echo base_url(); ?>/assets/css/Tableau.css">
    <title>Gestion des clients </title>
</head>

<body>
    <h1 id="gestionclient">Gestion des clients</h1>
    <a href="<?php echo base_url('carte'); ?>"><h2 id="carte">Retour à la carte</h2></a>
        <div>
            <div class="tableau">
            <table class="table">
                <thead>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Ville</th>
                </thead>
                <tbody>
                    <?php
                    $db = model(ClientModel::class);
                    $data['clients'] = $db->findAll();
                    foreach ($data['clients'] as $v) {
                        echo "<tr>
                        <td>".$v['PRENOM']."</td>
                        <td>".$v['NOM']."</td>
                        <td>".$v['VILLE']."</td>"?> 
                        <form method="get">
                        <td><a href="<?php echo base_url('ClientController/supprimer/'.$v['ID_CLIENT'])?>">Supprimer</a></td>
                        <td><a href="<?php echo base_url('ClientController/modifier/'.$v['ID_CLIENT'])?>">Modifier</a></td>
                        </tr> 
                        </form>
                        <?php

                    }
                    ?>
                </tbody>
                
            </table>
            
            </div>
            <a href="<?php echo base_url('creationclient')?>"><h2 id="creationclient">Créer nouveau client </h2></a>
        </div>
    </form>
</body>

</html>