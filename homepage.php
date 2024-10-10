<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>HI-TECH</title>
</head>
<body>
    <header>
        <div class="header-container">
            <img src="images/logo.jpg" alt="HI-TECH Logo" class="logo">
            <nav class="nv00-gnb">
                <ul class="nav-links">
                    <li class="dropdown">
                        <a href="homepage.php" class="nv00-gnb__l0-menu-link">Home</a>
                        <div class="dropdown-content">
                            <p>Latest News</p>
                            <p>Our Mission</p>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="index.php" class="nv00-gnb__l0-menu-link">Products</a>
                        <div class="dropdown-content">
                            <p>Gadgets</p>
                            <p>Accessories</p>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="services.php" class="nv00-gnb__l0-menu-link">Services</a>
                        <div class="dropdown-content">
                            <p>Email Support</p>
                            <p>FAQ</p>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="contact.php" class="nv00-gnb__l0-menu-link">Contact Us</a>
                        <div class="dropdown-content">
                            <p>Email Support</p>
                            <p>FAQ</p>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="header-icons">
                <a href="signin.php" aria-label="Sign In" title="Sign In"><i class="fas fa-user-circle"></i></a>
                <a href="checkout.php" aria-label="Shopping Cart" title="Shopping Cart"><i class="fas fa-shopping-basket"></i></a>
                <a href="#" aria-label="Search" title="Search" id="search-icon"><i class="fas fa-search"></i></a>
                <div class="search-bar" id="search-bar">
                    <input type="text" placeholder="Search...">
                </div>
            </div>
        </div>
    </header>

    <section class="hero">
        <div class="hero-content">
            <div class="slogan-animation">
                <h1>Empowering Your Tech Experience</h1>
                <p>Your gateway to the latest innovations in technology.</p>
            </div>
        </div>
        <div class="slideshow-container">
            <div class="mySlides fade">
                <img src="images/s24.jpg" alt="Samsung S24">
            </div>
            <div class="mySlides fade">
                <img src="images/iphone16.jpg" alt="iPhone 16">
            </div>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
    </section>

    <section class="latest-news">
        <h2>Latest News</h2>
        <article>
            <h3>Innovation in Tech: The Future is Now</h3>
            <p>Stay updated with the latest advancements in technology, including AI, robotics, and smart devices that are revolutionizing our lives.</p>
        </article>
        <article>
            <h3>Sustainable Tech: A Step Towards a Greener Future</h3>
            <p>Explore how technology is making strides toward sustainability, focusing on eco-friendly practices and renewable energy solutions.</p>
        </article>
    </section>

    <section class="our-mission">
        <h2>Our Mission</h2>
        <div class="mission-content">
            <div class="mission-item">
                <img src="images/recycle.jpg" alt="Recycling Batteries">
                <h3>Battery Recycling</h3>
                <p>We are committed to promoting the recycling of batteries to reduce waste and protect the environment. Our initiatives aim to create awareness and provide facilities for proper battery disposal.</p>
                <button class="mission-button">Learn More</button>
            </div>
            <div class="mission-item">
                <img src="images/mental.jpg" alt="Mental Health Donation">
                <h3>Mental Health Donation</h3>
                <p>Supporting mental health is vital to our mission. We donate a portion of our profits to mental health organizations to ensure that everyone has access to the support they need.</p>
                <button class="mission-button">Donate Now</button>
            </div>
        </div>
    </section>

    <footer>
    <div class="footer-content">
        <nav aria-label="Footer Navigation" class="footer-nav">
            <ul class="footer-links">
                <li><a href="#">Sustainability</a></li>
                <li><a href="#">Support</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Service</a></li>
            </ul>
        </nav>
        <p>&copy; 2024 HI-TECH. All Rights Reserved.</p>
        <div class="footer-icons">
            <a href="#" aria-label="Facebook" title="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="#" aria-label="Twitter" title="Twitter"><i class="fab fa-twitter"></i></a>
            <a href="#" aria-label="Instagram" title="Instagram"><i class="fab fa-instagram"></i></a>
            <a href="#" aria-label="LinkedIn" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
        </div>
    </div>
</footer>


    <script src="script/script.js"></script>
</body>
</html>
