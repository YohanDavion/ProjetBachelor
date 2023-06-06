<?php 

require __DIR__ . '/header.php';
require __DIR__ . '/db.php'; 

$statement = $pdo->prepare("SELECT * FROM about");
$statement->execute();
$about = $statement->fetchAll(PDO::FETCH_ASSOC);

$statement = $pdo->prepare("SELECT value FROM contact WHERE name=?");
$statement->execute(array('phone'));
$phone = $statement->fetchColumn();

$statement = $pdo->prepare("SELECT value FROM contact WHERE name=?");
$statement->execute(array('address'));
$address = $statement->fetchColumn();

$statement = $pdo->prepare("SELECT value FROM contact WHERE name=?");
$statement->execute(array('email'));
$email = $statement->fetchColumn();
?>
<section class="about section">
	<div class="container">
		<div class="row">
			<div class="col-md-6 mt-20">
				<img class="img-responsive" src="views/images/shop.jpg">
			</div>
			<div class="col-md-6">
				<h2>A propos</h2>
				<p><?= htmlspecialchars($about[0]['about']) ?></p>
			</div>
		</div>
		<div class="row mt-40">
            <div class="contact-details col-md-6 " >
                <ul class="contact-short-info" >
                    <li>
                        <i class="tf-ion-ios-home"></i>
                        <span><?= htmlspecialchars($address) ?></span>
                    </li>
                    <li>
                        <i class="tf-ion-android-phone-portrait"></i>
                        <span>Téléphone : <?= htmlspecialchars($phone) ?></span>
                    </li>
                    <li>
                        <i class="tf-ion-android-mail"></i>
                        <span>Email : <?= htmlspecialchars($email) ?></span>
                    </li>
                </ul>
            </div>
		</div>
	</div>
</section>
<?php require __DIR__ . '/footer.php'; ?>