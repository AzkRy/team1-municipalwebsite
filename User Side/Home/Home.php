<!DOCtype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> City of Lucena </title>
        <link rel="stylesheet" href="home styles.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
        <link rel="stylesheet" href="../Navigation Bar/navigation.css">
        <link rel="stylesheet" href="../Footer/footer_styles.css">
    </head>

    <?php
    include '../Navigation Bar/Navigation.php';
    ?>

    <body>        
        <div class="main-carousel-container">
            <div class="carousel-container">
                <div class="carousel-slide">
                    <div class="slide">
                        <div class="slide-inner">
                            <img src="img/carousel1.jpg" alt="Image 1">
                            <div class="slide-overlay">
                                <h1>BOOM! Lucena</h1>
                                <p>Tradisyon at Pagbabago, Sabay sa Pag-usbong!</p>
                                <button><a href="https://www.facebook.com/share/p/1P8bAh6To7/"> Read More </a></button>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="slide-inner">
                            <img src="img/carousel2.jpg" alt="Image 2">
                            <div class="slide-overlay">
                                <h3> Gawad KALASAG Seal of Excellence </h3>
                                <a id="description" href="https://www.facebook.com/share/p/1AYVhrWstj/"> Read More </a>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="slide-inner">
                            <img src="img/carousel3.jpg" alt="Image 3">
                            <div class="slide-overlay">
                                <h3> Real improvements at Lucena Public Market: Cleaner & Better </h3>
                                <a id="description" href="https://www.facebook.com/share/p/153JC3JVYBZ/"> Read More </a>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="slide-inner">
                            <img src="img/carousel4.jpg" alt="Image 4">
                            <div class="slide-overlay">
                                <h3> Promoting safety through teamwork and emergency readiness</h3>
                                <a id="description" href="https://www.facebook.com/profile.php?id=100064546131981"> Know More about BFP Lucena </a>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="slide-inner">
                            <img src="img/carousel5.jpg" alt="Image 5">
                            <div class="slide-overlay">
                                <h3> Traditional Pasayahan sa Lucena </h3>
                                <a id="description" href="https://www.facebook.com/share/p/16NuEaJhpf/"> Read More </a>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="nav-button prev-button">&#10094;</button>
                <button class="nav-button next-button">&#10095;</button>
                <div class="dots-container">
                    <div class="dot active" onclick="goToSlide(0)"></div>
                    <div class="dot" onclick="goToSlide(1)"></div>
                    <div class="dot" onclick="goToSlide(2)"></div>
                    <div class="dot" onclick="goToSlide(3)"></div>
                    <div class="dot" onclick="goToSlide(4)"></div>
                </div>
            </div>
        </div>
        
        <div id="mayorsMessageSection">
                <img src="img/mayor.png"> 
            <div id="mayorsMessageText">
                <h1>MAYOR'S MESSAGE</h1>
                <hr>
                <div id="message"> 
                    <p> I extend my heartfelt gratitude for your unwavering support and cooperation. Together, we continue to build a stronger, safer, and more progressive community. Let us remain united as we work toward a better future for all.</p> 
                    <p> With your continued trust, we will pursue more programs that uplift lives, promote peace, and bring lasting development to every corner of our municipality.</p> 
                    <p> Mabuhay po kayo, at maraming salamat sa inyong tiwala at suporta!</p> 
                </div>
            </div>
        </div>

        <div id="visionMission">
            <div id="divVision">
                <h2> VISION </h2>
                <hr>
                <p> The City of Lucena has a vision of becoming a premier City in Southern Tagalog providing sustainable development, creating opportunities for socio-economic, agro-industrial and technological growth, ensuring a peaceful and safe environment and improving the quality of life of its people.</p>
            </div>
    
            <div id="divMission">
                <h2> MISSION </h2>
                <hr>
                <p> Its mission is to uphold honest and transparent governance, boost investment opportunities, improve the quality of health and education, create employment through establishment of technological and agro-industries, ensure protection and sustainability of the environment, and promote peace and order that will uplift the Lucenahin's quality of life.</p>
            </div>
        </div>
       
    <div id="emergencyhotlines">
        <div id="divEmergency">
            <h2> EMERGENCY HOTLINES </h2>
            <hr>
            <div id="hotlines">
                <div id="hotline1">
                    <img src="img/drrmo.png">
                    <div class="hotline-text">
                        <h3> LUCENA CITY COMMAND CENTER | 911</h3>
                        <p> 0970 128 5078 | 0968 719 5568 <br> 042 731 6009 | 042 373 3747 </p>
                    </div>
                </div>
        
                <div id="hotline2">
                    <img src="img/bfp.png">
                    <div class="hotline-text">
                        <h3> LUCENA CITY FIRE STATION </h3>
                        <p> 0999 675 6455 <br> 042 797 2320 | 042 710 0110</p>
                    </div>
                </div>
        
                <div id="hotline3">
                    <img src="img/pnp.png">
                    <div class="hotline-text">
                        <h3> LUCENA CITY POLICE STATION </h3>
                        <p> 0997 065 8944 | 0998 598 5737 <br>042 373 7294 | 042 788 4626 </p>
                    </div>
                </div>
            </div>       
        </div>
    </div>
    

    <div id="divLatest">
        <h2> LATEST NEWS </h2>
        <hr>    
        <div id="headline">
            <img src="img/headline.jpg">
            <div class="headline-text">
                <h2> PHALGA Excellence | May 26, 2025 </h2>
                <p> The City Government of Lucena has once again received the 2025 PHALGA Excellence Award, thanks to the outstanding work of our City Accounting Office led by Ms. Ella Michelle T. Azagra. </p>
                <a href="https://www.facebook.com/share/p/16hHfxQPAL/"> Read More </a>
            </div>
        </div>

        <div id="lead">
            <div class="news-card">
                <img src="img/news1.jpg">
                <div class="lead-text">
                    <h3> Lucena West 1 shines in Jakarta! | May 26, 2025</h3>
                    <p> In Jakarta, Indonesia, the Lucena West 1 Colour Guard Team was among the best at the Tangerang Open Marching Competition. </p>
                    <a href="https://www.facebook.com/share/p/16XVLEbiW8/">Read More</a>
                </div>
            </div>

            <div class="news-card">
                <img src="img/news2.jpg">
                <div class="lead-text">
                    <h3> Bb. Pasayahan 2025 | May 26, 2025</h3>
                    <p> Kinoronahan bilang Binibining Pasayahan 2025 si Rueil Viana Montserrat ng Barangay Ibabang Dupay! </p>
                    <a href="https://www.facebook.com/share/p/16da2rfooj/">Read More</a>
                </div>
            </div>
        </div>
        <div id="lead">
            <div class="news-card">
                <img src="img/news3.png">
                <div class="lead-text">
                    <h3> Tagumpay ng Quezonian | May 25, 2025</h3>
                    <p> Isang malaking karangalan ang dala ng mga gurong Quezonian at unibersidad sa Quezon matapos mapasama sa topnotchers at top performing schools sa March 2025 LET. </p>
                    <a href="https://www.facebook.com/share/p/16dfGyDQ1u/">Read More</a>
                </div>
            </div>

            <div class="news-card">
                <img src="img/news4.jpg">
                <div class="lead-text">
                    <h3> Summer Job Fair | May 22   , 2025</h3>
                    <p> Umarangkada ang unang Summer Job Fair ng PESO Lucena noong May 22 sa SM City Lucena, pinangunahan ni City Administrator Jun Alcala at PESO OIC Acar Nacorda.</p>
                    <a href="https://www.facebook.com/share/p/16VuKzAwxk/">Read More</a>
                </div>
            </div>
        </div>        
    </div>
        
    <script src="home.js"></script>
    <script src="Navigation Bar/navigation.js"></script>

    <?php 
    include '../Footer/Footer.php';
    ?> 
