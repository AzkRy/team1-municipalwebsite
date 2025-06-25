
    <header>
        <nav>
            <div class="topBar">
                <div class="left-section">
                    <a href="#" id="menuToggle"><i class="fas fa-bars"></i></a>
                    <div class="date-time-section">
                        <?php echo date('F j, Y | '); ?>
                        <span id="live-time"></span>
                    </div>
                </div>

                <div class="right-section">
                    <div class="user-profile">
                        <span>
                            <?php
                                if (isset($_SESSION['last_name']) && isset($_SESSION['first_name'])) {
                                     echo htmlspecialchars($_SESSION['last_name'] . ', ' . $_SESSION['first_name']);
                                } else {
                                    echo "ADMIN Name";
                                }
                            ?>
                                </span> <i class="fas fa-user-circle"></i>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="city-logo">
                <img src="../User Side/Navigation Bar/img/lucena_city.png" alt="Lucena City Logo">
            </div>
            <div class="city-name">
                <p>LUCENA CITY</p>
                <p>GOVERNMENT</p>
            </div>
            </div>

        <div class="sidebar-content">
            <nav class="nav-menu">
                <a href="Home.php" class="nav-item" data-page="media">
                    <span>Home</span>
                </a>

                <a href="../Admin Website/Media Management.php" class="nav-item" data-page="media">
                    <span>Media Management</span>
                </a>

                <a href="../Admin Website/Service Management.php" class="nav-item" data-page="services">
                    <span>Service Management</span>
                </a>

                <a href="../Admin Website/Transparency Posting.php" class="nav-item" data-page="transparency">
                    <span>Transparency Posting</span>
                </a>

                <a href="../Admin Website/Feedback_Inquiry.php" class="nav-item" data-page="feedback">
                    <span>Feedback & Inquiry</span>
                </a>

                <a href="../Admin Website/User Management.php" class="nav-item" data-page="feedback">
                    <span>User Management</span>
                </a>
            </nav>

            <div class="logout-section">
                <a href="Log In.php" class="nav-item logout">
                    <span>Log Out</span>
                </a>
            </div>
        </div>

        <div class="collapsed-logo">
            <img src="../User Side/Navigation Bar/img/lucena_city.png" alt="Lucena City Logo">
        </div>
    </aside>

    <script src="../Admin Website/JavaScripts/Navigation Bar.js"></script>
