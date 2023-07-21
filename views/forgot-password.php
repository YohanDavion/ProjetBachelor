<?php
if(!isset($_SESSION)){
  session_start();    
 }

require __DIR__ . '/db.php';
require __DIR__ . '/../csrf.php';
require __DIR__ . '/admin/util.php';
require __DIR__ . '/sendgrid-php/sendgrid-php.php';

if(isset($_SESSION['name'])) {
    header('Location: /');
}

$success;

if(isset($_POST['submit']) && CSRF::validateToken($_POST['token'])) {
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $code = rand(10000, 99999);
  $expirationTime = time() * 30 * 60;
  $statement = $pdo->prepare("SELECT * FROM users WHERE email=?");
  $statement->execute(array($email));
  if($statement->rowCount() > 0) {
    $statement = $pdo->prepare("UPDATE users SET code=?, expiration=? WHERE email=?");
    $statement->execute(array($code, $expirationTime, $email));
    $mail = new \SendGrid\Mail\Mail();
    $mail->setFrom("donotreply@em3819.tomiwa.com.ng", "Yem-Yem");
    $mail->setSubject("Password Reset");
    $mail->addTo($email, $email);
    $mail->addContent("text/plain", "Reset code: ". $code . "\n\nIf you didn't request for a password reset, ignore this message.");
    $sendgrid = new \SendGrid($key);
    try {
      $sendgrid->send($mail);
    } catch (Exception $e) {
      
    }
    header('Location: /reset?email='. $email);
  } else {
    $success = false;
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <title>Airnes | Reinitialiser mot de passe</title>


  <link rel="shortcut icon" type="image/x-icon" href="views/images/favicon.png" />
  <link rel="stylesheet" href="views/plugins/themefisher-font/style.css">
  <link rel="stylesheet" href="views/plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="views/plugins/animate/animate.css">
  <link rel="stylesheet" href="views/plugins/slick/slick.css">
  <link rel="stylesheet" href="views/plugins/slick/slick-theme.css">
  <link rel="stylesheet" href="views/css/style.css">

</head>

<body id="body">

<section class="forget-password-page account">
  <div class="container">
    <div class="row">
      <?php if(isset($success) && !$success): ?>
        <div class="alert alert-danger alert-common alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <i class="tf-ion-android-checkbox-outline"></i>Le compte n'existe pas
        </div>
      <?php endif ?>
      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">
          <form class="text-left clearfix" method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
            <p>Veuillez saisir l'adresse électronique de votre compte. Un code de réinitialisation vous sera envoyé.</p>
            <?php CSRF::csrfInputField() ?>
            <div class="form-group">
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Adresse e-mail du compte">
            </div>
            <div class="text-center">
              <button type="submit" name="submit" class="btn btn-main text-center">Demander la réinitialisation du mot de passe</button>
            </div>
          </form>
          <p class="mt-20"><a href="/login">Retour à la connexion</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

    <script src="views/plugins/jquery/dist/jquery.min.js"></script>

    <script src="views/plugins/bootstrap/js/bootstrap.min.js"></script>

    <script src="views/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>

    <script src="views/plugins/instafeed/instafeed.min.js"></script>

    <script src="views/plugins/ekko-lightbox/dist/ekko-lightbox.min.js"></script>

    <script src="views/plugins/syo-timer/build/jquery.syotimer.min.js"></script>

    <script src="views/plugins/slick/slick.min.js"></script>
    <script src="views/plugins/slick/slick-animation.min.js'"></script>

    <script src="views/js/script.js"></script>
    


  </body>
  </html>