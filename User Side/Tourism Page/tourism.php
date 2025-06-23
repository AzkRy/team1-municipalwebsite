<!DOCtype html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> City of Lucena </title>
    <link rel="stylesheet" href="tourism.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">

    <link rel="stylesheet" href="../Navigation Bar/navigation.css">
    <link rel="stylesheet" href="../Footer/footer_styles.css">
    <script type="text/javascript" src="tourism.js"></script>

</head>

<body>
    <header>
        <div id="divLogo">
            <img src="img/lucena_city.png" class="logo">
            <h1 id="cityName"> CITY OF LUCENA </h1>
        </div>
        <div class="tagline">
            <img src="img/boom-lucena.PNG" class="boomLucena">
        </div>
    </header>

    <?php
    include '../Navigation Bar/Navigation.php';
    ?>

    <section class="headline_section">
        <h1>TOURISM</h1>
        <br>
        <div class="navigation_link">
            <a href="#" class="home_link">Home</a> > <a class="news-link" href="#">Tourism</a>
        </div>
    </section>

    <section class="spot_nav">
        <nav class="spot-bar">
            <button class="spot-btn active" onclick="updateSpot(this, 'perez')"><img src="park.png"><br>Lucena Perez Park</button>
            <button class="spot-btn" onclick="updateSpot(this, 'capitol')"><img src="capitol.png"><br>Quezon Provincial Capitol</button>
            <button class="spot-btn" onclick="updateSpot(this, 'parish')"><img src="parish.png"><br>Saint Ferdinand Cathedral Parish</button>
        </nav>
    </section>

    <section class="tourist_map">
        <iframe id="mapFrame" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d153763.56699866435!2d121.5413322118261!3d13.939251596345391!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd4b578caf4ccd%3A0x2be1e905c862fe1!2sLucena%20City%2C%20Quezon!5e1!3m2!1sen!2sph!4v1750358404107!5m2!1sen!2sph" width="100%" height="400" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="spot_description" id="spotdescription">
        </div>
    </section>

    <nav class="nav-bar">
        <button class="nav-btn active" onclick="setActive(this)">Direction</button>
        <button class="nav-btn" onclick="setActive(this)">Hotels and Inns</button>
        <button class="nav-btn" onclick="setActive(this)">Food Spots</button>
    </nav>

    <section class="user_interact" id="navContent">
        <div class="content_box" id="contentBox">
        </div>
    </section>

    <script src="../Navigation Bar/navigation.js"></script>

    <?php
    include '../Footer/Footer.php';
    ?>