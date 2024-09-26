<?php
$signin_email = $signin_password = "";
$signin_emailErr = $signin_passwordErr = "";

$signup_full_name = $signup_email = $signup_password = $confirm_password = "";
$signup_full_nameErr = $signup_emailErr = $signup_passwordErr = $confirm_passwordErr = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['form_type'])) {
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
        if ($_POST['form_type'] == 'signin') {
            if (empty($_POST["email"])) {
                $signin_emailErr = "Email is required";
            } else {
                $signin_email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
                if (!filter_var($signin_email, FILTER_VALIDATE_EMAIL)) {
                    $signin_emailErr = "Invalid email format";
                }
            }

            if (empty($_POST["password"])) {
                $signin_passwordErr = "Password is required";
            } else {
                $signin_password = htmlspecialchars($_POST["password"]);
                if (strlen($signin_password) < 6) {
                    $signin_passwordErr = "Password must be at least 6 characters";
                }
            }

            if (empty($signin_emailErr) && empty($signin_passwordErr)) {
                try {
                    $pdo = new PDO($dsn, $user, $pass, $options);
                } catch (PDOException $e) {
                    die('Database Connection Failed: ' . $e->getMessage());
                }
                $stmt = $pdo->prepare('SELECT password FROM users WHERE email = ?');
                $stmt->execute([$signin_email]);
                $pass = $stmt->fetch();

                if ($pass && password_verify($signin_password, $pass['password'])) {
                    header('Location: homepage.php');
                    exit;
                }
                else {
                    $signin_passwordErr = "Invalid email or password";
                }
            }
        } elseif ($_POST['form_type'] == 'signup') {
            if (empty($_POST["full_name"])) {
                $signup_full_nameErr = "Full Name is required";
            } else {
                $signup_full_name = htmlspecialchars($_POST["full_name"]);
            }

            if (empty($_POST["email"])) {
                $signup_emailErr = "Email is required";
            } else {
                $signup_email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
                if (!filter_var($signup_email, FILTER_VALIDATE_EMAIL)) {
                    $signup_emailErr = "Invalid email format";
                }
            }

            if (empty($_POST["password"])) {
                $signup_passwordErr = "Password is required";
            } else {
                $signup_password = htmlspecialchars($_POST["password"]);
                if (strlen($signup_password) < 6) {
                    $signup_passwordErr = "Password must be at least 6 characters";
                }
            }
            if (empty($_POST["confirm_password"])) {
                $confirm_passwordErr = "Please confirm your password.";
            } else {
                $confirm_password = htmlspecialchars($_POST["confirm_password"]);
                if ($signup_password !== $confirm_password){
                    $confirm_passwordErr = "Passwords do not match.";
                }
            }

            if (empty($signup_full_nameErr) && empty($signup_emailErr) && empty($signup_passwordErr) && empty($confirm_passwordErr)) {
                try {
                    $pdo = new PDO($dsn, $user, $pass, $options);
                } catch (PDOException $e) {
                    die('Database Connection Failed: ' . $e->getMessage());
                }
                $hashed_password = password_hash($signup_password, PASSWORD_DEFAULT);

                $stmt = $pdo->prepare('INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)');
                $stmt->execute([$signup_full_name, $signup_email, $hashed_password]);

                header('Location: homepage.php');
                exit;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Sign In</title>
</head>
<body id="signin">
    <div class="cont">
        <div class="form sign-in">
            <h2>Welcome back!</h2>
            <form action="" method="post">
                <input type="hidden" name="form_type" value="signin">
                <label>
                    <span>Email</span>
                    <input type="email" name="email" value="<?php htmlspecialchars($signin_email); ?>" required />
                    <span class="error"><?php echo $signin_emailErr; ?></span>
                </label>
                <label>
                    <span>Password</span>
                    <input type="password" name="password" required />
                    <span class="error"><?php echo $signin_passwordErr; ?></span>
                </label>
                <p class="forgot-pass"><span>Forgot password?</span></p>
                <button type="submit" class="submit">Sign In</button>
            </form>
            <button type="button" class="fb-btn">
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook logo" />
                <span>Continue with Facebook</span>
            </button>
            <button type="button" class="google-btn">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Google_%22G%22_logo.svg/480px-Google_%22G%22_logo.svg.png" alt="Google logo" />
                <span>Continue with Google</span>
            </button>
        </div>
        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">
                    <h2>New here?</h2>
                    <p>Sign up and discover great shopping opportunities!</p>
                </div>
                <div class="img__text m--in">
                    <h2>Already have an account?</h2>
                    <p>Just sign in & enjoy the experience!</p>
                </div>
                <div class="img__btn">
                    <span class="m--up">Sign Up</span>
                    <span class="m--in">Sign In</span>
                </div>
            </div>

            <div class="form sign-up">
                <h2>Create your account now!</h2>
                <form action="" method="post">
                    <input type="hidden" name="form_type" value="signup">
                    <label>
                        <span>Full Name</span>
                        <input type="text" name="full_name" value="<?php echo htmlspecialchars($signup_full_name); ?>" required />
                        <span class="error"><?php echo $signup_full_nameErr; ?></span>
                    </label>
                    <label>
                        <span>Email</span>
                        <input type="email" name="email" value="<?php echo htmlspecialchars($signup_email); ?>" required />
                        <span class="error"><?php echo $signup_emailErr; ?></span>
                    </label>
                    <label>
                        <span>Password</span>
                        <input type="password" name="password" required />
                        <span class="error"><?php echo $signup_passwordErr; ?></span>
                    </label>
                    <label>
                        <span>Confirm Password</span>
                        <input type="password" name="confirm_password" required />
                        <span class="error"><?php echo $confirm_passwordErr; ?></span>
                    </label>
                    <button type="submit" class="submit">Sign Up</button>
                </form>
                <button type="button" class="fb-btn">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook logo" />
                    <span>Sign up with Facebook</span>
                </button>
                <button type="button" class="google-btn">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Google_%22G%22_logo.svg/480px-Google_%22G%22_logo.svg.png" alt="Google logo" />
                    <span>Sign up with Google</span>
                </button>
            </div>
        </div>
    </div>
    <script src="script/signin.js"></script>
</body>
</html>
