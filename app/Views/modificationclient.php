<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Modification du client</title>
</head>

<body>
    <form action="<?php echo base_url('ClientController/update'); ?>" method="post">
        <div class="form">
            <div class="title">Modifier un client</div>
            <input hidden id="id" class="input" type="text" value="<?php echo $id ?>" />
            <div class="input-container ic1">
                <input id="firstname" class="input" type="text" value="<?php echo $nom ?>" />
                <div class="cut"></div>
                <label for="firstname" class="placeholder">Prénom</label>
            </div>
            <div class="input-container ic2">
                <input id="lastname" class="input" type="text" value="<?php echo $prenom ?>" />
                <div class="cut"></div>
                <label for="lastname" class="placeholder">Nom</label>
            </div>
            <div class="input-container ic2">
                <input id="ville" class="input" type="text" value="<?php echo $ville ?>" />
                <div class="cut cut-short"></div>
                <label for="ville" class="placeholder">Ville</>
            </div>
            <button type="text" class="submit">Modifier</button>
        </div>
    </form>


</body>

</html>