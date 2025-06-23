<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Lucena</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">

    <link rel="stylesheet" href="../Transparency Page/transparency_styles.css">
    <link rel="stylesheet" href="../Navigation Bar/navigation.css">
    <link rel="stylesheet" href="../Footer/footer_styles.css">

</head>

<body>
    <header>
        <div id="divLogo">
            <img src="../Navigation Bar/img/lucena_city.png" class="logo">
            <h1 id="cityName"> CITY OF LUCENA </h1>
        </div>
        <div class="tagline">
            <img src="../Navigation Bar/img/boom-lucena.PNG" class="boomLucena">
        </div>
    </header>

    <?php
    include '../Navigation Bar/Navigation.php';
    ?>

    <section class="headline_section">
        <h1>PAGE TRANSPARENCY</h1>
        <br>
        <div class="navigation_link">
            <a href="../Home/index.php" class="home_link">Home</a> > <a class="news-link" href="../Transparency Page/transparency.php">Page Transparency</a>
        </div>
    </section>

    <div class="bottom_section">
        <section class="trans_nav">
            <table>
                <thead>
                    <tr>
                        <th>Navigation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="Team 1 - Figma Design (Municipal Website).pdf" target="pdf_viewer">Annual Report 2024</a></td>
                    </tr>
                    <tr>
                        <td><a href="sample2.pdf" target="pdf_viewer">Budget Breakdown</a></td>
                    </tr>
                    <tr>
                        <td><a href="sample3.pdf" target="pdf_viewer">Transparency Policy</a></td>
                    </tr>
                    <tr>
                        <td><a href="sample4.pdf" target="pdf_viewer">Audit Summary</a></td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section class="document_area">
            <iframe name="pdf_viewer" src="sample1.pdf" width="100%" height="600px" style="border: none;"></iframe>
        </section>
    </div>

    <script src="../Navigation Bar/navigation.js"></script>
    <?php
    include '../Footer/Footer.php';
    ?>