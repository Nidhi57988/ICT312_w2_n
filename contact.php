<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"> 
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>
  </head>

  <body id="contact">
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
      <section class="contact" id="contact">
        <h4 class="heading">Contact Options</h4>
        <div class="card-container">

          <div class="contact-card" id="address-card">
            <div class="card-content">
              <h1>Address</h1>
              <p class="text">You can find us at 123 Harbour View Road, Level 10<br> Sydney, NSW, 2000 Australia</p>
            </div>
          </div>
          
          <div class="contact-card">
            <div class="card-content">
              <h1>Call Us</h1>
              <p class="text">8am-8pm AEST / 7days a week <br>For general enquires and technical support</p>
            </div>
          </div>

          <div class="contact-card">
            <div class="card-content">
              <h1>Email</h1>
              <p class="text">Contact us via email at <br>support@techinnovators.com</p>
            </div>
          </div>

      </section>
      <section class="contact-section">
        <div class="contact-intro">
          <h2 class="contact-title">Get in Touch</h2>
          <p class="contact-description">
            Fill out the form below and we'll get back to you as soon as possible.
          </p>
        </div>

        <?php
        $name = $email = $phone = $message = "";
        $errors = [];

        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $phone = trim($_POST['phone']);
            $message = trim($_POST['message']);

            if (empty($name) || strlen($name) < 3) {
                $errors['name'] = "Please enter a valid name (at least 3 characters).";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL) || preg_match("/[\r\n]/", $email)) {
              $errors['email'] = "Please enter a valid email address.";
            }

            if (!empty($phone) && !preg_match("/^\+?\d{1,3}[\s.-]?\(?\d{1,4}?\)?[\s.-]?\d{1,4}[\s.-]?\d{1,9}$/", $phone)) {
                $errors['phone'] = "Please enter a valid phone number.";
            }

           
            if (empty($message) || strlen($message) < 10) {
                $errors['message'] = "Please enter a message with at least 10 characters.";
            }

            
            if (empty($errors)) {
              $host = 'localhost';
              $db   = 'ICT312_website';
              $user = 'root';
              $pass = 'root';
              $charset = 'utf8mb4';

              $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
              $options = [
                  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       
                  PDO::ATTR_EMULATE_PREPARES   => false,            
              ];

              try {
                  $pdo = new PDO($dsn, $user, $pass, $options);
                  $stmt = $pdo->prepare('INSERT INTO user_feedback (name, email, phone, message) VALUES (?, ?, ?, ?)');
                  $stmt->execute([$name, $email, $phone, $message]);

                  echo "<p style='color: green;'>Thank you for your feedback! We will get back to you shortly.</p>";
              } catch (PDOException $e) {
                  echo "<p style='color: red;'>Error saving your feedback. Please try again later.</p>";
              }
            } else {
                foreach ($errors as $error) {
                    echo "<p style='color: red;'>$error</p>";
                }
            }
        }
        ?>
      
      <form class="contact-form" action="contact.php" method="POST">
          <div class="form-group-container">
            <div class="form-group">
              <label for="name" class="form-label">Name</label>
              <input id="name" name="name" class="form-input" placeholder="Your name" type="text" required minlength="3" value="<?php echo htmlspecialchars($name); ?>" />
              <span class="error"><?php echo $errors['name'] ?? ''; ?></span>
            </div>
            <div class="form-group">
              <label for="email" class="form-label">Email</label>
              <input id="email" name="email" class="form-input" placeholder="Your email" type="email" required value="<?php echo htmlspecialchars($email); ?>" />
              <span class="error"><?php echo $errors['email'] ?? ''; ?></span>
            </div>
            <div class="form-group">
              <label for="phone" class="form-label">Phone</label>
              <input id="phone" name="phone" class="form-input" placeholder="+61 4567890123" type="text" pattern="\+?\d{1,3}[\s.-]?\(?\d{1,4}?\)?[\s.-]?\d{1,4}[\s.-]?\d{1,9}" value="<?php echo htmlspecialchars($phone); ?>" />
              <span class="error"><?php echo $errors['phone'] ?? ''; ?></span>
            </div>
            <div class="form-group">
              <label for="message" class="form-label">Message</label>
              <textarea class="form-textarea" id="message" name="message" placeholder="Your message" required minlength="10"><?php echo htmlspecialchars($message); ?></textarea>
              <span class="error"><?php echo $errors['message'] ?? ''; ?></span>
            </div>
          </div>
          <button class="form-submit" type="submit">Send Message</button>
        </form>
      </section>
      <section class="address" id="address">
        <div class="map-container">
          <div id="map" style="width:100%;height:400px"></div>
        </div>
      </section>
  </body>
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
<script src="script/map.js"></script>
</html>

