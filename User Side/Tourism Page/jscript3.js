function updateSpot(button, spot) {
    // Change active button style
    const buttons = document.querySelectorAll('.spot-btn');
    buttons.forEach(btn => btn.classList.remove('active'));
    button.classList.add('active');

    // Map iframe and description elements
    const mapFrame = document.getElementById('mapFrame');
    const descriptionBox = document.getElementById('spotdescription');

    // Define content for each spot
    if (spot === 'perez') {
        mapFrame.src = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3872.5010790663064!2d121.61036637509346!3d13.928743686481814!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd4b44422d08c5%3A0x1482b60eb68f69f8!2sLucena%20Perez%20Park!5e0!3m2!1sen!2sph!4v1750526322590!5m2!1sen!2sph';
        spotdescription.innerHTML = `
            <h1>Lucena Perez Park</h1>
            <p>Lucena Perez Park stands as a vibrant and inviting public space in Lucena City, Philippines, offering a delightful blend of natural beauty and community engagement. This park is renowned for its stunning surroundings, especially during the Christmas season when it is adorned with captivating lights and decorations that create a magical atmosphere. <br><br>Visitors appreciate the park's well-maintained paths, lined with lush trees and shrubs, which provide a serene environment for leisurely strolls or family gatherings. The park reflects a commitment to good governance, showcasing the local government's dedication to providing a clean and organized space for outdoor activities. With a variety of amenities and attractions, Lucena Perez Park caters to people of all ages, making it an ideal destination for families, students, and outdoor enthusiasts. <br><br>The park is particularly popular during events like the annual Niyugyugan Festival, which highlights the rich cultural heritage and local 
               products of Quezon Province. Additionally, the park's atmosphere is enhanced by the availability of street food vendors, ensuring visitors can enjoy tasty treats while exploring. Although the park is still undergoing improvements, its existing features, combined with a pleasant climate, make it a cherished locale for both locals and visitors seeking enjoyment and relaxation in nature.</p>
        `;
    } else if (spot === 'capitol') {
        mapFrame.src = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3872.4956009714174!2d121.61090397589692!3d13.929070493163017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd4b4445c377fb%3A0xac3db0d4fcf85c84!2sQuezon%20Provincial%20Capitol!5e0!3m2!1sen!2sph!4v1750526537776!5m2!1sen!2sph"';
        spotdescription.innerHTML = `
            <h1>Quezon Provincial Capitol</h1>
            <p>The Quezon Provincial Capitol (formerly known as the Tayabas Provincial Capitol), may be a familiar view for most of the Lucenahins. We see this building almost everyday especially if we are boarding a jeepney en route to “Kapitolyo”. <br><br> Not only that, it also serves as a “virtual alarm clock” for most of the residents here Lucena because of the familiar siren that we hear three times a day – at 7 in the morning, 12 noon and 5 in the afternoon. <br><br> With its contemporary looks today, one might not think that the Quezon Provincial Capitol is over a century year old. Constructed way back 1908 on a land donated by the then Gov. Filemon Perez, this building becomes a part of the everyday lives of every Lucenahins. Its Neoclassical Art-Deco style was designed by Architect Juan Arellano. <br><br> On the top of the Provincial Capitol Building, you will see 24 statues of men and women representing the different livelihood in the province.</p>
        `;
    } else if (spot === 'parish') {
        mapFrame.src = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3872.3800025972796!2d121.60973937589691!3d13.935964993001365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd4b5beb2054b5%3A0xadbb748070d256e7!2sSaint%20Ferdinand%20Cathedral%20Parish!5e0!3m2!1sen!2sph!4v1750527127845!5m2!1sen!2sph';
        spotdescription.innerHTML = `
            <h1>Saint Ferdinand  Cathedral Parish</h1>
            <p>Saint Ferdinand Cathedral, also known as Lucena Cathedral, is a Roman Catholic cathedral located in Lucena City, Quezon, Philippines. Established in 1881, the cathedral was constructed between 1882 and 1884, though it was destroyed by fire in 1887 and rebuilt later that year. <br><br> It serves as the seat of the Diocese of Lucena, which was established in 1950. The cathedral is situated along Quezon Avenue, making it a prominent landmark in the city. Over the years, it has undergone several renovations, maintaining its architectural beauty and serving as a central place of worship and community gathering.</p>
        `;
    }
}