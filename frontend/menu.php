<?php 
    //Connect db
    require_once "../backend/db-connect.php";

    $search = $_GET['search'] ?? '';

    if ($search === '') {
        $stmt = $db->prepare("SELECT * FROM foods ORDER BY id DESC");
        $stmt->execute();
    }
    else {
        $stmt = $db->prepare("SELECT * FROM foods WHERE name LIKE :keyword OR description LIKE :keyword ORDER BY id DESC");
        $stmt->execute([':keyword' => '%' . $search . '%']);
    }

    //load all/filtered items including description
    $foods = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main menu</title>
    <link rel="stylesheet" type="text/css" href="../css/menu.css">
    
    <!-- Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fascinate&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Quintessential&family=Schoolbell&display=swap" rel="stylesheet">
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap" rel="stylesheet">
</head>
<body>
    <header class="menu-header">
        <div class="menu-header-inner">
            <h1 class="menu-sign">Search Menu</h1>
            <p class="menu-subtitle">Find your favorite dishes ✨</p>
        </div>
    </header>
    <!-- Form -->
    <section class="menu-search">
        <form method="GET">
            <input type="text" name="search" placeholder="Search food..." value="<?= htmlspecialchars($search) ?>">
            <button type="submit">Search</button>
        </form>
    </section>

    <!-- Display Section -->
    <section class="menu-container-wrap">
    <section class="menu-container">
        <?php if (empty($foods)) {?>
            <p class="no-result">No results found.</p>
        <?php } 
        else {?>
            <?php foreach ($foods as $food) {?>
            <div class="menu-card food-card"
                data-id="<?= $food['id'] ?>"
                data-name="<?= htmlspecialchars($food['name']) ?>"
                data-price="<?= $food['price'] ?>"
                data-img="../img/<?= htmlspecialchars($food['image']) ?>"
                data-desc="<?= htmlspecialchars($food['description']) ?>">

                <img src="../img/<?= htmlspecialchars($food['image']) ?>" alt="<?= htmlspecialchars($food['name']) ?>">
                <div class="menu-info">
                    <h3><?= htmlspecialchars($food['name']) ?></h3>
                    <p class="desc"><?= htmlspecialchars($food['description']) ?></p>

                    <div class="menu-action">
                        <p class="price">$<?= htmlspecialchars($food['price']) ?></p>
                        <button class="add-btn">+</button>
                    </div>
                </div>
            </div>
            <?php } ?>
        <?php } ?>
    </section>
</section>
<!-- Food Modal -->
<div id="food-modal" class="modal">
  <div class="modal-content">
    <span class="close-modal">&times;</span>

    <img id="modal-img" alt="">
    <h2 id="modal-title"></h2>
    <p id="modal-desc"></p>

    <div class="qty-control">
      <button id="qty-minus">-</button>
      <span id="qty-count">1</span>
      <button id="qty-plus">+</button>
    </div>

    <button id="add-to-cart-btn">Add to Cart</button>
  </div>
</div>

<script src="menu.js"></script>

</body>
</html>