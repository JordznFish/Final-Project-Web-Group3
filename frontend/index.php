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
        <link rel="stylesheet" href="../css/header.css" />       <!-- Eric -->
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
            <header id="header-banner">
                <a href="#banner" style="text-decoration:none">
                    <div id="ac-logo-header">
                        <h1>Crossing <span class="eats">Eats</span></h1>
                    </div>

                    <a href="javascript:void(0)" class="drop-down-icon" id="menu-toggle">&#9776;</a>
                </a>
                
            </header>

            <div id="banner"></div>
            <section class="banner">
                <img src="../img/banner.jpg" alt="Animal Crossing Banner">
            </section>

            <div class="ac-logo">
                <h1>Crossing <span class="eats">Eats</span></h1>
            </div>

            <section class="brown-box">
                <div class="left-col">
                    <h2 class="title">Food Made With Love!</h2>

                    <div class="delivery-row">
                        <div class="pill delivery-pill">
                            <span class="label">Estimated Delivery:</span>
                            <span class="time">09:00</span> to <span class="time">21:00</span>
                        </div>

                        <div class="pill fee-pill">
                            
                            <span class="fee-label">Delivery Fee</span>
                            <span class="price">NT$  <strong>39</strong></span>
                            <span class="free-tag">FREE over NT$ 299</span>
                        </div>
                    </div>
                </div>

                <div class="right-col promo">
                    <a href="cart.php" class="ribbon">Click me to bring the 'NOM' to your home!
                        <span class="ribbon-sub">Order now and enjoy island-fresh flavor anytime 🌴</span>
                    </a>

                    <img src="../img/happy.png" alt="Mascot" class="character">
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
                        <h2 id="current-category">Top Menu</h2>
                    </div>
                </section>
                
                <!-- Food Menu Grid -->
                <section id="food-menu">
                    <div class="menu-grid">
                        <!-- Food Card Items-->
                        <div class="food-card main-dish">
                            <img src="../img/Tomato_Curry.jpg" alt="Tomato Curry"/>
                            <h3>Tomato Curry Rice</h3>
                            <p class="desc">A hearty curry simmered with fresh tomatoes and a touch of island spice.</p>
                            <p class="price">NT$ 139</p>
                            <button class="add-btn"
                            data-name= "Tomato Curry Rice"
                            data-price="NT$ 139"
                            data-img="../img/Tomato_Curry.jpg"
                            data-desc="A hearty curry simmered with fresh tomateos and a touch of island spice">+</button>
                        </div>
                        
                        <div class="food-card main-dish">
                            <img src="../img/sea-bass-pie.jpg" alt="Sea-Bass Pie" />
                            <h3>Sea-Bass Pie</h3>
                            <p class="desc">Flaky crust stuffed with tender sea bass and creamy filling — a seaside comfort favorite.</p>
                            <p class="price">NT$ 199</p>
                            <button class="add-btn"
                            data-name="Sea-Bass Pie"
                            data-price="NT$ 199"
                            data-img="../img/sea-bass-pie.jpg"
                            data-desc="Flaky crust stuffed with tender sea bass and creamy filling">+</button>
                        </div>
                        
                        <div class="food-card main-dish">
                            <img src="../img/minestrone soup.jpg" alt="Minestrone Soup" />
                            <h3>Minestrone Soup</h3>
                            <p class="desc">A colorful vegetable soup bursting with warmth, perfect for a cozy evening.</p>
                            <p class="price">NT$ 119</p>
                            <button class="add-btn"
                            data-name="Minestrone Soup"
                            data-price="NT$ 119"
                            data-img="../img/minestrone soup.jpg"
                            data-desc="A colorful vegetable soup bursting with warmth, perfect for a cozy evening">+</button>
                        </div>
                        
                        <div class="food-card main-dish">
                            <img src="../img/aji fry.jpg" alt="Aji Fry" />
                            <h3>Aji Fry teishoku</h3>
                            <p class="desc">Golden-fried horse mackerel paired with fluffy rice, miso soup, and crisp seasonal greens.</p>
                            <p class="price">NT$ 199</p>
                            <button class="add-btn"
                            data-name="Aji Fry"
                            data-price="NT$ 199"
                            data-img="../img/aji fry.jpg"
                            data-desc="Golden-fried horse mackerel paired with fluffy rice, miso soup, and crisp seasonal greens">+</button>
                        </div>

                        <div class="food-card snacks">
                            <img src="../img/french-fries.jpg" alt="French Fries" />
                            <h3>French Fries</h3>
                            <p class="desc">Crispy, golden fries with just the right amount of salt — everyone’s favorite bite.</p>
                            <p class="price">NT$ 89</p>
                            <button class="add-btn"
                            data-name="French Fries"
                            data-price="NT$ 89"
                            data-img="../img/french-fries.jpg"
                            data-desc="Crispy, golden fries with just with the right amount of salt">+</button>
                        </div>

                        <div class="food-card snacks">
                            <img src="../img/sandwich.jpg" alt="Sandwich" />
                            <h3>Sandwich</h3>
                            <p class="desc">Freshly made with soft bread, crisp veggies, and a generous layer of filling.</p>
                            <p class="price">NT$ 129</p>
                            <button class="add-btn"
                             data-name="Sandwich"
                            data-price="NT$ 129"
                            data-img="../img/sandwich.jpg"
                            data-desc="Freshly made with soft bread, crisp veggies, and a generous layer of filling">+</button>
                        </div>

                        <div class="food-card snacks">
                            <img src="../img/potato croquettes.jpg" alt="Potato Croquettes" />
                            <h3>Potato Croquettes</h3>
                            <p class="desc">Crunchy on the outside, fluffy inside — a classic comfort snack.</p>
                            <p class="price">NT$ 99</p>
                            <button class="add-btn"
                            data-name="Sandwich"
                            data-price="NT$ 129"
                            data-img="../img/potato croquettes.jpg"
                            data-desc="Freshly made with soft bread, crisp veggies, and a generous layer of filling">+</button>
                        </div>

                        <div class="food-card desserts">
                            <img src="../img/carrot-cake.jpg" alt="Carrot Cake" />
                            <h3>Carrot Cake</h3>
                            <p class="desc">Sweet and moist cake with grated carrots and a touch of cinnamon.</p>
                            <p class="price">NT$ 149</p>
                            <button class="add-btn"
                            data-name="Carrot Cake"
                            data-price="NT$ 149"
                            data-img="../img/carrot-cake.jpg"
                            data-desc="Sweet and moist cake with grated carrots and a touch of cinnamon">+</button>
                        </div>

                        <div class="food-card desserts">
                            <img src="../img/apple-pie.jpg" alt="Apple Pie" />
                            <h3>Apple Pie</h3>
                            <p class="desc">Buttery crust filled with caramelized apples — a timeless homemade dessert.</p>
                            <p class="price">NT$ 139</p>
                            <button class="add-btn"
                            data-name="Apple Pie"
                            data-price="NT$ 139"
                            data-img="../img/apple-pie.jpg"
                            data-desc="Buttery crust filled with caramelized apples">+</button>
                        </div>

                        <div class="food-card desserts">
                            <img src="../img/fruit-tart.jpg" alt="Fruit Tart" />
                            <h3>Fruit Tart</h3>
                            <p class="desc">A colorful medley of fruits over smooth custard — as cheerful as it is delicious.</p>
                            <p class="price">NT$ 99</p>
                            <button class="add-btn"
                            data-name="Fruit Tart"
                            data-price="NT$ 99"
                            data-img="../img/fruit-tart.jpg"
                            data-desc="A colorful medley of fruits over smooth custard">+</button>
                        </div>

                        <div class="food-card soups">
                            <img src="../img/mushroom-soup.jpg" alt="Mushroom Soup" />
                            <h3>Mushroom Soup</h3>
                            <p class="desc">Earthy, creamy, and aromatic — a bowl of pure woodland comfort.</p>
                            <p class="price">NT$ 49</p>
                            <button class="add-btn"
                            data-name="Mushroom Soup"
                            data-price="NT$ 49"
                            data-img="../img/mushroom-soup.jpg"
                            data-desc="Earthy, creamy, and aromatic">+</button>
                        </div>

                        <div class="food-card soups">
                            <img src="../img/carrot-pottage.jpg" alt="Carrot Potage" />
                            <h3>Carrot Potage</h3>
                            <p class="desc">Smooth, sweet carrot soup that feels like a warm hug on a cool day.</p>
                            <p class="price">NT$ 49</p>
                            <button class="add-btn"
                            data-name="Carrot Potage"
                            data-price="NT$ 49"
                            data-img="../img/carrot-pottage.jpg"
                            data-desc="Smooth, sweet carrot soup that feels like a warm hug on a cool day">+</button>
                        </div>

                        <div class="food-card beverages">
                            <img src="../img/strawberry-smoothie.jpg" alt="Strawberry Smoothie" />
                            <h3>Strawberry Smoothie</h3>
                            <p class="desc">A refreshing blend of ripe strawberries and creamy milk.</p>
                            <p class="price">NT$ 79</p>
                            <button class="add-btn"
                            data-name="Strawberry Smoothie"
                            data-price="NT$ 79"
                            data-img="../img/strawberry-smoothie.jpg"
                            data-desc="A refreshing blend of ripe strawberries and creamy milk">+</button>
                        </div>

                        <div class="food-card beverages">
                            <img src="../img/banana-smoothie.jpg" alt="Banana Smoothie" />
                            <h3>Banana Smoothie</h3>
                            <p class="desc">Thick, creamy, and naturally sweet — an all-time classic.</p>
                            <p class="price">NT$ 79</p>
                            <button class="add-btn"
                            data-name="Banana Smoothie"
                            data-price="NT$ 79"
                            data-img="../img/banana-smoothie.jpg"
                            data-desc="Thick, creamy, and naturally sweet">+</button>
                        </div>

                        <div class="food-card beverages">
                            <img src="../img/mango-smoothie.jpg" alt="Mango Smoothie" />
                            <h3>Mango Smoothie</h3>
                            <p class="desc">Rich, velvety mango blended to perfection — a sweet tropical escape in every sip.</p>
                            <p class="price">NT$ 79</p>
                            <button class="add-btn"
                            data-name="Mango Smoothie"
                            data-price="NT$ 79"
                            data-img="../img/mango-smoothie.jpg"
                            data-desc="Rich, velvety mango blended to perfection">+</button>
                        </div>
                    </div>


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