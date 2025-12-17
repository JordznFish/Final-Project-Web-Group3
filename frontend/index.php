<?php
    require_once "../backend/db-connect.php";

    $stmt = $db->prepare("
        SELECT id, name, price, image, description
        FROM foods
    ");
    $stmt->execute();
    $foods = $stmt->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Animal Crossing Food Delivery</title>

        <!-- Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fascinate&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Quintessential&family=Schoolbell&display=swap" rel="stylesheet">
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap" rel="stylesheet">

        <!-- CSS -->
        <link rel="stylesheet" href="../css/global.css" />
        <!-- Team-specific CSS -->
        <link rel="stylesheet" href="../css/navbar.css" />       <!-- Patricia -->
        <link rel="stylesheet" href="../css/eric_header.css" />  <!-- Eric -->
        <link rel="stylesheet" href="../css/main.css" />         <!-- Jordan -->
        <link rel="stylesheet" href="../css/cart-footer.css" />  <!-- Steffani -->
    </head>

    <body>
        <div class="background-wrapper">
            <button id="menu-btn" class="menu-btn">&#9776;</button>
            <div id="sidebar-overlay" class="sidebar-overlay"></div>
            <nav id="navbar">
                <div class="logo">
                    <a href="#banner">
                        <img src="../img/compass1.png" alt="Logo" class="nav-icon"/>
                    </a>
                </div>
                <hr class="divider">
                <ul class="nav-links">
                    <li>
                        <a href="#main-content">
                            <img src="../img/menu_final.png" alt="Menu Icon" class="nav-icon"/>
                            <span class="tooltip">Menu</span>
                        </a>
                    </li>
                    <li>
                        <a href="#reviews">
                            <img src="../img/awards_final.png" alt="Awards Icon" class="nav-icon"/>
                            <span class="tooltip">Reviews</span>
                        </a>
                    </li>
                    <li>
                        <a href="#site-footer">
                            <img src="../img/contact_final.png" alt="Contact Icon" class="nav-icon"/>
                            <span class="tooltip">Contact</span>
                        </a>
                    </li>
                    <li>
                        <a href="cart.php" class="cart-link">
                            <img src="../img/cart_final.png" alt="Cart Icon" class="nav-icon"/>
                            <span id="cart-count" class="cart-count">0</span>
                            <span class="tooltip">Cart</span>
                        </a>

                    </li>
                    <li>
                        <a href="javascript:void(0);" id="newsletter-btn">
                            <img src="../img/newsletter_final.png" alt="Newsletter Icon" class="nav-icon"/>
                            <span class="tooltip">Newsletter</span>
                        </a>
                    </li>
                </ul>

                <div class="user-info">
                    <hr class="divider">
                    <a href="profile.html">
                        <img src="../img/user.png" alt="Profile Icon" class="nav-icon"/>
                        <span class="tooltip">Profile</span>
                    </a>
                    <a href="settings.html">
                        <img src="../img/settings_final.png" alt="Settings Icon" class="nav-icon"/>
                        <span class="tooltip">Settings</span>
                    </a>
                </div>
            </nav>

            <div class="sidebar-overlay"></div>

            <!-- Newsletter Modal -->
            <div id="newsletter" class="modal">
                <div class="modal-content">
                    <span class="modal-close">&times;</span>
                    <h2 class="w3-wide">NEWSLETTER</h2>
                    <p>Join our mailing list to receive updates on new arrivals and special offers.</p>
                    <p><input class="newsletter-input" type="text" placeholder="Enter e-mail"></p>
                    <button type="button" class="newsletter-subscribe">Subscribe</button>
                </div>
            </div>
    
            
            <!-- ===================== -->
            <!-- HEADER SECTION -->
            <!-- Owner: Eric -->
            <!-- Contains: Theme banner -->
            <!-- ===================== -->
                <!-- ===================== -->
            <!-- HEADER SECTION -->
            <!-- Owner: Eric -->
            <!-- Contains: Theme banner -->
            <!-- ===================== -->
            <div class="top-bar">
                <h1 class="bar-logo">Crossing Eats</h1>

                <div class="top-icons">
                    <a href="search.php" class="icon search">
                        <img src="../img/search-icon.png" alt="Search Icon" class="top-right-icon"/>
                    </a>
                    <a href="cart.php" class="icon cart">
                        <img src="../img/cart_final.png" alt="Cart Icon" class="top-right-icon"/>
                    </a>
                </div>
            </div>

            <header id="header-banner">
                <a href="#banner" style="text-decoration:none">
                    <div id="ac-logo-header">
                        <h1>CROSSING<span class="eats">EATS</span></h1>
                    </div>

                    <a href="javascript:void(0)" class="drop-down-icon" id="menu-toggle">&#9776;</a>
                </a>
                
            </header>

            <div id="banner"></div>
            <section class="banner">
                <img src="../img/banner.jpg" alt="Animal Crossing Banner">
            </section>

            <section class="brown-box">
                <div class="brown-image">
                    <img src="../img/feature-image.jpg" alt="Featured Food">
                </div>

                <div class="brown-info">
                    <div class="white-ac-box">
                        <h2 class="title">Your cravings are on the way!</h2>

                        <div class="delivery-row">
                            <div class="pill delivery-pill">
                                <span class="label">Estimated Delivery:</span>
                                <div class="time-row">
                                    <span class="time">09:00</span> to <span class="time">21:00</span>
                                </div>
                            </div>

                            <div class="pill fee-pill">
                                <span class="fee-label">Delivery Fee</span>
                                <span class="price">NT$ <strong>39</strong></span>
                                <span class="free-tag">FREE over NT$ 299</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!-- ===================== -->
            <!-- ANIMAL CROSSING Monthly Events -->
            <!-- Owner: Patricia -->
            <!-- Content: Event banner  -->
            <!-- ===================== -->
            <div class="event-banner">
                <h2 class="feature-title">November 11.11 Kids Feast!</h2>
                <p><span class="highlight"> Crossing's Eats Special:</span> Enjoy <span class="highlight">11% OFF</span> all kids meals this month! Let Isabelle, Tom Nook, and all your favorite Crossing friends 
                    <br> deliver smiles and tasty surprises straight to your island home!</p>
                <button class="learn-btn">
                    Learn More <span class="arrow">&rarr;</span></button>
            </div>
            
            <!-- ===================== -->
            <!-- MAIN CONTENT AREA -->
            <!-- Owner: Jordan -->
            <!-- Content: Category Nav + Food Menu Cards -->
            <!-- ===================== -->
            <div class="bush-banner"></div>
            <main id="main-content">
                <!-- Signboard and Category Buttons -->
                <section id="upper-menu">
                    <div id="menu-signboard">
                        <h2 id="current-category">Top Sellers</h2>
                    </div>
                </section>
                
                <!-- Food Menu Grid -->
                <section id="food-menu">
                    <div class="menu-grid">

                        <?php foreach ($foods as $food): ?>
                        <div class="food-card"
                                class="add-btn"
                                data-id="<?= $food['id'] ?>"
                                data-name="<?= htmlspecialchars($food['name']) ?>"
                                data-price="<?= $food['price'] ?>"
                                data-img="../img/<?= htmlspecialchars($food['image']) ?>"
                                data-desc="<?= htmlspecialchars($food['description']) ?>">

                            <img
                            src="../img/<?= htmlspecialchars($food['image']) ?>"
                            alt="<?= htmlspecialchars($food['name']) ?>"
                            />

                            <h3><?= htmlspecialchars($food['name']) ?></h3>

                            <p class="desc">
                            <?= htmlspecialchars($food['description']) ?>
                            </p>

                            <p class="price">NT$ <?= $food['price'] ?></p>

                            <button class="add-btn">+</button>

                        </div>
                        <?php endforeach; ?>

                    </div>
                </section>
                


     <!-- FOOD DETAIL MODAL -->
            <div id="food-modal" class="food-modal">
            <div class="food-modal-content">

                <span class="close-modal">&times;</span>

                <img id="modal-img" class="modal-img" alt="Food image">

                <div class="modal-body">
                <h2 id="modal-title"></h2>
                <p id="modal-desc"></p>

                <div class="modal-tabs">
                    <button class="tab active">Options</button>
                    <button class="tab">Details</button>
                </div>

                <textarea id="modal-note"
                    placeholder="Special notes (no onions, less spicy...)"></textarea>
                </div>

                <div class="modal-footer">
                <div class="modal-qty">
                    <button id="qty-minus">−</button>
                    <span id="qty-count">1</span>
                    <button id="qty-plus">+</button>
                </div>

                <button id="add-to-cart-btn">Add to Cart</button>
                </div>

                </div>
            </div>

                </section>
            </main>

              <!-- ===================== -->
            <!-- REVIEWS SECTION -->
            <!-- Owner: Steffani -->
            <!-- Content: Review section -->  
            <!-- ===================== -->
            <section id="reviews">
            <div class="review-title">Customers Love</div>

           <div class="review-container">
               
                <div class="review-card">
                    <img src="../img/avatar/Avatar1.jpg" alt="Customer 1">
                    <h3>Tom Nook</h3>
                    <div class="stars">★★★★☆</div>
                    <p>Amazing food and fast delivery! 🍕</p>
                    <small>June 4, 2025</small>
                </div>

                <div class="review-card">
                    <img src="../img/avatar/Avatar2.jpg" alt="Customer 2">
                    <h3>Isabelle, Town Mayor</h3>
                    <div class="stars">★★★★★</div>
                    <p>Best curry in the island! 🥘 I order every week.</p>
                    <small>August 18, 2025</small>
                </div>

                <div class="review-card">
                    <img src="../img/avatar/Avatar3.jpg" alt="Customer 3">
                    <h3>Alfonso</h3>
                    <div class="stars">★★★★☆</div>
                    <p>Loved the Sea-Bass Pie! Warm, tasty, and fun to share with friends!</p>
                    <small>Nov 6, 2025</small>

                </div>
            </div>
            </section>

            <!-- ===================== -->
            <!-- FOOTER -->
            <!-- Owner: Steffani -->
            <!-- Content: Our information  -->
            <!-- ===================== -->
            <footer id="site-footer"style="background-image: url('../img/background/footerzz.png');
              background-size: 100% 100%;
              background-position: center;
              background-repeat: no-repeat;
              text-align: center;
              position: relative;
              padding: 60px 20px;">

                    <h2>Thank you for visiting!</h2>
                    <p>Follow us on social media:</p>
        
                    <div class="social-links">
                    <a href="https://www.facebook.com" target="_blank">
                        <img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook" class="social-icon">
                    </a>
                    <a href="https://www.instagram.com" target="_blank">
                        <img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" alt="Instagram" class="social-icon">
                    </a>
                    <a href="https://www.twitter.com" target="_blank">
                        <img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" alt="Twitter" class="social-icon">
                    </a>
                    </div>

                    <p class="copyright">© 2025 CrossingEats. All rights reserved.</p>
                
                </footer>

        </div>

        <!-- Functions -->
        <script src="functions.js"></script>

        <!-- TEST BY JORDAN -->
    </body>
</html>