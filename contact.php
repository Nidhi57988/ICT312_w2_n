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
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>
  </head>

  <body id="contact">
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

<script src="script/map.js"></script>
</html>

