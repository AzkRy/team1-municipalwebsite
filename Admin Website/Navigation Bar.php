<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation</title>

    <link rel="stylesheet" href="./CSS/Navigation Bar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
</head>
<body>
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
                        <span>ADMIN Name</span> <i class="fas fa-user-circle"></i>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="city-logo">
                <img src="lucena_city.png" alt="Lucena City Logo">
            </div>
            <div class="city-name">
                <p>LUCENA CITY</p>
                <p>GOVERNMENT</p>
            </div>
            </div>

        <div class="sidebar-content">
            <nav class="nav-menu">
                <a href="#" class="nav-item active" data-page="home">
                    <span>Home</span>
                </a>

                <a href="#" class="nav-item" data-page="media">
                    <span>Media Management</span>
                </a>

                <a href="#" class="nav-item" data-page="city-info">
                    <span>City Information</span>
                </a>

                <a href="#" class="nav-item" data-page="services">
                    <span>Service Management</span>
                </a>

                <a href="#" class="nav-item" data-page="transparency">
                    <span>Transparency Posting</span>
                </a>

                <a href="#" class="nav-item" data-page="feedback">
                    <span>Feedback & Inquiry</span>
                </a>
            </nav>

            <div class="logout-section">
                <a href="Log In.php" class="nav-item logout">
                    <span>Log Out</span>
                </a>
            </div>
        </div>

        <div class="collapsed-logo">
            <img src="lucena_city.png" alt="Lucena City Logo">
        </div>
    </aside>

    <script src="./JavaScripts/Navigation Bar.js"></script>
</body>
</html>