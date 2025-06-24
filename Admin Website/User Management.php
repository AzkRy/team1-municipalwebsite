<?php 
session_start();
include '../User Side/database/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['um_id'])) {
    $um_id = $_POST['um_id'];
    $stmt = $conn->prepare("DELETE FROM user_management WHERE um_id = ?");
    $stmt->bind_param("i", $um_id);
    $success = $stmt->execute();
    $stmt->close();
    header('Content-Type: application/json');
    echo json_encode(['success' => $success]);
    exit;
}

if (!isset($_SESSION['um_id']) || !isset($_SESSION['role'])) {
    header("Location: ../Admin Website/Log In.php");
    exit();
}

$isSuperAdmin = ($_SESSION['role'] === 'Super Admin');
$isUserAdmin = ($_SESSION['role'] === 'User Admin');
$canEditMedia = $isSuperAdmin || $isUserAdmin;


$addUserMsg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registerUser'])) {
    $lastname = trim($_POST['last_name']);
    $firstname = trim($_POST['first_name']);
    $email = trim($_POST['email']);
    $employeeNumber = trim($_POST['employee_num']);
    $role = trim($_POST['roles']);
    $password = $_POST['createPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($password !== $confirmPassword) {
        $addUserMsg = '<span style="color:red;">Passwords do not match.</span>';
    } elseif ($role === 'Select Role') {
        $addUserMsg = '<span style="color:red;">Please select a valid role.</span>';
    } else {
        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and execute insert
        $stmt = $conn->prepare("INSERT INTO user_management (role, last_name, first_name, email, employee_num, password) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $role, $lastname, $firstname, $email, $employeeNumber, $hashedPassword);

        if ($stmt->execute()) {
            $addUserMsg = '';
        } else {
            $addUserMsg = ' ' . htmlspecialchars($stmt->error) . '</span>';
        }
        $stmt->close();
    }
}

// Edit user handler
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editUser'])) {
    $edit_um_id = $_POST['edit_um_id'];
    $edit_lastname = trim($_POST['edit_last_name']);
    $edit_firstname = trim($_POST['edit_first_name']);
    $edit_email = trim($_POST['edit_email']);
    $edit_employee_num = trim($_POST['edit_employee_num']);
    $edit_role = trim($_POST['edit_roles']);

    $stmt = $conn->prepare("UPDATE user_management SET role=?, last_name=?, first_name=?, email=?, employee_num=? WHERE um_id=?");
    $stmt->bind_param("sssssi", $edit_role, $edit_lastname, $edit_firstname, $edit_email, $edit_employee_num, $edit_um_id);

    if ($stmt->execute()) {
        $editUserMsg = '<span style="color:green;">User updated successfully!</span>';
    } else {
        $editUserMsg = '<span style="color:red;">Error: ' . htmlspecialchars($stmt->error) . '</span>';
    }
    $stmt->close();
}

$sql = "SELECT um_id, role, last_name, first_name, email, employee_num, password FROM user_management";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management | Lucena City</title>

    <link rel="stylesheet" href="../Admin Website/CSS/User Management.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../Admin Website/CSS/Navigation Bar.css">
