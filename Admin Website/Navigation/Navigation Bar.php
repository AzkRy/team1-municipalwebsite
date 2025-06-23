<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nav</title>

    <link rel="stylesheet" href="../Navigation/Navigation Bar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
</head>

<body>
    <header>
        <nav>
            <div class="topBar">
                <div class="left-section">
                    <a href="#"><i class="fas fa-bars"></i></a>
                    <div class="date-time-section" style="color: var(--section-color); font-size: 16px; margin-left: 20px; font-weight: 600;">
                        <?php echo date('F j, Y | '); ?> 
                        <span id="live-time"></span>
                    </div>
                </div>
                
                <div class="right-section">
                    <div class="user-profile">
                        <span>Admin User</span>
                        <i class="fas fa-user-circle"></i>  
                    </div>
                </div>
            </div>

            
        </nav>
    </header>

    <script>
    function updateTime() {
        const now = new Date();
        const timeString = now.toLocaleTimeString();
        document.getElementById('live-time').textContent = ' ' + timeString;
    }   
    setInterval(updateTime, 1000);
    updateTime();
    </script>

</body>
</html>