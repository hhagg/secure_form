<?php
session_start();
//cleaning input
function cleanInput($data){
    return htmlspecialchars(trim(stripslashes($data)));
}

// initialisation des variables
$lastName = $firstName = $phone = $email = $subject = $message = "";

// define variables & set to empty values
$errors= [];


// Validation des inputs
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $_SESSION = $_POST;
    if(!isset($_POST['firstName']) || trim($_POST['firstName'] === ''))
        $errors[]='firstName=1';

    if(!isset($_POST['lastName']) || trim($_POST['lastName'] === ''))
        $errors[]='lastName=1';

    if(!isset($_POST['phone']) || trim($_POST['phone'] === ''))
        $errors[] = 'phone=1';

    if(!isset($_POST['email']) 
        || trim ($_POST['email'] ==='') 
        || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        $errors[] ="email=1";
    
    if(!isset($_POST['subject']) 
        || trim($_POST['subject'] === '')
        || $_POST['subject'] === '--Please make a choice--')
        $errors[] ='subject=1';

    if(!isset($_POST['message']) || trim($_POST['message'] === ''))
        $errors[] = "message=1";

    if(!empty($errors)){
        //afin d'afficher plusieurs erreurs à la suite 
        $addToError = join('&', $errors);
        // redirection
        header("Location: index.php?" . $addToError);
    }  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
  <title>Success</title>
  <style>
    .text-center{
            color: #fff;
        }
  </style>
</head>
<body>
    <div class="container bg-success border rounded p-5 text-center">
        <p>Merci <?= $_POST['firstName'] ?> <?= $_POST['lastName'] ?> de nous avoir contacté à propos de <?= $_POST['subject'] ?>.
        Un de nos conseiller analysera votre demande à l’adresse <?= $_POST['email'] ?>
        ou par téléphone au <?= $_POST['phone'] ?> dans les plus brefs délais pour traiter votre demande :
        <?= $_POST['message'] ?></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


