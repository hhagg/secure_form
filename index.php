<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de contact</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <style>
        span{
            color:red;
        }
    </style>
</head>
<body>
    <form  action="form.php"  method="post" class="container bg-light border rounded p-5">
        <h1 class="text-center">Contact</h1>
        <!-- LASTNAME -->
        <div class="row">
            <label  for="lastName" class="form-label">Nom :</label>
            <input  
                type="text"  
                id="lastName" 
                class="form-control" 
                name="lastName"
                value="<?= $_SESSION["lastName"] ?? ''?>">
            <?php if(isset($_GET["lastName"])) : ?>
                <span>Your lastname is required</span>
            <?php endif; ?>
        </div>
        <!-- FIRSTNAME -->
        <div class="row">
            <label  for="firstName" class="form-label">Prénom :</label>
            <input  
                type="text"  
                id="firstName" 
                class="form-control" 
                name="firstName"
                value="<?= $_SESSION["firstName"] ?? ''?>">
            <?php if(isset($_GET["firstName"])) : ?>
                <span>your firstname is required</span>
            <?php endif; ?>
        </div>
        <!-- PHONE -->
        <div class="row">
            <label  for="phone" class="form-label">Téléphone :</label>
            <input  
                type="text"  
                id="phone" 
                class="form-control" 
                name="phone" 
                placeholder="xx-xx-xx-xx-xx"
                pattern="^(\+33|0)[1-9][0-9]{8}"
                value="<?= $_SESSION["phone"] ?? ''?>">
            <?php if(isset($_GET["phone"])) : ?>
                <span>Phone number required</span>
            <?php endif; ?>
        </div>
        <!-- PHONE -->
        <div class="row">
            <label  for="email" class="form-label"> Entrer votre email :</label>
            <input  
                type="email"  
                id="email" 
                class="form-control" 
                name="email" 
                placeholder="exemple@domain.com"
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                value="<?= $_SESSION["email"] ?? ''?>">
            <?php if(isset($_GET["email"])) : ?>
                <span>Email required</span>
            <?php endif; ?>
        </div>
        <!-- SUBJECT -->
        <div class="row">
            <label  for="subject" class="form-label"> Entrer votre subject :</label>
            <select name="subject" id="subject">
                <option>--Please make a choice--</option>
                <option
                    <?php if (isset($_SESSION["subject"])
                        && $_SESSION["subject"] == "option A") : ?>
                        selected
                    <?php endif; ?> 
                    value="option A">option A</option>
                <option 
                    <?php if (isset($_SESSION["subject"]) 
                        && $_SESSION["subject"] == "option B") : ?>
                        selected
                    <?php endif; ?>
                    value="option B">option B</option>
                <option
                    <?php if (isset($_SESSION["subject"]) 
                        && $_SESSION["subject"] == "option C") : ?>
                        selected
                    <?php endif; ?>
                    value="option C">option C</option>
            </select>
            <?php if(isset($_GET["subject"])) : ?>
                <span>subject required</span>
            <?php endif; ?>
        </div>
        <!-- MESSAGE -->
        <div class="row">
            <label  for="message" class="form-label">Message :</label>
            <textarea  
                id="message" 
                class="form-control"
                name="message" 
                placeholder="Message ...">
            </textarea>
            <?php if(isset($_GET["message"])) : ?>
                <span>Please explain your request</span>
            <?php endif; ?>
        </div>
        <div class="row">
            <input  type="submit" class="btn btn-primary" value="Send your message"/>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>