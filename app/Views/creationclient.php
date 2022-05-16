
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="<?php echo base_url(); ?>/assets/css/Formulaire.css">
    <title>Création du client</title>
</head>
<body>
<div class="form">
      <div class="title">Créer un client</div>
      <div class="input-container ic1">
        <input id="firstname" class="input" type="text" placeholder=" " />
        <div class="cut"></div>
        <label for="firstname" class="placeholder">Prénom</label>
      </div>
      <div class="input-container ic2">
        <input id="lastname" class="input" type="text" placeholder=" " />
        <div class="cut"></div>
        <label for="lastname" class="placeholder">Nom</label>
      </div>
      <div class="input-container ic2">
        <input id="ville" class="input" type="text" placeholder=" " />
        <div class="cut cut-short"></div>
        <label for="ville" class="placeholder">Ville</>
      </div>
      <button type="text" class="submit">Créer</button>
    </div>
    
</body>
</html>