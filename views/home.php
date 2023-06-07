<?php
require __DIR__ . '/header.php';
require __DIR__ . '/db.php';

$produits = [];
$requete = $pdo->prepare("SELECT * FROM products ORDER BY RAND() LIMIT 9");
$requete->execute();
if ($requete->rowCount() > 0) {
    $produits = $requete->fetchAll(PDO::FETCH_ASSOC);
}
?>
<section class="products section bg-gray">
    <div class="container">
        <div class="row">
            <div class="title text-center">
                <h2>Nouveautés</h2>
            </div>
        </div>
        <div class="row">
            <?php if (isset($produits)) : ?>
                <?php foreach ($produits as $produit) : ?>
                    <div class="col-md-4">
                        <div class="product-item">
                            <div class="product-thumb">
                                <img class="img-responsive" src="<?= htmlspecialchars(unserialize($produit['images'])[0]) ?>" alt="<?= htmlspecialchars($produit['title']) ?>" />
                            </div>
                            <div class="product-content">
                                <h4><a href="/item?id=<?= htmlspecialchars($produit['id']) ?>"><?= htmlspecialchars($produit['title']) ?></a></h4>
                                <p class="price"><?= number_format($produit['price'], 2) ?> €</p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php require __DIR__ . '/footer.php'; ?>