</head>
<body>
    <?php include '../Admin Website/Navigation Bar.php'; ?>
    <section>
        <div class="upper-part">
            <h2>USER MANAGEMENT</h2>
            <?php if ($isSuperAdmin): ?>
                <button id="openUser" onclick="openUser()"><i class="fas fa-plus"></i></button>
            <?php endif; ?>
        </div>
        <table>
            <thead>
                <th hidden>Id</th>
                <th>Role</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Email</th>
                <th>Employee Number</th>
                <th>Password</th>
                <?php if ($isSuperAdmin): ?>
                    <th>Edit</th>
                <?php endif; ?>
            </thead>
            <tbody>
                <?php if ($result && $result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td style="display:none;"><?php echo $row['um_id']; ?></td> <!-- Add this if not already present -->
                            <td><?php echo htmlspecialchars($row['role']); ?></td>
                            <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['employee_num']); ?></td>
                            <td><?php echo str_repeat('•', 8); ?></td>
                            <?php if ($isSuperAdmin): ?>
                                <td>
                                    <button 
                                        class="openEditBtn"
                                        data-um_id="<?php echo $row['um_id']; ?>"
                                        data-role="<?php echo htmlspecialchars($row['role']); ?>"
                                        data-last_name="<?php echo htmlspecialchars($row['last_name']); ?>"
                                        data-first_name="<?php echo htmlspecialchars($row['first_name']); ?>"
                                        data-email="<?php echo htmlspecialchars($row['email']); ?>"
                                        data-employee_num="<?php echo htmlspecialchars($row['employee_num']); ?>"
                                    ><i class="fas fa-edit"></i></button>
                                    <button class="openDeleteBtn"
                                            data-um_id="<?php echo $row['um_id']; ?>"
                                            data-last_name="<?php echo htmlspecialchars($row['last_name']); ?>"
                                            data-first_name="<?php echo htmlspecialchars($row['first_name']); ?>">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="<?php echo $isSuperAdmin ? '7' : '6'; ?>">No users found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </section>

    <?php if ($canEditMedia): ?>
        <!--==================== ADD USER MODAL =====================-->
        <div class="modal-container" id="modal_Container">
            <div class="modal-user">
                <h2>Register User</h2>
                <?php if (!empty($addUserMsg)) echo $addUserMsg; ?>
                <form action="" method="POST" autocomplete="off">
                    
                    <div class="name">
                        <input type="text" name="last_name" id="lastname" placeholder="Last Name" required>
                        <input type="text" name="first_name" id="firstname" placeholder="First Name" required><br>
                    </div>

                    <input type="email" name="email" id="email" placeholder="email@gmail.com" required><br>

                    <div class="en-roles">
                        <input type="text" name="employee_num" id="employee_num" placeholder="######" required>
                        <select name="roles" id="roles" required>
                                <option value="Select Role">Select Role</option>
                                <option value="Super Admin">Super Admin</option>
                                <option value="User Admin">User Admin</option>
                                <option value="Media Officer">Media Officer</option>
                                <option value="Service Officer">Service Officer</option>
                                <option value="Information Officer">Information Officer</option>
                                <option value="Transparency Officer">Transparency Officer</option>
                                <option value="Feedback Officer">Feedback Officer</option>
                            </select>
                    </div>

                        <input type="password" name="createPassword" id="createPassword" placeholder="Create Password" required>
                        <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" required>

                    <div class="button">
                        <button type="submit" id="save" name="registerUser">Register</button>
                        <button id="cancelRegister" onclick="cancel();return false;">Cancel</button>
                    </div>
                </form>
            </div>
        </div>

        <!--==================== EDIT USER MODAL =====================-->
        <div class="modal-container-edit" id="modal_Container_edit">
            <div class="modal-edit">
                <h2>Edit User</h2>
                <?php if (!empty($editUserMsg)) echo $editUserMsg; ?>
                <form action="" method="POST" id="editUserForm">
                    <input type="hidden" name="edit_um_id" id="edit_um_id">
                    <div class="name">
                        <input type="text" name="edit_last_name" id="edit_last_name" placeholder="Last Name" required>
                        <input type="text" name="edit_first_name" id="edit_first_name" placeholder="First Name" required><br>
                    </div>
                    <input type="email" name="edit_email" id="edit_email" placeholder="email@gmail.com" required><br>
                    <div class="en-roles">
                        <input type="text" name="edit_employee_num" id="edit_employee_num" placeholder="######" required>
                        <select name="edit_roles" id="edit_roles" required>
                            <option value="Select Role">Select Role</option>
                            <option value="Super Admin">Super Admin</option>
                            <option value="User Admin">User Admin</option>
                            <option value="Media Officer">Media Officer</option>
                            <option value="Service Officer">Service Officer</option>
                            <option value="Information Officer">Information Officer</option>
                            <option value="Transparency Officer">Transparency Officer</option>
                            <option value="Feedback Officer">Feedback Officer</option>
                        </select>
                    </div>
                    <div class="button">
                        <button type="submit" id="edit" name="editUser">Edit</button>
                        <button id="cancelEdit" onclick="cancel();return false;">Cancel</button>
                    </div>
                </form>
            </div>
        </div>

         <!--==================== DELETE USER MODAL =====================-->
        <div class="modal-container-delete" id="modal_Container_delete">
            <div class="modal-delete">
                <form action="#">
                    <h2>Delete User</h2>
                    <input type="hidden" id="delete_um_id">
                    <p>Are you sure you want to <strong style="color: #9A031E;">Delete</strong> User <span id="delete_user_name"></span>?</p>
                    <div class="button">
                        <button type="button" id="confirmDeleteBtn">Delete</button>
                        <button type="button" id="cancelDeleteBtn" onclick=cancel()>Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    <?php endif; ?>

    <script src="../Admin Website/JavaScripts/User Management.js"></script>
</body>
</html>