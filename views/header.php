<?php 
ob_start();
session_start(); 
?>
<!DOCTYPE html>
<html lang="fr">
<head>


  <meta charset="utf-8">
  <title>AIRNES</title>

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="AIRNES">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="AIRNES">
  <meta name="generator" content="AIRNES">
  
  <link rel="shortcut icon" type="image/x-icon" href="views/images/favicon.png" />
  
  <link rel="stylesheet" href="views/plugins/themefisher-font/style.css">

  <link rel="stylesheet" href="views/plugins/bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" href="views/plugins/animate/animate.css">

  <link rel="stylesheet" href="views/plugins/slick/slick.css">
  <link rel="stylesheet" href="views/plugins/slick/slick-theme.css">

  <link rel="stylesheet" href="views/css/style.css">

</head>

<body id="body">

    <section class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-12 col-sm-4">
                </div>
                <div class="col-md-4 col-xs-12 col-sm-4">
                    <div class="logo text-center">
                        <a href="/">
                            <svg width="250px" height="29px" viewBox="0 0 155 29" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40"
                                    font-family="AustinBold, Austin" font-weight="bold">
                                    <g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
                                        <text id="AVIATO">
                                            <tspan x="108.94" y="325">AIRNES</tspan>
                                        </text>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-4">
                    <ul class="top-menu text-right list-inline">
                        <li class="dropdown cart-nav dropdown-slide">
                            <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
                                    class="tf-ion-android-cart"></i>Panier</a>
                            <div class="dropdown-menu cart-dropdown">
                                
                                <?php if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0): ?>
                                    <div class="media">
                                        <div class="media-body">
                                            <h4 class="media-heading text-center">Le panier est vide</h4>
                                        </div>
                                    </div>

                                    <div class="cart-summary">
                                        <span>Total</span>
                                        <span class="total-price">0.00€</span>
                                    </div>
                                    <ul class="text-center cart-buttons">
                                        <li><a href="/cart" class="btn btn-small">Voir panier</a></li>
                                    </ul>
    
                                <?php else: ?>
                                    <?php foreach($_SESSION['cart'] as $item): ?>
                                        <div class="media">
                                            <a class="pull-left" href="#!">
                                                <img class="media-object" src="<?= htmlspecialchars($item['image']) ?>" alt="image" />
                                            </a>
                                            <div class="media-body">
                                                <h4 class="media-heading"><a href=""><?= htmlspecialchars($item['title']) ?></a></h4>
                                                <div class="cart-price">
                                                    <span><?= htmlspecialchars($item['quantity']) ?> x</span>
                                                    <span><?= number_format($item['price'], 2) ?></span>
                                                </div>
                                                <h5><strong><?= number_format($item['quantity'] * $item['price'], 2) ?>€</strong></h5>
                                            </div>
                                            <a href="/cart-remove-item?id=<?= htmlspecialchars($item['id']) ?>"><i class="tf-ion-close"></i></a>
                                        </div>
                                    <?php endforeach; ?>
                                    <div class="cart-summary">
                                        <span>Total</span>
                                        <span class="total-price">₦<?php 
                                                $total = 0;
                                                foreach($_SESSION['cart'] as $item) {
                                                    $total += $item['price'] * $item['quantity'];
                                                }
                                                echo number_format($total, 2);
                                            ?>
                                        </span>
                                    </div>
                                    <ul class="text-center cart-buttons">
                                        <li><a href="/cart" class="btn btn-small" data-link>Voir panier</a></li>
                                    </ul>
                                <?php endif ?>
                            </div>

                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="menu">
        <nav class="navbar navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>

                <div id="navbar" class="navbar-collapse collapse text-center">
                    <ul class="nav navbar-nav">

                        <li class="dropdown ">
                            <a href="/" data-link>Accueil</a>
                        </li>


                        <li class="dropdown ">
                            <a href="/products" data-link>Produits</a>
                        </li>

                        <li class="dropdown ">
                            <a href="/about" data-link>A propos</a>
                        </li>

                        <?php if(isset($_SESSION['name'])): ?>
                            <li class="dropdown dropdown-slide">
                                <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
                                    role="button" aria-haspopup="true" aria-expanded="false"><?php echo htmlspecialchars($_SESSION['name']); ?><span
                                        class="tf-ion-ios-arrow-down"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/profile">Profil</a></li>
                                    <li><a href="/logout">Deconnexion</a></li>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li class="dropdown dropdown-slide">
                                <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
                                    role="button" aria-haspopup="true" aria-expanded="false">Compte <span
                                        class="tf-ion-ios-arrow-down"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/login">Se connecter</a></li>
                                    <li><a href="/register">S'enregistrer</a></li>
                                </ul>
                            </li>
                        <?php endif ?>

                    </ul>

                </div>
            </div>
    </section>

