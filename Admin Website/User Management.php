<?php 
session_start();
include '../User Side/database/database.php';

if (!isset($_SESSION['um_id']) || !isset($_SESSION['role'])) {
    header("Location: ../Admin Website/Log In.php");
    exit();
}

$isSuperAdmin = ($_SESSION['role'] === 'Super Admin');
$isUserAdmin = ($_SESSION['role'] === 'User Admin');
$canEditMedia = $isSuperAdmin || $isUserAdmin;

$sql = "SELECT role, last_name, first_name, email, employee_num, password FROM user_management";
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
                            <td><?php echo htmlspecialchars($row['role']); ?></td>
                            <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['employee_num']); ?></td>
                            <td><?php echo str_repeat('•', 8); ?></td>
                            <?php if ($isSuperAdmin): ?>
                                <td>
                                    <button id="openEdit" onclick="openEdit()"><i class="fas fa-edit"></i></button>
                                    <button id="delete" onclick="openDelete()"><i class="fas fa-trash-alt"></i></button>
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
                <form action="#">
                    <div class="name">
                        <input type="text" name="lastname" id="lastname" placeholder="Last Name" required>
                        <input type="text" name="firstname" id="firstname" placeholder="First Name" required><br>
                    </div>

                    <input type="email" name="email" id="email" placeholder="email@gmail.com" required><br>

                    <div class="en-roles">
                        <input type="text" name="employeeNumber" id="employeeNumber" placeholder="LCG-###-###" required>
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
                        <button type="submit" id="save">Register</button>
                        <button id="cancelRegister" onclick=cancel()>Cancel</button>
                    </div>
                </form>
            </div>
        </div>

        <!--==================== EDIT USER MODAL =====================-->
        <div class="modal-container-edit" id="modal_Container_edit">
            <div class="modal-edit">
                <h2>Edit User</h2>
                <form action="#">
                    <div class="name">
                        <input type="text" name="lastname" id="lastname" placeholder="Last Name" required>
                        <input type="text" name="firstname" id="firstname" placeholder="First Name" required><br>
                    </div>

                    <input type="email" name="email" id="email" placeholder="email@gmail.com" required><br>

                    <div class="en-roles">
                        <input type="text" name="employeeNumber" id="employeeNumber" placeholder="LCG-###-###" required>
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

                    <div class="button">
                        <button type="submit" id="edit">Edit</button>
                        <button id="cancelEdit" onclick=cancel()>Cancel</button>
                    </div>
                </form>
            </div>
        </div>

         <!--==================== DELETE USER MODAL =====================-->
        <div class="modal-container-delete" id="modal_Container_delete">
            <div class="modal-delete">
                <form action="#">
                    <h2>Delete User</h2>
                    <p>Are you sure you want to <strong style="color: var(--important-section);">Delete</strong> this User?</p>
                    <div class="button">
                        <button type="submit" id="deleteUser">Delete</button>
                        <button id="cancelEdit" onclick=cancel()>Cancel</button>
                    </div>
                </form>
            </div>
    <?php endif; ?>

    <script src="../Admin Website/JavaScripts/User Management.js"></script>
</body>
</html>