<!DOCtype html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> City of Lucena </title>
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">

    <script type="text/javascript" src="about.js"></script>
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
        <h1>CITY OF LUCENA</h1>
        <br>
        <div class="navigation_link">
            <a href="../Home/index.php" class="home_link">Home</a> > <a class="news-link" href="../About Page/about.php">About Lucena</a>
        </div>
    </section>

    <section class="history">
        <div class="history-text">
            <img src="../Tourism Page/capitol.png" alt="Capitol Building">
            <div class="text-content">
                <h1>HISTORY</h1>
                <hr>
                <p>Lucena was first as "Buenavista" which means beautiful scenic spots. Later, the name "Buenavista" was changed to Oroquieta" in honor of the Spanish Governor-general Oroquieta. the place was called "Cotta" meaning strong port. Pursuant to an "Orden Real Super Civil" promulgated on November 5, 1879 the name Lucena was given to the community as tribute to the late Reverend Mariano Granja, a Jesuit prelate of the town of Lucena, Province of Andalucia, Spain. Before Lucena became a municipality on June 23,1880, it was a barrio of the town of Tayabas, then the capital of the Province of the Tayabas (now Quezon Province). <br><br> When the civil government was established in the Province of Tayabas on March 12,1901, Lucena was made the capital of the province. <br><br>During WWII Lucena experience some grim realities of war in the hands of the Japanese military forces. Fortunately, the city was not devastated by the war. <br><br>By virtue of Republic Act No. 3271 Lucena became a chartered city. Congressman Manuel S. Enverga of the first district of Quezon and Congressman Pascual Espinosa sponsored the bill creating the City of Lucena. It passed both houses of Congress on march 7, 1961. The city of Lucena was inagurated on August 19, 1962 on the occasion of the 84th Birth Anniversary of the late president Manuel L. Quezon Natural population growth and the tendency of the people to migrate in this place contributed to the event increasing population of the city. Today Lucena with approximately 278,924 people flourishes as a fast developing urban community.</p>
            </div>
        </div>
    </section>

    <section class="values">
        <div class="vision">
            <h1>VISION</h1>
            <hr>
            <p>The City of Lucena has a vision of becoming a premier City in Southern Tagalog providing sustainable development, creating opportunities for socio-economic, agro-industrial and technological growth, ensuring a peaceful and safe environment and improving the quality of life of its people.</p>
        </div>
        <div class="mission">
            <h1>MISSION</h1>
            <hr>
            <p>Its mission is to uphold honest and transparent governance, boost investment opportunities, improve the quality of health and education, create employment through establishment of technological and agro-industries, ensure protection and sustainability of the environment, and promote peace and order that will uplift the lucenahin's quality of life.</p>
        </div>
    </section>

    <nav class="nav-buttons">
        <button class="nav-btn active" onclick="switchSection(this, 'mayor')">The Mayor</button>
        <button class="nav-btn" onclick="switchSection(this, 'council')">City Council</button>
        <button class="nav-btn" onclick="switchSection(this, 'officials')">Barangay Officials</button>
        <button class="nav-btn" onclick="switchSection(this, 'barangays')">Barangays</button>
    </nav>

    <div class="content">
        <div id="mayor" class="section"><img src="cc/mayor.png">
            <div class="text-content">
                <h1>Mark Don Victor B. Alcala</h1>
                <p>Mark Don Victor B. Alcala is known in the political scene as Lucena City’s youngest mayor. Mark stepped into the political limelight at the age of 26, succeeding his father Roderick on May 9, 2022. Before taking the helm as mayor, Mark served as the Youth Ambassador for the Local Youth Development Council, and as an executive assistant for support services under the City Mayor’s Office. <br><br> His early contributions earned him recognition from the Department of Education Lucena City for his exemplary support and commendable service, as well as accolades from the Lucena GPTA Federation for his commitment to educational advancement. <br><br> Mark's administration has set records in amusement tax collections and consistently received high marks from the Commission on Audit. Honored by the Department of Trade and Industry as one of the top five most improved highly urbanized cities, Lucena’s ongoing transformation is driven by Mark's vision of a modern, inclusive city. His administration's mantra is "Boom Lucena!"—which he intends to be a fresh departure from traditional politics and a promising future for the city.</p>
            </div>
        </div>
        <div id="council" class="section hidden">
            <div class="vicem">
                <img src="cc/vicem.png" alt="Vice Mayor">
                <h3>Roderick "Dondon" Alcala</h3>
                <p>Vice Mayor</p>
            </div>

            <div class="council-members">
                <div class="member">
                    <img src="cc/c1.png" alt="Councilor 1">
                    <h3>Danilo B. Faller</h3>
                    <p>Councilor</p>
                </div>
                <div class="member">
                    <img src="cc/c2.png" alt="Councilor 2">
                    <h3>Amer Q. Lacerna</h3>
                    <p>Councilor</p>
                </div>
                <div class="member">
                    <img src="cc/c3.png" alt="Councilor 3">
                    <h3>Wilbert Mckinly Noche</h3>
                    <p>Councilor</p>
                </div>
                <div class="member">
                    <img src="cc/c4.png" alt="Councilor 4">
                    <h3>Patrick Nadera</h3>
                    <p>Councilor</p>
                </div>
                <div class="member">
                    <img src="cc/c5.png" alt="Councilor 5">
                    <h3>Baste Brizuela</h3>
                    <p>Councilor</p>
                </div>
                <div class="member">
                    <img src="cc/c6.png" alt="Councilor 6">
                    <h3>Jose Christian Ona</h3>
                    <p>Councilor</p>
                </div>
                <div class="member">
                    <img src="cc/c7.png" alt="Councilor 7">
                    <h3>Beth Sio</h3>
                    <p>Councilor</p>
                </div>
                <div class="member">
                    <img src="cc/c8.png" alt="Councilor 8">
                    <h3>Ayan Alcala</h3>
                    <p>Councilor</p>
                </div>
                <div class="member">
                    <img src="cc/c9.png" alt="Councilor 9">
                    <h3>Sunshine Abcede</h3>
                    <p>Councilor</p>
                </div>
                <div class="member">
                    <img src="cc/c10.png" alt="Councilor 10">
                    <h3>Edwin Pureza</h3>
                    <p>Councilor</p>
                </div>
            </div>
        </div>

        <div id="officials" class="section hidden">
            <div class="cmembers">
                <div class="captains">
                    <h2>HERMINIA HOLGADO ABUEL</h2>
                    <p>Punong Barangay</p>
                    <p>Barangay 1</p>
                </div>
                <div class="captains">
                    <h2>KENT RIGOR COLANTA ADVERSARIO</h2>
                    <p>Punong Barangay</p>
                    <p>Barra</p>
                </div>
                <div class="captains">
                    <h2>RAUL MACARAIG SORIANO</h2>
                    <p>Punong Barangay</p>
                    <p>Ransohan</p>
                </div>
                <div class="captains">
                    <h2>ENRICO ABUYAN DE LOS RIOS</h2>
                    <p>Punong Barangay</p>
                    <p>Barangay 2</p>
                </div>
                <div class="captains">
                    <h2>NELBERT UNTALAN ABANILLA</h2>
                    <p>Punong Barangay</p>
                    <p>Bocohan</p>
                </div>
                <div class="captains">
                    <h2>LUIS DIMAALA VIBAR</h2>
                    <p>Punong Barangay</p>
                    <p>Salinas</p>
                </div>
                <div class="captains">
                    <h2>TERESITA JAUDIAN LACORTE</h2>
                    <p>Punong Barangay</p>
                    <p>Barangay 3</p>
                </div>
                <div class="captains">
                    <h2>EDWIN VALENCIA CUETO</h2>
                    <p>Punong Barangay</p>
                    <p>Cotta</p>
                </div>
                <div class="captains">
                    <h2>RIEL ALIPOYO BRIONES</h2>
                    <p>Punong Barangay</p>
                    <p>Talao-Talao</p>
                </div>
                <div class="captains">
                    <h2>EDITHA SAN JUAN CARRUCAN</h2>
                    <p>Punong Barangay</p>
                    <p>Barangay 4</p>
                </div>
                <div class="captains">
                    <h2>RODERICK CASULLA MACINAS</h2>
                    <p>Punong Barangay</p>
                    <p>Dalahican</p>
                </div>
                <div class="captains">
                    <h2>BIRGILIO DE CASTRO GARCIA JR.</h2>
                    <p>Punong Barangay</p>
                    <p>Mayao Castillo</p>
                </div>
                <div class="captains">
                    <h2>EDUARD TAN SY BANG</h2>
                    <p>Punong Barangay</p>
                    <p>Barangay 5</p>
                </div>
                <div class="captains">
                    <h2>RUEL ABDON TRINIDAD</h2>
                    <p>Punong Barangay</p>
                    <p>Domoit</p>
                </div>
                <div class="captains">
                    <h2>ZOSIMO GERVES MACARAIG</h2>
                    <p>Punong Barangay</p>
                    <p>Mayao Crossing</p>
                </div>
                <div class="captains">
                    <h2>DENNIS VERGARA MORONG</h2>
                    <p>Punong Barangay</p>
                    <p>Barangay 6</p>
                </div>
                <div class="captains">
                    <h2>JOE MARK MACALA ALCANTARA</h2>
                    <p>Punong Barangay</p>
                    <p>Gulang-Gulang</p>
                </div>
                <div class="captains">
                    <h2>ADELA RAMOS MAAÑO</h2>
                    <p>Punong Barangay</p>
                    <p>Mayao Kanluran</p>
                </div>
                <div class="captains">
                    <h2>CLIPTON ATENTAR DIZON</h2>
                    <p>Punong Barangay</p>
                    <p>Barangay 7</p>
                </div>
                <div class="captains">
                    <h2>BENITO CAPILI AMAZONA</h2>
                    <p>Punong Barangay</p>
                    <p>Ibabang Dupay</p>
                </div>
                <div class="captains">
                    <h2>EVELYN DALIDA RAMOS</h2>
                    <p>Punong Barangay</p>
                    <p>Mayao Parada</p>
                </div>
                <div class="captains">
                    <h2>SAYMON FRANCIS REBOLLA DY</h2>
                    <p>Punong Barangay</p>
                    <p>Barangay 8</p>
                </div>
                <div class="captains">
                    <h2>GINA TENORIO SARES</h2>
                    <p>Punong Barangay</p>
                    <p>Ibabang Iyam</p>
                </div>
                <div class="captains">
                    <h2>RICARDO JAVA LAFUENTE</h2>
                    <p>Punong Barangay</p>
                    <p>Mayao Silangan</p>
                </div>
                <div class="captains">
                    <h2>GODISON GUNDA DIMACULANGAN</h2>
                    <p>Punong Barangay</p>
                    <p>Barangay 9</p>
                </div>
                <div class="captains">
                    <h2>MARY ANN EMBRADURA ZETA</h2>
                    <p>Punong Barangay</p>
                    <p>Ibabang Talim</p>
                </div>
                <div class="captains">
                    <h2>ARMELITO SALAMILLAS ROBLES</h2>
                    <p>Punong Barangay</p>
                    <p>Isabang</p>
                </div>
                <div class="captains">
                    <h2>ANGELITO POBLETE MALIGALIG</h2>
                    <p>Punong Barangay</p>
                    <p>Barangay 10</p>
                </div>
                <div class="captains">
                    <h2>ALEX MAAÑO ABADILLA</h2>
                    <p>Punong Barangay</p>
                    <p>Ilayang Dupay</p>
                </div>
                <div class="captains">
                    <h2>JOVEN ZOLETA GUNDAY</h2>
                    <p>Punong Barangay</p>
                    <p>Market View</p>
                </div>
                <div class="captains">
                    <h2>PETER PAUL FRANCIS NIEVA DALEON</h2>
                    <p>Punong Barangay</p>
                    <p>Barangay 11</p>
                </div>
                <div class="captains">
                    <h2>BARTOLOME MANALO COMIA</h2>
                    <p>Punong Barangay</p>
                    <p>Ilayang Iyam</p>
                </div>
                <div class="captains">
                    <h2>LUIS DIMAALA VIBAR</h2>
                    <p>Punong Barangay</p>
                    <p>Salinas</p>
                </div>
            </div>
        </div>

        <div id="barangays" class="section hidden">
            <div class="map">
                <iframe id="mapFrame" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46603.71830411276!2d121.5986100946747!3d13.935170692870411!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd4b578caf4ccd%3A0x2be1e905c862fe1!2sLucena%20City%2C%20Quezon!5e1!3m2!1sen!2sph!4v1750610816953!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="barangay-list">
                <h2>CITY BARANGAYS</h2>
                <button onclick="updateMap('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4805.029065499614!2d121.60513907589723!3d13.943209792831603!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd4b5929924459%3A0x5fc3fb3c72e9a63f!2s1%20(Pob.)%2C%20Lucena%20City%2C%204301%20Quezon!5e1!3m2!1sen!2sph!4v1750604449020!5m2!1sen!2sph')">barangay 1</button>
                <button onclick="updateMap('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4800.078738296043!2d121.61126347595133!3d13.938801486472864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd4b5908f32d4d%3A0x4fc18e53bd3e5b08!2sBRGY.%202!5e1!3m2!1sen!2sph!4v1750604619627!5m2!1sen!2sph')">barangay 2</button>
                <button onclick="updateMap('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4805.125266721201!2d121.60305258536754!3d13.938588708079346!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd4b5c1c8c9137%3A0x21f3c960368abced!2s3%20(Pob.)%2C%20Lucena%20City%2C%204301%20Quezon!5e1!3m2!1sen!2sph!4v1750604746388!5m2!1sen!2sph')">barangay 3</button>
                <button onclick="updateMap('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2402.5780744808985!2d121.61435155669498!3d13.93710494224637!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd4b00338969db%3A0xb89dda166b9157b2!2sBarangay%204!5e1!3m2!1sen!2sph!4v1750604817774!5m2!1sen!2sph')">barangay 4</button>
                <button onclick="updateMap('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4805.174218387862!2d121.60309803536741!3d13.936236708139903!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd4b5c6fe49ca3%3A0x5c0cb8fbb3870bdf!2s5%20(Pob.)%2C%20Lucena%20City%2C%204301%20Quezon!5e1!3m2!1sen!2sph!4v1750604876181!5m2!1sen!2sph')">barangay 5</button>
                <button onclick="updateMap('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2402.6024108626802!2d121.61240808881074!3d13.934766099893935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd4b5a5883a353%3A0x470dddb48b073cf2!2s6%20(Pob.)%2C%20Lucena%20City%2C%204301%20Quezon!5e1!3m2!1sen!2sph!4v1750604911681!5m2!1sen!2sph')">barangay 6</button>
                <button onclick="updateMap('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2402.6143017268264!2d121.60580399844959!3d13.933623191194808!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd4b5ca77f2375%3A0x3f9adb1f4d259f34!2s7%20(Pob.)%2C%20Lucena%20City%2C%204301%20Quezon!5e1!3m2!1sen!2sph!4v1750604959207!5m2!1sen!2sph')">barangay 7</button>
                <button onclick="updateMap('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4805.293924538116!2d121.60526029678952!3d13.930483500000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd4bee0b962b2b%3A0x4390c3d78348b18b!2sBrgy%208%20Basketball%20Court!5e1!3m2!1sen!2sph!4v1750605016079!5m2!1sen!2sph')">barangay 8</button>
                <button onclick="updateMap('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9610.514672515808!2d121.60482417458972!3d13.932242219763042!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd4b454f6521f1%3A0xd63faed2e14136b4!2s9%20(Pob.)%2C%20Lucena%20City%2C%204301%20Quezon!5e1!3m2!1sen!2sph!4v1750605035922!5m2!1sen!2sph')">barangay 9</button>
                <button onclick="updateMap('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4805.32092007555!2d121.6126951258969!3d13.92918574316031!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd4b4588e0648b%3A0xd336430d8288be88!2s10%20(Pob.)%2C%20Lucena%20City%2C%204301%20Quezon!5e1!3m2!1sen!2sph!4v1750605060996!5m2!1sen!2sph')">barangay 10</button>
                <button onclick="updateMap('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9609.92175199672!2d121.60483924489405!3d13.946484408455305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd4ca13f7d4fa1%3A0xc86b0202d90bc5ec!2s11%20(Pob.)%2C%20Lucena%20City%2C%204301%20Quezon!5e1!3m2!1sen!2sph!4v1750605089536!5m2!1sen!2sph')">barangay 11</button>
                <button onclick="updateMap('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9611.825373066984!2d121.60282009489231!3d13.900707910681408!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd4adf75fcfc1b%3A0xdd603526ed30c651!2sBarra%2C%20Lucena%20City%2C%204301%20Quezon!5e1!3m2!1sen!2sph!4v1750605136814!5m2!1sen!2sph')">Barra</button>
                <button onclick="updateMap('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19218.93445634286!2d121.58086431217242!3d13.957392607552357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd4c85751448f5%3A0xa33413326bfe2d75!2sBocohan%2C%20Lucena%20City%2C%204301%20Quezon!5e1!3m2!1sen!2sph!4v1750605166794!5m2!1sen!2sph')">Bocohan</button>
                <button onclick="updateMap('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9611.06142237816!2d121.60660764489299!3d13.91909640978801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd4b3928dc387d%3A0x2ccaa21c0168ba41!2sCotta%2C%20Lucena%20City%2C%204301%20Quezon!5e1!3m2!1sen!2sph!4v1750605186901!5m2!1sen!2sph')">Cotta</button>
                <button onclick="updateMap('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19223.468376506487!2d121.59845051443766!3d13.902904006769004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd4b2f7d565b27%3A0x410194e6e61f49!2sDalahican%2C%20Lucena%20City%2C%204301%20Quezon!5e1!3m2!1sen!2sph!4v1750605209256!5m2!1sen!2sph')">Dalahican</button>
                <button onclick="updateMap('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19217.908005916808!2d121.58629276217458!3d13.969699556264475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd4cedd22bee8f%3A0x3cbcc8b54a213a91!2sDomoit%2C%20Lucena%20City%2C%20Quezon!5e1!3m2!1sen!2sph!4v1750605227602!5m2!1sen!2sph')">Domoit</button>
                <button onclick="updateMap('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19218.060307815547!2d121.59789681217423!3d13.967874156455569!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd4cbe91b6a44f%3A0xc13cdae3150cb620!2sGulang-gulang%2C%20Lucena%20City%2C%204301%20Quezon!5e1!3m2!1sen!2sph!4v1750605241780!5m2!1sen!2sph')">Gulang-Gulang</button>
                <button onclick="updateMap('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9609.965049878918!2d121.62250859489416!3d13.945444858505915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd4cb376794d49%3A0x8df77d522bb13721!2sIbabang%20Dupay%2C%20Lucena%20City%2C%204301%20Quezon!5e1!3m2!1sen!2sph!4v1750605265695!5m2!1sen!2sph')">Ibabang Dupay</button>
                <button onclick="updateMap('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d38444.36463996374!2d121.554912989113!3d13.918381062900096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd4b0e1e88befd%3A0x857e66a330437d1a!2sIbabang%20Iyam%2C%20Lucena%20City%2C%204301%20Quezon!5e1!3m2!1sen!2sph!4v1750605284073!5m2!1sen!2sph')">Ibabang Iyam</button>
                <button onclick="updateMap('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19221.90958623697!2d121.5682493121664!3d13.921661111286339!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd4ba1351efaf1%3A0x19b6255b0acd605!2sIbabang%20Talim%2C%20Lucena%20City%2C%20Quezon!5e1!3m2!1sen!2sph!4v1750605303556!5m2!1sen!2sph')">Ibabang Talim</button>
                <button onclick="updateMap('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d38435.5443698439!2d121.5980094637484!3d13.97132722860266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd4ccfc399c49b%3A0x18bd94d41e8ed283!2sIlayang%20Dupay%2C%20Lucena%20City%2C%20Quezon!5e1!3m2!1sen!2sph!4v1750605324407!5m2!1sen!2sph')">Ilayang Dupay</button>
                <button onclick="updateMap('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9610.237101658737!2d121.59339469489385!3d13.938911358824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd4b6119f562e1%3A0x70825520c9c57c5b!2sIlayang%20Iyam%2C%20Lucena%20City%2C%204301%20Quezon!5e1!3m2!1sen!2sph!4v1750605342393!5m2!1sen!2sph')">Ilayang Iyam</button>
                <button onclick="updateMap('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19224.066376678118!2d121.57728276216193!3d13.895701613994248!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd4af9edeb0f8f%3A0xbf27750a5ef08502!2sRansohan%2C%20Lucena%20City%2C%20Quezon!5e1!3m2!1sen!2sph!4v1750605367684!5m2!1sen!2sph')">Ransohan</button>
                <button onclick="updateMap('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19222.983797143756!2d121.57547481216415!3d13.90873766263495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd4b011e97a851%3A0x53b6acda212fd96a!2sSalinas%2C%20Lucena%20City%2C%20Quezon!5e1!3m2!1sen!2sph!4v1750605388223!5m2!1sen!2sph')">Salinas</button>
                <button onclick="updateMap('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19222.615560484217!2d121.63058581216488!3d13.913169112172628!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a2b4c60dbfcf65%3A0xec9abb015c43268!2sTalao-talao%2C%20Lucena%20City%2C%204301%20Quezon!5e1!3m2!1sen!2sph!4v1750605413954!5m2!1sen!2sph')">Talao-Talao</button>
                <button onclick="updateMap('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19221.177977257037!2d121.66248826216786!3d13.930456110367965!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a2b486a6160857%3A0xd322c45a1fb283a0!2sMayao%20Castillo%2C%20Lucena%20City%2C%204301%20Quezon!5e1!3m2!1sen!2sph!4v1750605437533!5m2!1sen!2sph')">Mayao Castillo</button>
                <button onclick="updateMap('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19221.426666976164!2d121.61558931216744!3d13.927467110680144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd4b4cb8d5cc7f%3A0x840fc1dce43b51e6!2sMayao%20Crossing%2C%20Lucena%20City%2C%204301%20Quezon!5e1!3m2!1sen!2sph!4v1750605458512!5m2!1sen!2sph')">Mayao Crossing</button>
                <button onclick="updateMap('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19218.1275125217!2d121.62224186217408!3d13.967068606539875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a2b333b7ce187d%3A0x355dd57a2766e595!2sMayao%20Kanluran%2C%20Lucena%20City%2C%20Quezon!5e1!3m2!1sen!2sph!4v1750605485460!5m2!1sen!2sph')">Mayao Kanluran</button>
                <button onclick="updateMap('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19221.64997304663!2d121.6336676621669!3d13.924782660960446!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a2b4bb94c74559%3A0xa207ecac9d0f0088!2sMayao%20Parada%2C%20Lucena%20City%2C%204301%20Quezon!5e1!3m2!1sen!2sph!4v1750605504398!5m2!1sen!2sph')">Mayao Parada</button>
                <button onclick="updateMap('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d38437.8187345202!2d121.61069238934653!3d13.957693547769525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a2b342140e646b%3A0xd9e70e1430abaadb!2sMayao%20Silangan%2C%20Lucena%20City%2C%204301%20Quezon!5e1!3m2!1sen!2sph!4v1750605524849!5m2!1sen!2sph')">Mayao Silangan</button>
                <button onclick="updateMap('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19219.56384781273!2d121.57081026217116!3d13.949841058342166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd4c7e49b25dad%3A0x831e515c3da56e2e!2sIsabang%2C%20Lucena%20City%2C%20Quezon!5e1!3m2!1sen!2sph!4v1750605551092!5m2!1sen!2sph')">Isabang</button>
                <button onclick="updateMap('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9610.35492767635!2d121.61383859489356!3d13.936080758961788!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd4b51034bfd45%3A0xba803204ed20f0d7!2sMarket%20View%2C%20Lucena%20City%2C%204301%20Quezon!5e1!3m2!1sen!2sph!4v1750605577047!5m2!1sen!2sph')">Market View</button>
                <button onclick="updateMap('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19220.26231283402!2d121.56162176216975!3d13.941456059218714!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd4b858df02553%3A0x1a80379ab1fc4d5!2sIlayang%20Talim%2C%20Lucena%20City%2C%20Quezon!5e1!3m2!1sen!2sph!4v1750605606803!5m2!1sen!2sph')">Ilayang Talim</button>
            </div>
        </div>

    </div>

    <script src="../Navigation Bar/navigation.js"></script>

    <?php
    include '../Footer/Footer.php';
    ?>