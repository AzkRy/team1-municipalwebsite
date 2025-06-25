<?php
include '../User Side/database/database.php';
session_start();

$error = ""; // Initialize error variable

if (isset($_POST['first_name'], $_POST['last_name'], $_POST['employee_num'], $_POST['password'])) {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $employee_num = trim($_POST['employee_num']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM user_management WHERE last_name = ? AND first_name = ? AND employee_num = ?");
    $stmt->bind_param("sss", $last_name, $first_name, $employee_num);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            $_SESSION['um_id'] = $user['um_id'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            header("Location: Home.php");
            exit();
        } else {
            $error = "Invalid password. Please try again.";
        }
    } else {
        $error = "Invalid credentials. Please try again.";
    }

    $stmt->close();
    $conn->close();

    include '../Admin Website/Terms-Privacy.php';
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Log In</title>

    <link rel="stylesheet" href="../Admin Website/CSS/Log In.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <div class="welcome-section">
                <h1>WELCOME!</h1>
               <?php if (!empty($error)) echo "<div class='msg' style='background-color: #f44336; color: white; padding: 10px; border-radius: 5px; 
                    margin-bottom: 25px;  width: 60%; margin: 20px auto; text-align: center; font-family: Roboto, sans-serif;'>$error</div>"; ?>
                <p class="login-text">Log In</p>
                <form action="" method="POST">
                    <?php if (!empty($error)): ?>
        <div class="error-message"><?php echo $error; ?></div>
    <?php endif; ?>
                <div class="input-group">
                    <input type="text" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo (isset($last_name)) ? $last_name : ''; ?>" required>
                    <input type="text" id="first_name" name="first_name" placeholder="First Name" value="<?php echo (isset($first_name)) ? $first_name : ''; ?>" required>
                </div>
                <div class="input-group">
                    <input type="text" id="employeeNumber" name="employee_num" placeholder="Employee Number" value="<?php echo (isset($employee_num)) ? $employee_num : ''; ?>" required>
                </div>
                    <div class="input-group">
                        <input type="password" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="forgot-password">
                        <a href="Forgot Password.php">Forgot Password?</a>
                    </div>
                    <div class="terms-privacy">
                        <span onclick="openModal('termsModal')">Terms & Conditions</span> • 
                        <span onclick="openModal('privacyModal')">Data Privacy</span>
                    </div>

                    <button type="submit" class="login-button">Log In</button>
                </form>
            </div>
        </div>
        <div class="right-panel">
            <div class="logo-section">
                <img src="../User Side/Navigation Bar/img/lucena_city.png" alt="City of Lucena Official Seal" class="lucena-logo">
                <h2>LUCENA CITY GOVERNMENT</h2>
            </div>
        </div>
    </div>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

</body>
</html>
