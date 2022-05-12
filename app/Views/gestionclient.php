<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>

<body>
    <h2 id="creationclient">Gestion des clients</h2>
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
                        echo "<tr><td>".$v['NOM']."</td><td>".$v['PRENOM']."</td><td>".$v['VILLE']."</td><td><button type='button' id='suppression'>Supprimer</button></td><td><button type='button' id='modification'>Modifier</button></td></tr>";
                    }
                    ?>
                </tbody>
                
            </table>
            </div>
        </div>
    </form>
</body>

</html>