<?php 
include '../User Side/database/database.php';
session_start();

if (!isset($_SESSION['um_id']) || !isset($_SESSION['role'])) {
    header("Location: ../Admin Website/Log In.php");
    exit();
}

$isSuperAdmin = ($_SESSION['role'] === 'Super Admin');
$isServiceOfficer = ($_SESSION['role'] === 'Service Officer');
$canEditMedia = $isSuperAdmin || $isServiceOfficer;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services Management</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../Admin Website/CSS/Service Management.css">
    <link rel="stylesheet" href="../Admin Website/CSS/Navigation Bar.css">
</head>
<body>
    <?php include '../Admin Website/Navigation Bar.php'; ?>
    
    <div class="filter-tab">
        <div class="tabs-nav">
            <div class="tab-button active" onclick="showTab('permits', this)">PERMITS</div>
            <div class="tab-button" onclick="showTab('healthService', this)">HEALTH SERVICES</div>
        </div>

        <div class="tabs-content">
            <div id="permits" class="tab-content active">
                <div class="cards-container">
                    <div class="permit-card approved">
                        <div class="permit-card-title">APPROVED</div>
                        <div class="permit-card-count">12</div>
                    </div>
                    <div class="permit-card pending">
                        <div class="permit-card-title">PENDING</div>
                        <div class="permit-card-count">8</div>
                    </div>
                    <div class="permit-card rejected">
                        <div class="permit-card-title">REJECTED</div>
                        <div class="permit-card-count">3</div>
                    </div>
                    <div class="permit-card total">
                        <div class="permit-card-title">TOTAL</div>
                        <div class="permit-card-count">23</div>
                    </div>
                </div>
               
        <div class="permit-table-section">
            <div class="permit-table-header">
                <span class="permit-table-title">PERMITS</span>
                <div class="permit-table-controls">
                    <span>Sort</span>
                    <select>
                        <option>Newest</option>
                        <option>Oldest</option>
                    </select>
                </div>
            </div>
            <table>
                <thead>
                    <th>Permit Code</th>
                    <th>Permit Type</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Status</th>
                    <th>Submitted Form</th>
                </thead>
                <tbody>
                    <tr>
                        <td>P-7854</td>
                        <td>Business Permit</td>
                        <td>Dela Vega</td>
                        <td>Juan</td>
                        <td>Seib Mor</td>
                        <td>
                            <?php if ($canEditMedia): ?>
                            <select name="status" id="status">
                                <option value="Pending">Pending</option>
                                <option value="Approved">Approved</option>
                                <option value="Rejected">Rejected</option>
                            </select>
                            <?php else: ?>
                            <span>Pending</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <button id="viewForm" class="view-form">View Form</button>
                        </td>
                    </tr>

                    <tr>
                        <td>P-9568</td>
                        <td>Parking Permit</td>
                        <td>San Juan</td>
                        <td>Jose</td>
                        <td>Marie Mor</td>
                        <td>
                            <?php if ($canEditMedia): ?>
                            <select name="status" id="status">
                                <option value="Pending">Pending</option>
                                <option value="Approved">Approved</option>
                                <option value="Rejected">Rejected</option>
                            </select>
                            <?php else: ?>
                            <span>Pending</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <button id="viewForm" class="view-form">View Form</button>
                        </td>
                    </tr>

                    <tr>
                        <td>P-5846</td>
                        <td>Business Permit</td>
                        <td>San Jose</td>
                        <td>Del</td>
                        <td>Monte</td>
                        <td>
                            <?php if ($canEditMedia): ?>
                            <select name="status" id="status">
                                <option value="Pending">Pending</option>
                                <option value="Approved">Approved</option>
                                <option value="Rejected">Rejected</option>
                            </select>
                            <?php else: ?>
                            <span>Pending</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <button id="viewForm" class="view-form">View Form</button>
                        </td>
                    </tr>

                    <tr>
                        <td>P-4523</td>
                        <td>Business Permit</td>
                        <td>San Miguel</td>
                        <td>Dell</td>
                        <td>Hp</td>
                        <td>
                            <?php if ($canEditMedia): ?>
                            <select name="status" id="status">
                                <option value="Pending">Pending</option>
                                <option value="Approved">Approved</option>
                                <option value="Rejected">Rejected</option>
                            </select>
                            <?php else: ?>
                            <span>Pending</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <button id="viewForm" class="view-form">View Form</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

            <div id="healthService" class="tab-content">
                <div class="cards-container">
                    <div class="permit-card approved">
                        <div class="permit-card-title">APPROVED</div>
                        <div class="permit-card-count">10</div>
                    </div>
                    <div class="permit-card pending">
                        <div class="permit-card-title">PENDING</div>
                        <div class="permit-card-count">20</div>
                    </div>
                    <div class="permit-card rejected">
                        <div class="permit-card-title">REJECTED</div>
                        <div class="permit-card-count">5</div>
                    </div>
                    <div class="permit-card total">
                        <div class="permit-card-title">TOTAL</div>
                        <div class="permit-card-count">35</div>
                    </div>
                </div>
            
            <div class="permit-table-section">
            <div class="permit-table-header">
                <span class="permit-table-title">HEALTH APPOINTMENTS</span>
                <div class="permit-table-controls">
                    <span>Sort</span>
                    <select>
                        <option>Newest</option>
                        <option>Oldest</option>
                    </select>
                </div>
            </div>
            <table>
                <thead>
                    <th>Health Service Code</th>
                    <th>Heath Service Type</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Status</th>
                    <th>Submitted Form</th>
                </thead>
                    <tbody>
                        <tr>
                            <td>HS-7854</td>
                            <td>Vaccination</td>
                            <td>Dela Vega</td>
                            <td>Juan</td>
                            <td>Seib Mor</td>
                            <td>
                                <?php if ($canEditMedia): ?>
                                <select name="status" id="status">
                                    <option value="Pending">Pending</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                                <?php else: ?>
                                <span>Pending</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <button id="viewForm" class="view-form">View Form</button>
                            </td>
                        </tr>

                        <tr>
                            <td>HS-9568</td>
                            <td>Consultation</td>
                            <td>San Juan</td>
                            <td>Jose</td>
                            <td>Marie Mor</td>
                            <td>
                                <?php if ($canEditMedia): ?>
                                <select name="status" id="status">
                                    <option value="Pending">Pending</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                                <?php else: ?>
                                <span>Pending</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <button id="viewForm" class="view-form">View Form</button>
                            </td>
                        </tr>

                        <tr>
                            <td>HS-5846</td>
                            <td>Check-Up</td>
                            <td>San Jose</td>
                            <td>Del</td>
                            <td>Monte</td>
                            <td>
                                <?php if ($canEditMedia): ?>
                                <select name="status" id="status">
                                    <option value="Pending">Pending</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                                <?php else: ?>
                                <span>Pending</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <button id="viewForm" class="view-form">View Form</button>
                            </td>
                        </tr>

                        <tr>
                            <td>HS-4523</td>
                            <td>Check-Up</td>
                            <td>San Miguel</td>
                            <td>Dell</td>
                            <td>Hp</td>
                            <td>
                                <?php if ($canEditMedia): ?>
                                <select name="status" id="status">
                                    <option value="Pending">Pending</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                                <?php else: ?>
                                <span>Pending</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <button id="viewForm" class="view-form">View Form</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

        <script src="../Admin Website/JavaScripts/Service Management.js"></script>
    </body>
</html>