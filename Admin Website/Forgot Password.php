<?php
// DB connection
include '../User Side/database/database.php';

$step = 1;
$getEmpNum = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['employeeNumber']) && !isset($_POST['newPassword'])) {
        $employee_num = trim($_POST['employeeNumber']);
        $stmt = $conn->prepare("SELECT * FROM user_management WHERE employee_num = ?");
        $stmt->bind_param("s", $employee_num);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $getEmpNum = $row['employee_num'];
            $step = 2;
        } else {
            $error = "Employee number not found.";
        }
        $stmt->close();
    }

    if (isset($_POST['employeeNumber']) && isset($_POST['newPassword'])) {
        $employeeNumber = trim($_POST['employeeNumber']);
        $newPassword = trim($_POST['newPassword']);

        $stmt = $conn->prepare("UPDATE user_management SET password = ? WHERE employee_num = ?");
        $stmt->bind_param("ss", $newPassword, $employeeNumber);
        $stmt->execute();

        $success = "Password reset successful!";
        $step = 1;
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <style>
    :root {
        --bg-color: #F6F6F6;
        --section-color: #FCF7F8;
        --accent-color: #006494;
        --sub-color: #F35B04;
        --important-section: #9A031E;
        --button-color: #201729;
        --text-color: #000000;
        --footer-bg: #D9D9D9;
        --icon-color: #F35B04;
        --box-shadow: 0px 4px 4px 0px rgba(32, 23, 41, 0.25);
        --Main-font: 'Roboto', sans-serif;
        --text-font: 'Archivo', sans-serif;
        --border-radius: 5px;
        --H1-font-size: 64px;
        --H2-font-size: 32px;
        --Title-font-size: 24px;
        --text-font-size: 16px;
        --icon-size: 24px;
        --button-font-size: 18px;
    }

    body {
        margin: 0;
        padding: 0;
        font-family: var(--Main-font);
        background-color: var(--bg-color);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        background-color: var(--section-color);
        padding: 30px 30px;
        border: 3px solid #006494;
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
        width: 100%;
        max-width: 420px;
        color: var(--text-color);
        font-family: var(--text-font);
    }

    h2 {
        font-size: var(--H2-font-size);
        color: var(--accent-color);
        text-align: center;
        margin-bottom: 50px;
        margin-top: 10px;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    label {
        font-weight: 600;
        font-size: var(--text-font-size);
    }

    input[type="text"],
    input[type="password"] {
        padding: 10px;
        border-radius: var(--border-radius);
        border: 1px solid #ccc;
        font-size: var(--text-font-size);
        font-family: var(--text-font);
        background-color: white;
    }

    button {
        padding: 10px;
        background-color: var(--button-color);
        color: white;
        border: none;
        border-radius: var(--border-radius);
        font-size: var(--button-font-size);
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
        width: 40%;
    }

    button:hover {
        background-color: var(--accent-color);
    }

    .msg,
    .success {
        padding: 10px;
        border-radius: var(--border-radius);
        font-size: var(--text-font-size);
        margin-bottom: 15px;
        text-align: center;
    }

    .msg {
        background-color: #f44336;
        color: white;
        width: 50%;
        margin: 0 auto 50px;
        text-align: center;
        display: block;
    }

    .success {
        background-color: #4CAF50;
        color: white;
        width: 50%;
        margin: 0 auto 50px;
        text-align: center;
        display: block;
    }

    a {
        margin-top: 50px;
        text-decoration: underline;
        color: var(--sub-color);
        font-size: var(--text-font-size);
        text-align: center;
        display: block;
    }

    a:hover {
        color: var(--important-section);
    }
    </style>
</head>
<body>
<div class="container">
    <h2>Forgot Password</h2>

    <?php if (!empty($error)) echo "<div class='msg'>$error</div>"; ?>
    <?php if (!empty($success)) echo "<div class='success'>$success</div>"; ?>

    <?php if ($step == 1): ?>
    <form method="POST">
        <label for="employeeNumber">Employee Number</label>
        <input type="text" name="employeeNumber" id="employeeNumber" required>
        <button type="submit">Search</button>
    </form>

    <?php elseif ($step == 2): ?>
    <form method="POST">
        <input type="hidden" name="employeeNumber" value="<?php echo $getEmpNum; ?>">
        <label for="newPassword">New Password</label>
        <input type="password" name="newPassword" id="newPassword" required>
        <button type="submit">Save Password</button>
    </form>
    <?php endif; ?>

    <a href="Log In.php">← Back to Log In</a>
</div>

<script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

</body>
</html>
