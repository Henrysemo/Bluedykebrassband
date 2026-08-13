<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Dyke Brass Band |Brass Band in Eldoret,Kenya</title>
    <link rel="icon" type="image/ico" href="assets/favicon/favicon.ico">
    
    <meta name="description"
        content="Blue Dyke Brass Band is a brass band based in Eldoret, Kenya, providing live music for weddings, church services, concerts, parades, graduations and community events.">
    <meta name="author" content="Blue Dyke Brass Band">
    <meta name="language" content="English">
    <meta name="revisit-after" content="7 days">
    <meta name="keywords"
        content="Blue Dyke Brassband, brass band Eldoret, brass performance Kenya, wedding band Eldoret, church brass band">
    <meta name="author" content="Blue Dyke Brassband">
    <meta name="robots" content="index, follow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/futura-bk" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="canonical" href="https://bluedykebrassband.onrender.com/">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Blue Dyke Brass Band">
    <meta property="og:title" content="Blue Dyke Brass Band | Brass Band in Eldoret, Kenya">
    <meta property="og:description"
        content="Blue Dyke Brass Band is a brass band based in Eldoret, Kenya, providing live music for weddings, church services, concerts, parades, graduations and community events.">
    <meta property="og:url" content="https://bluedykebrassband.onrender.com/">
    <meta property="og:image" content="https://bluedykebrassband.onrender.com/assets/images/Gate.jpeg">
    <meta property="og:image:alt" content="Blue Dyke Brass Band in Eldoret, Kenya">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Blue Dyke Brass Band | Brass Band in Eldoret, Kenya">
    <meta name="twitter:description"
        content="Blue Dyke Brass Band provides live brass music for weddings, church services, concerts, parades, graduations and community events in Eldoret and across Kenya.">
    <meta name="twitter:image" content="https://bluedykebrassband.onrender.com/assets/images/Gate.jpeg">

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "MusicGroup",
        "name": "Blue Dyke Brass Band",
        "alternateName": "Blue Dyke Brassband",
        "url": "https://bluedykebrassband.onrender.com/",
        "logo": "https://bluedykebrassband.onrender.com/assets/images/logo.png",
        "image": "https://bluedykebrassband.onrender.com/assets/images/Gate.jpeg",
        "description": "Blue Dyke Brass Band is a brass band based in Eldoret, Kenya, providing live music for weddings, church services, concerts, parades, graduations and community events.",
        "genre": [
            "Brass Band",
            "Brass Music",
            "Live Music"
        ],
        "location": {
            "@type": "Place",
            "name": "Eldoret, Kenya",
            "address": {
                "@type": "PostalAddress",
                "addressLocality": "Eldoret",
                "addressCountry": "KE"
            }
        },
        "sameAs": [
            "https://www.facebook.com/profile.php?id=61593338960381",
            "https://www.instagram.com/bluedykebrassband",
            "https://youtube.com/@bluedykebrassband",
            "https://www.tiktok.com/@bluedykebrassband"
        ]
    }
    </script>
</head>

<body>
    <?php
    $contactStatus = '';
    $contactMessage = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_name'])) {
        $to = 'bluedykebrass@gmail.com';
        $name = trim($_POST['contact_name'] ?? '');
        $email = trim($_POST['contact_email'] ?? '');
        $subject = trim($_POST['contact_subject'] ?? '');
        $messageText = trim($_POST['contact_message'] ?? '');

        if ($name === '' || $email === '' || $messageText === '') {
            $contactStatus = 'error';
            $contactMessage = 'Please fill in your name, email address, and message before sending.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $contactStatus = 'error';
            $contactMessage = 'Please provide a valid email address.';
        } else {
            $subjectLine = $subject !== '' ? $subject : 'New message from Blue Dyke Brassband website';
            $body = "<h3>New message from Blue Dyke Brassband website</h3>"
                . "<p><strong>Name:</strong> " . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . "</p>"
                . "<p><strong>Email:</strong> " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "</p>"
                . "<p><strong>Subject:</strong> " . htmlspecialchars($subjectLine, ENT_QUOTES, 'UTF-8') . "</p>"
                . "<p><strong>Message:</strong><br>" . nl2br(htmlspecialchars($messageText, ENT_QUOTES, 'UTF-8')) . "</p>";

            $headers = [];
            $headers[] = 'From: ' . $name . ' <' . $email . '>';
            $headers[] = 'Reply-To: ' . $email;
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-Type: text/html; charset=UTF-8';

            if (mail($to, $subjectLine, $body, implode("\r\n", $headers))) {
                $contactStatus = 'success';
                $contactMessage = 'Thank you! Your message has been sent successfully.';
            } else {
                $contactStatus = 'error';
                $contactMessage = 'Sorry, your message could not be sent right now. Please try again later.';
            }
        }
    }
    ?>
    <header class="navbar">
        <div class="container nav-wrapper">
            <a href="#home" class="brand">
                <span class="brand-mark">
                    <img src="assets/images/logo.png" alt="Brass Band Logo">
                </span>
                <span>
                    <strong>Blue Dyke Brass Band</strong>
                    <small>Eldoret · Kenya · Making Moments Musical</small>
                </span>
            </a>
            <button class="hamburger" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <nav class="nav-menu">
                <a href="#home">Home</a>
                <a href="#about">About</a>
                <a href="#events">Events</a>
                <a href="#repertoire">Repertoire</a>
                <a href="#gallery">Gallery</a>
                <a href="#join">Join</a>
                <a href="#book">Book</a>
                <a href="#contact">Contact</a>
            </nav>
        </div>
    </header>

    <main>
        <?php
        $galleryRoot = __DIR__ . '/assets/images/gallery';
        $galleryImages = [];

        if (is_dir($galleryRoot)) {
            $iterator = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($galleryRoot, FilesystemIterator::SKIP_DOTS)
            );

            foreach ($iterator as $fileInfo) {
                if (!$fileInfo->isFile()) {
                    continue;
                }

                $extension = strtolower($fileInfo->getExtension());
                if (!in_array($extension, ['jpg', 'jpeg', 'png', 'webp', 'gif', 'avif'])) {
                    continue;
                }

                $absolutePath = str_replace('\\', '/', $fileInfo->getPathname());
                $rootPath = str_replace('\\', '/', __DIR__);
                $relativePath = ltrim(str_replace($rootPath . '/', '', $absolutePath), '/');
                $galleryImages[] = $relativePath;
            }

            sort($galleryImages);
        }
        ?>
        <section class="hero" id="home">
            <div class="container">
                <div class="hero-inner">
                    <!--LEFT COLUMN-->
                    <div class="hero-copy">
                        <p class="eyebrow">Blue Dyke Brassband · Eldoret</p>
                        <h1>Blue Dyke Brass Band</h1>
                        <p class="hero-tagline">Making Moments Musical</p>
                        <p class="hero-text"> Blue Dyke Brass Band is a brass band based in Eldoret, Kenya,
                            delivering live music and uplifting
                            performances for
                            concerts, parades, church services, weddings and community celebrations.We are your gateway
                            to
                            brass brilliance,</p>
                        <div class="hero-actions">
                            <a href="#book" class="btn btn-primary">Book the Band</a>
                            <a href="#events" class="btn btn-secondary">View Upcoming Events</a>
                        </div>
                        <div class="hero-stats">

                            <div class="stat-card">
                                <i class="fas fa-award"></i>
                                <h3>7+</h3>
                                <p>Years of Excellence</p>
                            </div>

                            <div class="stat-card">
                                <i class="fas fa-music"></i>
                                <h3>250+</h3>
                                <p>Awesome Performances</p>
                            </div>

                            <div class="stat-card">
                                <i class="fas fa-users"></i>
                                <h3>40+</h3>
                                <p>Active Members</p>
                            </div>

                            <div class="stat-card">
                                <i class="fas fa-drum"></i>
                                <h3>40+</h3>
                                <p>Brass Instruments</p>
                            </div>

                        </div>
                    </div>
                    <!--Right Column-->
                    <div class="hero-panel">

                        <div class="photo-stack">
                            <!--Back photo-->
                            <div class="photo-card back-photo">
                                <img src="assets/images/sample 1.jpeg"
                                    alt="Blue Dyke Brass Band performing during a parade in Kenya">
                                <span class="photo-tag">
                                    <i class="fas fa-drum"></i> Events
                                </span>
                            </div>
                            <!--Middle photo-->
                            <div class="photo-card middle-photo">
                                <img src="assets/images/logo.png" alt="Blue Dyke Brass Band logo">
                                <span class="photo-tag">
                                    <i class="fas fa-church"></i> Logo
                                </span>
                            </div>
                            <!--Front photo-->
                            <div class="photo-card front-photo">

                                <img src="assets/images/Gate.jpeg" alt="Blue Dyke Brass Band in Eldoret, Kenya">

                                <div class="overlay"></div>
                                <div class="hero-photo-info">

                                    <h3>Blue Dyke Brass Band</h3>

                                    <p>Making Moments Musical</p>

                                    <span>
                                        <i class="fas fa-location-dot"></i>
                                        Eldoret, Kenya
                                    </span>

                                </div>

                                <span class="photo-tag">
                                    <i class="fas fa-music"></i> Home
                                </span>

                            </div>

                        </div>
                    </div>

                </div>
                <!--FULL WIDTH CARDS-->
                <div class="hero-highlights">

                    <!-- Card 1 -->

                    <article class="highlight-card event1-card">

                        <div class="highlight-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>

                        <span class="highlight-label">NEXT EVENT</span>

                        <h3>A Symphony Of Praise Concert</h3>

                        <p>22-23rd August • The Salvation Army Nakuru Citadel</p>

                        <a href="#events" class="highlight-link">
                            Learn More
                            <i class="fas fa-arrow-right"></i>
                        </a>

                    </article>

                    <!-- Card 2 -->

                    <article class="highlight-card services-card">

                        <div class="highlight-icon">
                            <i class="fas fa-music"></i>
                        </div>

                        <span class="highlight-label">OUR SERVICES</span>

                        <h3>Music For Every Occasion</h3>

                        <p>Weddings, church services, parades & concerts.</p>

                        <a href="#services" class="highlight-link">
                            Explore Services
                            <i class="fas fa-arrow-right"></i>
                        </a>

                    </article>

                    <!-- Card 3 -->

                    <article class="highlight-card choose-card">

                        <div class="highlight-icon">
                            <i class="fas fa-star"></i>
                        </div>

                        <span class="highlight-label">WHY CHOOSE US</span>

                        <h3>Making Moments Musical</h3>

                        <p>Professional performances that leave lasting memories.</p>

                        <a href="#about" class="highlight-link">
                            Discover More
                            <i class="fas fa-arrow-right"></i>
                        </a>

                    </article>

                </div>
            </div>

        </section>

        <section class="about section" id="about">
            <div class="section-watermark">
                <i class="fas fa-trumpet"></i>
            </div>
            <div class="container">
                <div class="section-heading">
                    <p class="eyebrow">
                        Who We Are
                    </p>
                    <h2 class="section-title">
                        About Blue Dyke Brass Band
                    </h2>

                    <p class="section-subtitle">
                           <strong>Blue Dyke Brass Band</strong> is a brass band based in
    <strong>Eldoret, Kenya</strong>, bringing powerful live brass music
    to weddings, church services, concerts, parades, graduations,
    community celebrations and other special events.
                    </p>
                </div>
                <div class="about-grid">

                    <!-- Left Side -->

                    <div class="about-image">

                        <img src="assets/images/logo.png" alt="Blue Dyke Brass Band">

                    </div>

                    <!-- Right Side -->

                    <div class="about-content">

                        <h3>
                            Making Moments Musical
                        </h3>

                        <p>

                            Blue Dyke Brass Band is a community-based brass ensemble dedicated
                            to enriching lives through exceptional musical performances. From
                            church services and weddings to parades, concerts and civic events,
                            we strive to create memorable experiences that inspire audiences
                            and celebrate the power of music.

                        </p>
                        <p>
    Our goal is to make every occasion memorable through energetic,
    uplifting and professional brass performances. From community
    celebrations and church services to major concerts and public
    events, Blue Dyke Brass Band brings people together through music.
</p>


                        <div class="about-stats">

                            <div>

                                <h3>7+</h3>

                                <p>Service Years</p>

                            </div>

                            <div>

                                <h3>250+</h3>

                                <p>Performances Delivered</p>

                            </div>

                            <div>

                                <h3>40+</h3>

                                <p>Dedicated Members</p>

                            </div>

                            <div>

                                <h3>100%</h3>

                                <p>Passion for Music</p>

                            </div>
                        </div>
                        <div class="about-values">

                            <div class="value-card">

                                <div class="value-icon">
                                    <i class="fas fa-bullseye"></i>
                                </div>

                                <h3>Our Mission</h3>

                                <p>
                                    To inspire and unite communities through uplifting brass music and exceptional
                                    performances.
                                </p>

                            </div>

                            <div class="value-card">

                                <div class="value-icon">
                                    <i class="fas fa-eye"></i>
                                </div>

                                <h3>Our Vision</h3>

                                <p>
                                    To become one of Kenya's leading brass bands recognized for excellence and
                                    service.
                                </p>

                            </div>

                            <div class="value-card">

                                <div class="value-icon">
                                    <i class="fas fa-star"></i>
                                </div>

                                <h3>Core Values</h3>

                                <p>
                                    Excellence, Discipline, Teamwork, Integrity and Community Service.
                                </p>

                            </div>
                        </div>

                    </div>


                </div>

            </div>

        </section>

        <section class="section" id="members">
            <div class="container">
                <div class="section-heading">
                    <p class="eyebrow">Blue Dyke Family</p>
                    <h2>Meet the team behind the sound</h2>
                    <p>Passion, discipline and excellence come together through every musician in our band.</p>
                </div>
                <div class="members-grid">
                    <div class="card member-card cornet-card"
                        style="background-image: linear-gradient(135deg, rgba(6, 6, 6, 0.9), rgba(2, 2, 2, 0.8)), url('assets/images/cornet.jpg'); background-size: cover; background-position: center;">
                        <div class="member-avatar"><img src="assets/images/Member Images/Sila.jpeg"
                                alt="BM Silah Kihusa"></div>
                        <h3>BM Silah Kihusa</h3>
                        <p class="member-aka">AKA-Sila</p>
                        <p class="member-instrument">Solo Cornet</p>
                        <p class="member-about">Leads rehearsals and shapes the band’s musical direction
                            with passion
                            and discipline.</p>
                        <div class="member-social">
                            <a href="https://www.facebook.com/profile.php?id=61593338960381" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>

                            <a href="https://youtube.com/@bluedykebrassband" target="_blank" rel="noopener noreferrer"
                                aria-label="Blue Dyke Brass Band on YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>

                            <a href="https://www.tiktok.com/@bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on TikTok">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card member-card euphonium-card"
                        style="background-image: linear-gradient(135deg,rgba(6, 6, 6, 0.9), rgba(2, 2, 2, 0.8)), url('assets/images/euphonium.jpeg'); background-size: cover; background-position: center;">
                        <div class="member-avatar"><img src="assets/images/Member Images/Alex.jpeg"
                                alt="DBM Alex Mkoyani"></div>

                        <h3>DBM Alex Mkoyani</h3>
                        <p class="member-aka">AKA-Aleko</p>
                        <p class="member-instrument">Euphoniumist</p>
                        <p class="member-about">Guides brass sections with focus, precision and artistry
                            during practice
                            and performance.</p>
                        <div class="member-social">
                            <a href="https://www.facebook.com/profile.php?id=61593338960381" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>

                            <a href="https://youtube.com/@bluedykebrassband" target="_blank" rel="noopener noreferrer"
                                aria-label="Blue Dyke Brass Band on YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>

                            <a href="https://www.tiktok.com/@bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on TikTok">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card member-card tuba-card"
                        style="background-image: linear-gradient(135deg, rgba(6, 6, 6, 0.9), rgba(2, 2, 2, 0.8)), url('assets/images/tuba.jpg'); background-size: cover; background-position: center;">
                        <div class="member-avatar"><img src="assets/images/Member Images/Kabitoh.jpg"
                                alt="Fortune Henry"></div>

                        <h3>Fortune Henry</h3>
                        <p class="member-aka">AKA-Kabitoh</p>
                        <p class="member-instrument">Tubist</p>
                        <p class="member-about">Adds expressive, lyrical tones that bring elegance to every
                            arrangement.
                        </p>
                        <div class="member-social">
                            <a href="https://www.facebook.com/profile.php?id=61593338960381" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>

                            <a href="https://youtube.com/@bluedykebrassband" target="_blank" rel="noopener noreferrer"
                                aria-label="Blue Dyke Brass Band on YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>

                            <a href="https://www.tiktok.com/@bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on TikTok">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card member-card tuba-card"
                        style="background-image: linear-gradient(135deg, rgba(6, 6, 6, 0.9), rgba(2, 2, 2, 0.8)), url('assets/images/tuba.jpg'); background-size: cover; background-position: center;">
                        <div class="member-avatar"><img src="assets/images/Member Images/Fabu.jpg"
                                alt="Fabregas Mahiji"></div>
                        <h3>Fabregas Mahiji</h3>
                        <p class="member-aka">AKA-Fabu</p>
                        <p class="member-instrument">Tubist</p>
                        <p class="member-about">Balances the ensemble with warm harmony and a steady,
                            musical presence.
                        </p>
                        <div class="member-social">
                            <a href="https://www.facebook.com/profile.php?id=61593338960381" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>

                            <a href="https://youtube.com/@bluedykebrassband" target="_blank" rel="noopener noreferrer"
                                aria-label="Blue Dyke Brass Band on YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>

                            <a href="https://www.tiktok.com/@bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on TikTok">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card member-card tuba-card"
                        style="background-image: linear-gradient(135deg, rgba(6, 6, 6, 0.9), rgba(2, 2, 2, 0.8)), url('assets/images/tuba.jpg'); background-size: cover; background-position: center;">
                        <div class="member-avatar"><img src="assets/images/Member Images/Charity.jpeg" alt="Charity">
                        </div>

                        <h3>Charity</h3>
                        <p class="member-aka">AKA-Charii</p>
                        <p class="member-instrument">Tubist</p>
                        <p class="member-about">Balances the ensemble with warm harmony and a steady,
                            musical presence.
                        </p>
                        <div class="member-social">
                            <a href="https://www.facebook.com/profile.php?id=61593338960381" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>

                            <a href="https://youtube.com/@bluedykebrassband" target="_blank" rel="noopener noreferrer"
                                aria-label="Blue Dyke Brass Band on YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>

                            <a href="https://www.tiktok.com/@bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on TikTok">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card member-card euphonium-card"
                        style="background-image: linear-gradient(135deg, rgba(6, 6, 6, 0.9), rgba(2, 2, 2, 0.8)), url('assets/images/euphonium.jpeg'); background-size: cover; background-position: center;">
                        <div class="member-avatar"><img src="assets/images/Member Images/Tileh.jpg" alt="Henry Semo">
                        </div>

                        <h3>Henry Semo</h3>
                        <p class="member-aka">AKA-Tileh</p>
                        <p class="member-instrument">Solo Euphonium</p>
                        <p class="member-about">Supports expressive passages and keeps the ensemble sounding
                            polished
                            and balanced.</p>
                        <div class="member-social">
                            <a href="https://www.facebook.com/profile.php?id=61593338960381" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>

                            <a href="https://youtube.com/@bluedykebrassband" target="_blank" rel="noopener noreferrer"
                                aria-label="Blue Dyke Brass Band on YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>

                            <a href="https://www.tiktok.com/@bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on TikTok">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card member-card trombone-card"
                        style="background-image: linear-gradient(135deg, rgba(6, 6, 6, 0.9), rgba(2, 2, 2, 0.8)), url('assets/images/Bass\ trombone.jpg'); background-size: cover; background-position: center;">
                        <div class="member-avatar"><img src="assets/images/Member Images/Tata.jpeg" alt="Shadrack Tata">
                        </div>

                        <h3>Shadrack Tata</h3>
                        <p class="member-aka">AKA Tata</p>
                        <p class="member-instrument">Bass Trombonist</p>
                        <p class="member-about">Provides grounding rhythm and a firm foundation that keeps
                            the band
                            grounded.</p>
                        <div class="member-social">
                            <a href="https://www.facebook.com/profile.php?id=61593338960381" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>

                            <a href="https://youtube.com/@bluedykebrassband" target="_blank" rel="noopener noreferrer"
                                aria-label="Blue Dyke Brass Band on YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>

                            <a href="https://www.tiktok.com/@bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on TikTok">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card member-card trombone-card"
                        style="background-image: linear-gradient(135deg, rgba(6, 6, 6, 0.9), rgba(2, 2, 2, 0.8)), url('assets/images/trombone.jpg'); background-size: cover; background-position: center;">
                        <div class="member-avatar"><img src="assets/images/Member Images/Bravo.jpeg"
                                alt="Bravin Amalicha"></div>

                        <h3>Bravin Amalicha</h3>
                        <p class="member-aka">AKA-Bravo</p>
                        <p class="member-instrument">1st Trombone</p>
                        <p class="member-about">Brings energy, precision and timing that drive the music
                            forward with
                            impact.</p>
                        <div class="member-social">
                            <a href="https://www.facebook.com/profile.php?id=61593338960381" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>

                            <a href="https://youtube.com/@bluedykebrassband" target="_blank" rel="noopener noreferrer"
                                aria-label="Blue Dyke Brass Band on YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>

                            <a href="https://www.tiktok.com/@bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on TikTok">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card member-card trombone-card"
                        style="background-image: linear-gradient(135deg, rgba(6, 6, 6, 0.9), rgba(2, 2, 2, 0.8)), url('assets/images/trombone.jpg'); background-size: cover; background-position: center;">
                        <div class="member-avatar"><img src="assets/images/Member Images/Carson.jpeg"
                                alt="Carson Ogamba"></div>

                        <h3>Carson Ogamba</h3>
                        <p class="member-aka">AKA-Carson</p>
                        <p class="member-instrument">1st Trombone</p>
                        <p class="member-about">Contributes rich tone and dependable support to the full
                            brass sound.
                        </p>
                        <div class="member-social">
                            <a href="https://www.facebook.com/profile.php?id=61593338960381" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>

                            <a href="https://youtube.com/@bluedykebrassband" target="_blank" rel="noopener noreferrer"
                                aria-label="Blue Dyke Brass Band on YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>

                            <a href="https://www.tiktok.com/@bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on TikTok">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card member-card trombone-card"
                        style="background-image: linear-gradient(135deg, rgba(6, 6, 6, 0.9), rgba(2, 2, 2, 0.8)), url('assets/images/trombone.jpg'); background-size: cover; background-position: center;">
                        <div class="member-avatar"><img src="assets/images/Member Images/benja.jpg"
                                alt="Benjamin Sigira"></div>

                        <h3>Benjamin Sigira</h3>
                        <p class="member-aka">AKA-Benja</p>
                        <p class="member-instrument">2nd Trombone</p>
                        <p class="member-about">Brings bright melodies and an upbeat presence to every
                            performance and
                            rehearsal.</p>
                        <div class="member-social">
                            <a href="https://www.facebook.com/profile.php?id=61593338960381" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>

                            <a href="https://youtube.com/@bluedykebrassband" target="_blank" rel="noopener noreferrer"
                                aria-label="Blue Dyke Brass Band on YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>

                            <a href="https://www.tiktok.com/@bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on TikTok">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card member-card trombone-card"
                        style="background-image: linear-gradient(135deg, rgba(6, 6, 6, 0.9), rgba(2, 2, 2, 0.8)), url('assets/images/trombone.jpg'); background-size: cover; background-position: center;">
                        <div class="member-avatar"><img src="assets/images/Member Images/phillip.jpg" alt="Ian Phillip">
                        </div>

                        <h3>Ian Phillip</h3>
                        <p class="member-aka">AKA-Phyllo</p>
                        <p class="member-instrument">2nd Trombone</p>
                        <p class="member-about">Brings bright melodies and an upbeat presence to every
                            performance and
                            rehearsal.</p>
                        <div class="member-social">
                            <a href="https://www.facebook.com/profile.php?id=61593338960381" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>

                            <a href="https://youtube.com/@bluedykebrassband" target="_blank" rel="noopener noreferrer"
                                aria-label="Blue Dyke Brass Band on YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>

                            <a href="https://www.tiktok.com/@bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on TikTok">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                    </div>


                    <div class="card member-card cornet-card"
                        style="background-image: linear-gradient(135deg, rgba(6, 6, 6, 0.9), rgba(2, 2, 2, 0.8)), url('assets/images/cornet.jpg'); background-size: cover; background-position: center;">
                        <div class="member-avatar"><img src="assets/images/Member Images/Alvin.jpeg" alt="Alvo"></div>

                        <h3>Alvin Mokiro</h3>
                        <p class="member-aka">AKA-Alvo</p>
                        <p class="member-instrument">Solo Cornet</p>
                        <p class="member-about">Adds warmth and blend to the band’s harmonies with elegance
                            and
                            confidence.</p>
                        <div class="member-social">
                            <a href="https://www.facebook.com/profile.php?id=61593338960381" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>

                            <a href="https://youtube.com/@bluedykebrassband" target="_blank" rel="noopener noreferrer"
                                aria-label="Blue Dyke Brass Band on YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>

                            <a href="https://www.tiktok.com/@bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on TikTok">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card member-card cornet-card"
                        style="background-image: linear-gradient(135deg, rgba(6, 6, 6, 0.9), rgba(2, 2, 2, 0.8)), url('assets/images/cornet.jpg'); background-size: cover; background-position: center;">
                        <div class="member-avatar"><img src="assets/images/Member Images/Ibrah Muna.jpeg"
                                alt="Ibrahim Muna"></div>

                        <h3>Ibrahim Muna</h3>
                        <p class="member-aka">AKA-Ibrah</p>
                        <p class="member-instrument">Solo Cornet</p>
                        <p class="member-about">Helps hold the structure of each piece with steady rhythm
                            and control.
                        </p>
                        <div class="member-social">
                            <a href="https://www.facebook.com/profile.php?id=61593338960381" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>

                            <a href="https://youtube.com/@bluedykebrassband" target="_blank" rel="noopener noreferrer"
                                aria-label="Blue Dyke Brass Band on YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>

                            <a href="https://www.tiktok.com/@bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on TikTok">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card member-card cornet-card"
                        style="background-image: linear-gradient(135deg, rgba(6, 6, 6, 0.9), rgba(2, 2, 2, 0.8)), url('assets/images/cornet.jpg'); background-size: cover; background-position: center;">
                        <div class="member-avatar"><img src="assets/images/Member Images/Tony.jpeg" alt="Tony Luloka">
                        </div>

                        <h3>Tony Luloka</h3>
                        <p class="member-aka">Tonyjaa</p>
                        <p class="member-instrument">Soprano Cornet</p>
                        <p class="member-about">Adds vivid dynamics and strong beats that energize every
                            performance.
                        </p>
                        <div class="member-social">
                            <a href="https://www.facebook.com/profile.php?id=61593338960381" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>

                            <a href="https://youtube.com/@bluedykebrassband" target="_blank" rel="noopener noreferrer"
                                aria-label="Blue Dyke Brass Band on YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>

                            <a href="https://www.tiktok.com/@bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on TikTok">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card member-card cornet-card"
                        style="background-image: linear-gradient(135deg, rgba(6, 6, 6, 0.9), rgba(2, 2, 2, 0.8)), url('assets/images/cornet.jpg'); background-size: cover; background-position: center;">
                        <div class="member-avatar"><img src="assets/images/Member Images/Granton.jpeg"
                                alt="Granton Muchesia"></div>

                        <h3>Granton Muchesia</h3>
                        <p class="member-aka">AKA-Generali </p>
                        <p class="member-instrument">1st Cornet</p>
                        <p class="member-about">Brings clarity and confidence to the melody line in every
                            public
                            appearance.</p>
                        <div class="member-social">
                            <a href="https://www.facebook.com/profile.php?id=61593338960381" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>

                            <a href="https://youtube.com/@bluedykebrassband" target="_blank" rel="noopener noreferrer"
                                aria-label="Blue Dyke Brass Band on YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>

                            <a href="https://www.tiktok.com/@bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on TikTok">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card member-card cornet-card"
                        style="background-image: linear-gradient(135deg, rgba(6, 6, 6, 0.9), rgba(2, 2, 2, 0.8)), url('assets/images/cornet.jpg'); background-size: cover; background-position: center;">
                        <div class="member-avatar"><img src="assets/images/Member Images/Stano.jpeg"
                                alt="Stanislaus Khaemba">
                        </div>

                        <h3>Stanislaus Khaemba</h3>
                        <p class="member-aka">"Stano" </p>
                        <p class="member-instrument">1st Cornet</p>
                        <p class="member-about">Brings clarity and confidence to the melody line in every
                            public
                            appearance.</p>
                        <div class="member-social">
                            <a href="https://www.facebook.com/profile.php?id=61593338960381"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a href="https://www.instagram.com/bluedykebrassband?igsh=aDB6YTBlZmJ1cmVl"><i
                                    class="fab fa-instagram"></i></a>
                            <a href="https://youtube.com/@bluedykebrassband?si=bA5_GtZTSyIb5kCM"><i
                                    class="fab fa-youtube"></i></a>
                            <a href="https://www.tiktok.com/@bluedykebrassband"><i class="fab fa-tiktok"></i></a>
                        </div>
                    </div>
                    <div class="card member-card cornet-card"
                        style="background-image: linear-gradient(135deg, rgba(6, 6, 6, 0.9), rgba(2, 2, 2, 0.8)), url('assets/images/Trumpet.jpg'); background-size: cover; background-position: center;">
                        <div class="member-avatar"><img src="assets/images/Member Images/Obed.jpeg" alt="Obed Ndalu">
                        </div>

                        <h3>Obed Ndalu</h3>
                        <p class="member-aka">AKA-Obed</p>
                        <p class="member-instrument">2nd Cornet</p>
                        <p class="member-about">Adds depth and character to the band’s musical storytelling
                            and sound.
                        </p>
                        <div class="member-social">
                            <a href="https://www.facebook.com/profile.php?id=61593338960381" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>

                            <a href="https://youtube.com/@bluedykebrassband" target="_blank" rel="noopener noreferrer"
                                aria-label="Blue Dyke Brass Band on YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>

                            <a href="https://www.tiktok.com/@bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on TikTok">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card member-card cornet-card"
                        style="background-image: linear-gradient(135deg, rgba(6, 6, 6, 0.9), rgba(2, 2, 2, 0.8)), url('assets/images/trumpet.jpg'); background-size: cover; background-position: center;">
                        <div class="member-avatar"><img src="assets/images/Member Images/Yvette.jpeg" alt="Yvette">
                        </div>

                        <h3>Yvette Mahiji</h3>
                        <p class="member-aka">AKA-Yvette</p>
                        <p class="member-instrument">2nd Cornet</p>
                        <p class="member-about">Contributes graceful tone and excellent ensemble awareness
                            on stage.</p>
                        <div class="member-social">
                            <a href="https://www.facebook.com/profile.php?id=61593338960381" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>

                            <a href="https://youtube.com/@bluedykebrassband" target="_blank" rel="noopener noreferrer"
                                aria-label="Blue Dyke Brass Band on YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>

                            <a href="https://www.tiktok.com/@bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on TikTok">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card member-card horn-card"
                        style="background-image: linear-gradient(135deg, rgba(6, 6, 6, 0.9), rgba(2, 2, 2, 0.8)), url('assets/images/Flugelhorn.webp'); background-size: cover; background-position: center;">
                        <div class="member-avatar"><img src="assets/images/Member Images/Kadenge.jpeg"
                                alt="John Bright Kadenge"></div>

                        <h3>John Bright</h3>
                        <p class="member-aka">AKA-Kadenge</p>
                        <p class="member-instrument">Flugel Horn</p>
                        <p class="member-about">Contributes graceful tone and excellent ensemble awareness
                            on stage.</p>
                        <div class="member-social">
                            <a href="https://www.facebook.com/profile.php?id=61593338960381" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>

                            <a href="https://youtube.com/@bluedykebrassband" target="_blank" rel="noopener noreferrer"
                                aria-label="Blue Dyke Brass Band on YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>

                            <a href="https://www.tiktok.com/@bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on TikTok">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card member-card horn-card"
                        style="background-image: linear-gradient(135deg, rgba(6, 6, 6, 0.9), rgba(2, 2, 2, 0.8)), url('assets/images/baritone.webp'); background-size: cover; background-position: center;">
                        <div class="member-avatar"><img src="assets/images/Member Images/Wafula.jpg"
                                alt="Lawrence Wafula"></div>

                        <h3>Lawrence Wafula</h3>
                        <p class="member-aka">AKA Lau</p>
                        <p class="member-instrument">Hornist</p>
                        <p class="member-about">Supports the band with rich harmony, dedication and a warm
                            performing
                            style.</p>
                        <div class="member-social">
                            <a href="https://www.facebook.com/profile.php?id=61593338960381" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>

                            <a href="https://youtube.com/@bluedykebrassband" target="_blank" rel="noopener noreferrer"
                                aria-label="Blue Dyke Brass Band on YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>

                            <a href="https://www.tiktok.com/@bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on TikTok">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card member-card baritone-card"
                        style="background-image: linear-gradient(135deg, rgba(6, 6, 6, 0.9), rgba(2, 2, 2, 0.8)), url('assets/images/baritone.webp'); background-size: cover; background-position: center;">
                        <div class="member-avatar"></div>

                        <h3>Ibrahim Ali</h3>
                        <p class="member-aka">AKA Ibrah</p>
                        <p class="member-instrument">Baritone</p>
                        <p class="member-about">Supports the band with rich harmony, dedication and a warm
                            performing
                            style.</p>
                        <div class="member-social">
                            <a href="https://www.facebook.com/profile.php?id=61593338960381" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>

                            <a href="https://youtube.com/@bluedykebrassband" target="_blank" rel="noopener noreferrer"
                                aria-label="Blue Dyke Brass Band on YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>

                            <a href="https://www.tiktok.com/@bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on TikTok">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card member-card percussion-card"
                        style="background-image: linear-gradient(135deg, rgba(6, 6, 6, 0.9), rgba(2, 2, 2, 0.8)), url('assets/images/drums.jpg'); background-size: cover; background-position: center;">
                        <div class="member-avatar"></div>

                        <h3>Sam Munala</h3>
                        <p class="member-aka">AKA Sam</p>
                        <p class="member-instrument">Snare drum</p>
                        <p class="member-about">Supports the band with rich harmony, dedication and a warm
                            performing
                            style.</p>
                        <div class="member-social">
                            <a href="https://www.facebook.com/profile.php?id=61593338960381" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>

                            <a href="https://youtube.com/@bluedykebrassband" target="_blank" rel="noopener noreferrer"
                                aria-label="Blue Dyke Brass Band on YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>

                            <a href="https://www.tiktok.com/@bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on TikTok">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card member-card percussion-card"
                        style="background-image: linear-gradient(135deg, rgba(6, 6, 6, 0.9), rgba(2, 2, 2, 0.8)), url('assets/images/drums.jpg'); background-size: cover; background-position: center;">
                        <div class="member-avatar"><img src="assets/images/Member Images/Bradley.png"
                                alt="Bradley Muhambe"></div>

                        <h3>Bradley Muhambe</h3>
                        <p class="member-aka">AKA Brad</p>
                        <p class="member-instrument">Drummer</p>
                        <p class="member-about">Supports the band with rich harmony, dedication and a warm
                            performing
                            style.</p>
                        <div class="member-social">
                            <a href="https://www.facebook.com/profile.php?id=61593338960381" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>

                            <a href="https://youtube.com/@bluedykebrassband" target="_blank" rel="noopener noreferrer"
                                aria-label="Blue Dyke Brass Band on YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>

                            <a href="https://www.tiktok.com/@bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on TikTok">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card member-card percussion-card"
                        style="background-image: linear-gradient(135deg, rgba(6, 6, 6, 0.9), rgba(2, 2, 2, 0.8)), url('assets/images/Bass\ trombone.jpg'); background-size: cover; background-position: center;">
                        <div class="member-avatar"><img src="assets/images/Member Images/collo.jpg"
                                alt="Collins Kipkoech">
                        </div>

                        <h3>Collins Kipkoech</h3>
                        <p class="member-aka">AKA Mfalme</p>
                        <p class="member-instrument">Trombonist/Drummer</p>
                        <p class="member-about">Supports the band with rich harmony, dedication and a warm
                            performing
                            style.</p>
                        <div class="member-social">
                            <a href="https://www.facebook.com/profile.php?id=61593338960381" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>

                            <a href="https://youtube.com/@bluedykebrassband" target="_blank" rel="noopener noreferrer"
                                aria-label="Blue Dyke Brass Band on YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>

                            <a href="https://www.tiktok.com/@bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on TikTok">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card member-card percussion-card"
                        style="background-image: linear-gradient(135deg, rgba(6, 6, 6, 0.9), rgba(2, 2, 2, 0.8)), url('assets/images/Cards\ 2.jpg'); background-size: cover; background-position: center;">
                        <div class="member-avatar"><img src="assets/images/Member Images/Ian.jpeg" alt="Ian Senerwa">
                        </div>

                        <h3>Ian Senerwa</h3>
                        <p class="member-aka">AKA Ian</p>
                        <p class="member-instrument">Principal Conductor/Drummer</p>
                        <p class="member-about">Supports the band with rich harmony, dedication and a warm
                            performing
                            style.</p>
                        <div class="member-social">
                            <a href="https://www.facebook.com/profile.php?id=61593338960381" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>

                            <a href="https://youtube.com/@bluedykebrassband" target="_blank" rel="noopener noreferrer"
                                aria-label="Blue Dyke Brass Band on YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>

                            <a href="https://www.tiktok.com/@bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on TikTok">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card member-card percussion-card">
                        <div class="member-avatar"></div>

                        <h3>NEW MEMBER</h3>
                        <p class="member-aka">COULD BE YOU! Join Us Today!</p>
                        <p class="member-instrument">New member Profile</p>
                        <p class="member-about">
                            We are always looking for talented musicians to join our band. If you are interested in
                            becoming a member, please contact us for more information.
                        </p>
                        <div class="member-social">
                            <a href="https://www.facebook.com/profile.php?id=61593338960381" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>

                            <a href="https://youtube.com/@bluedykebrassband" target="_blank" rel="noopener noreferrer"
                                aria-label="Blue Dyke Brass Band on YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>

                            <a href="https://www.tiktok.com/@bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on TikTok">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section-alt" id="events">
            <div class="container">
                <div class="section-heading">
                    <p class="eyebrow">Perfomances and Events</p>
                    <h2>Upcoming events and special occasions</h2>
                    <p class="section-subtitle">
                        Experience Blue Dyke Brass Band live. Join us as we bring inspiring music to communities across
                        Kenya.
                    </p>
                </div>
                <div class="events-grid">

                    <!-- Event 1 -->

                    <article class="event-card featured">

                        <div class="event-date">
                            <span class="day">23</span>
                            <span class="month">AUG</span>
                        </div>

                        <div class="event-content">

                            <span class="event-badge concert">
                                🎺 Concert
                            </span>

                            <h3>A Symphony Of Praise Concert</h3>

                            <p>
                                <i class="fas fa-location-dot"></i>
                                The salvation Army Nakuru citadel
                            </p>

                            <p>
                                <i class="fas fa-clock"></i>
                                2:00 PM
                            </p>

                            <a href="#contact" class="event-link">
                                More Information
                                <i class="fas fa-arrow-right"></i>
                            </a>

                        </div>

                    </article>

                    <!-- Event 2 -->

                    <article class="event-card">

                        <div class="event-date">
                            <span class="day">01</span>
                            <span class="month">OCT</span>
                        </div>

                        <div class="event-content">

                            <span class="event-badge wedding">
                                KMCF
                            </span>

                            <h3>Cultural Music festivals</h3>

                            <p>
                                <i class="fas fa-location-dot"></i>
                                Mombasa
                            </p>

                            <p>
                                <i class="fas fa-clock"></i>
                                11:00 AM
                            </p>

                            <a href="#contact" class="event-link">
                                Contact Us
                                <i class="fas fa-arrow-right"></i>
                            </a>

                        </div>

                    </article>

                    <!-- Event 3 -->

                    <article class="event-card">

                        <div class="event-date">
                            <span class="day">02</span>
                            <span class="month">DEC</span>
                        </div>

                        <div class="event-content">

                            <span class="event-badge church">
                                Graduation
                            </span>

                            <h3>Graduations</h3>

                            <p>
                                <i class="fas fa-location-dot"></i>
                                Kenya
                            </p>

                            <p>
                                <i class="fas fa-clock"></i>
                                9:00 AM
                            </p>

                            <a href="#contact" class="event-link">
                                More Information
                                <i class="fas fa-arrow-right"></i>
                            </a>

                        </div>

                    </article>

                </div>

            </div>
        </section>

        <section class="section" id="repertoire">
            <div class="container">
                <div class="section-heading">
                    <p class="eyebrow">Music & Repertoire</p>
                    <h2>A rich sound for every moment</h2>
                     <p class="section-subtitle">
                       Our repertoire includes a wide range of brass music suitable
    for church services, concerts, weddings, parades, graduations
    and community celebrations.
                    </p>
                </div>
                <div class="repertoire-grid">
                    <div class="card repertoire-card"
                        style="background-image: linear-gradient(135deg, rgba(7,17,31,0.01), rgba(29,78,216,0.01)), url('assets/images/Cards.jpg'); background-size: cover; background-position: center;">
                        <div class="repertoire-icon"><i class="fas fa-drum"></i></div>
                        <h3>Marches</h3>
                        <p>Bold, energetic selections that command the stage and the street.</p>
                        <span class="repertoire-tag">Live energy</span>
                    </div>
                    <div class="card repertoire-card"
                        style="background-image: linear-gradient(135deg, rgba(7,17,31,0.01), rgba(29,78,216,0.01)), url('assets/images/Cards\ 2.jpg'); background-size: cover; background-position: center;">
                        <div class="repertoire-icon"><i class="fas fa-church"></i></div>
                        <h3>Hymns</h3>
                        <p>Sacred and reflective pieces for worship and solemn occasions.</p>
                        <span class="repertoire-tag">Soulful sound</span>
                    </div>
                    <div class="card repertoire-card"
                        style="background-image: linear-gradient(135deg, rgba(7,17,31,0.01), rgba(29,78,216,0.01)), url('assets/images/Cards\ 3.avif'); background-size: cover; background-position: center;">
                        <div class="repertoire-icon"><i class="fas fa-guitar"></i></div>
                        <h3>Traditional Brass</h3>
                        <p>Classic arrangements that celebrate heritage and musical storytelling.</p>
                        <span class="repertoire-tag">Heritage touch</span>
                    </div>
                    <div class="card repertoire-card"
                        style="background-image: linear-gradient(135deg, rgba(7,17,31,0.01), rgba(29,78,216,0.01)), url('assets/images/euphonium.jpeg'); background-size: cover; background-position: center;">
                        <div class="repertoire-icon"><i class="fas fa-music"></i></div>
                        <h3>Contemporary Arrangements</h3>
                        <p>Modern favourites reimagined for the warmth and power of brass.</p>
                        <span class="repertoire-tag">Fresh flair</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section-alt" id="gallery">
            <div class="container">
                <div class="section-heading">
                    <p class="eyebrow">
                        Our Journey
                    </p>
                    <h2 class="section-title">
                        Capturing Musical Moments
                    </h2>
                </div>
                <p class="section-subtitle">
                    From church services and weddings to parades, concerts and competitions,
                    every performance is a memory worth celebrating.
                </p>

                <div class="gallery-grid" id="gallery-grid">
                    <?php if (!empty($galleryImages)): ?>
                    <?php foreach ($galleryImages as $index => $imagePath): ?>
                    <?php
                            $folderName = basename(dirname($imagePath));
                            $categoryLabel = ucwords(str_replace(['-', '_'], ' ', $folderName));
                            $spanClass = $index === 0 ? 'wide' : ($index === 2 ? 'tall' : '');
                            ?>
                    <div class="gallery-item <?= $spanClass ?>" data-category="<?= strtolower($folderName) ?>">
                        <img src="<?= $imagePath ?>" alt="<?= htmlspecialchars($categoryLabel, ENT_QUOTES, 'UTF-8') ?>">
                        <div class="gallery-overlay">
                            <span
                                class="gallery-badge"><?= htmlspecialchars($categoryLabel, ENT_QUOTES, 'UTF-8') ?></span>
                            <h3><?= htmlspecialchars($categoryLabel, ENT_QUOTES, 'UTF-8') ?></h3>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <p class="section-subtitle">No gallery images found yet. Add images to the gallery folders to
                        display them here.</p>
                    <?php endif; ?>
                </div>
                <div class="gallery-action">
                    <a href="#contact" class="btn btn-primary">
                        View More Memories
                    </a>
                </div>
            </div>
        </section>

        <section class="section" id="join">
            <div class="container">
                <div class="section-heading">
                    <p class="eyebrow">Join the Band</p>
                    <h2>Bring your talent and be part of the sound</h2>
                </div>
                <div class="join-grid">
                    <div class="card join-card">
                        <h3>Instruments Needed</h3>
                        <ul class="check-list">
                            <li>Solo Horn</li>
                            <li>2nd Cornet</li>
                            <li>Baritone</li>
                            <li>Percussion</li>
                        </ul>
                    </div>
                    <div class="card join-card">
                        <h3>Audition & Practice</h3>
                        <p>New members are welcome. Auditions are simple and friendly, with rehearsal
                            sessions held
                            regularly for skill development and teamwork.</p>
                    </div>
                    <div class="card join-card">
                        <h3>Requirements</h3>
                        <p>Passion for music, commitment to practice, and a willingness to grow with the
                            group.</p>
                    </div>
                    <div class="card join-card">
                        <h3>Why Join Us</h3>
                        <p>Grow your confidence, sharpen your discipline and perform with a team that values
                            excellence and community.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section-alt" id="testimonials">
            <div class="container">
                <div class="section-heading">
                    <p class="eyebrow">What People Say</p>
                    <h2>Why families and organizers trust Blue Dyke</h2>
                    <p class="section-subtitle">Our performances leave a lasting impression because every note is
                        delivered with heart, precision and passion.</p>
                </div>
                <div class="testimonial-grid">
                    <article class="card testimonial-card">
                        <div class="testimonial-icon"><i class="fas fa-quote-left"></i></div>
                        <p>“The band brought a powerful, uplifting energy to our church event. Every piece felt polished
                            and memorable.”</p>
                        <div class="testimonial-author">
                            <strong>Pastor M. Kamau</strong>
                            <span>Church Service Host</span>
                        </div>
                    </article>
                    <article class="card testimonial-card">
                        <div class="testimonial-icon"><i class="fas fa-quote-left"></i></div>
                        <p>“Their sound was bold, rich and perfectly timed. They turned our celebration into something
                            truly special.”</p>
                        <div class="testimonial-author">
                            <strong>Grace Njeri</strong>
                            <span>Wedding Planner</span>
                        </div>
                    </article>
                    <article class="card testimonial-card">
                        <div class="testimonial-icon"><i class="fas fa-quote-left"></i></div>
                        <p>“Professional, disciplined and exciting. Blue Dyke made our parade feel larger than life.”
                        </p>
                        <div class="testimonial-author">
                            <strong>Daniel Otieno</strong>
                            <span>Community Event Organizer</span>
                        </div>
                    </article>
                    <article class="card testimonial-card">
                        <div class="testimonial-icon"><i class="fas fa-quote-left"></i></div>
                        <p>“They were punctual, warm and incredibly organized. Our guests kept talking about the music
                            long after the event ended.”</p>
                        <div class="testimonial-author">
                            <strong>Faith Wambui</strong>
                            <span>Event Host</span>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section class="contact section" id="contact">

            <div class="container">
                <div class="section-heading">
                    <p class="eyebrow">Get In Touch</p>
                    <h2>Let's Make Your Event Musical</h2>
                    <p class="section-subtitle">
                        We'd love to be part of your next celebration. Reach out to us for bookings,
                        enquiries or any information about Blue Dyke Brass Band.
                    </p>
                </div>
                <div class="contact-wrapper">

                    <!-- Contact Information -->

                    <div class="contact-info">

                        <div class="contact-card">

                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>

                            <div>
                                <h3>Call Us</h3>
                                <p>
                                    <a href="tel:+254718877448">+254 718 877 448</a>
                                </p>

                                <p>
                                    <a href="tel:+254717827959">+254 717 827 959</a>
                                </p>

                                <p>
                                    <a href="tel:+254791249805">+254 791 249 805</a>
                                </p>
                            </div>

                        </div>

                        <div class="contact-card">

                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>

                            <div>
                                <h3>Email</h3>
                                <p>
                                    <a href="mailto:bluedykebrass@gmail.com">
                                        bluedykebrass@gmail.com
                                    </a>
                                </p>
                            </div>

                        </div>

                        <div class="contact-card">

                            <div class="contact-icon">
                                <i class="fas fa-location-dot"></i>
                            </div>

                            <div>
                                <h3>Location</h3>
                                <p>Eldoret, Kenya</p>
                            </div>

                        </div>

                        <div class="social-links">
                            <a href="https://www.facebook.com/profile.php?id=61593338960381" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://youtube.com/@bluedykebrassband" target="_blank" rel="noopener noreferrer"
                                aria-label="Blue Dyke Brass Band on YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>
                            <a href="https://www.tiktok.com/@bluedykebrassband" target="_blank"
                                rel="noopener noreferrer" aria-label="Blue Dyke Brass Band on TikTok">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>


                    </div>

                    <!-- Contact Form -->

                    <form class="contact-form" method="POST" action="#contact">
                        <?php if ($contactStatus !== ''): ?>
                        <div class="contact-status <?= htmlspecialchars($contactStatus, ENT_QUOTES, 'UTF-8') ?>"
                            role="alert">
                            <?= htmlspecialchars($contactMessage, ENT_QUOTES, 'UTF-8') ?>
                        </div>
                        <?php endif; ?>

                        <div class="input-group">

                            <input type="text" name="contact_name" placeholder="Your Name" aria-label="Your Name"
                                required>

                            <input type="email" name="contact_email" placeholder="Email Address"
                                aria-label="Email Address" required>

                        </div>

                        <input type="text" name="contact_subject" placeholder="Subject" aria-label="Subject">

                        <textarea name="contact_message" rows="6" placeholder="Your Message" aria-label="Your Message"
                            required></textarea>

                        <button type="submit" class="btn btn-primary">

                            Send Message

                        </button>

                    </form>

                </div>

            </div>

        </section>

        <section class="cta section" id="book">

            <div class="container">

                <div class="cta-card">

                    <span class="cta-tag">
                        Book Blue Dyke Brass Band
                    </span>

                    <h2>
                        Ready to Make Your Event Unforgettable?
                    </h2>

                    <p>

                        Whether it's a wedding, church service, graduation,
                        parade, corporate function or community celebration,
                        Blue Dyke Brass Band is ready to make every moment
                        truly musical.

                    </p>

                    <div class="cta-buttons">

                        <a href="#contact" class="btn btn-primary">

                            Book the Band

                        </a>

                        <a href="#contact" class="btn btn-secondary">

                            Contact Us

                        </a>

                    </div>

                    <div class="cta-contact">

                        <span>
                            <i class="fas fa-phone"></i>
                            <p>
                                <a href="tel:+254718877448">+254 718 877 448</a>
                            </p>

                            <p>
                                <a href="tel:+254717827959">+254 717 827 959</a>
                            </p>

                            <p>
                                <a href="tel:+254791249805">+254 791 249 805</a>
                            </p>
                        </span>

                        <span>
                            <i class="fas fa-envelope"></i>
                            <p>
                                <a href="mailto:bluedykebrass@gmail.com">bluedykebrass@gmail.com</a>
                            </p>
                        </span>

                    </div>

                </div>

            </div>

        </section>
    </main>

    <footer class="footer">

        <div class="container footer-grid">

            <div>

                <img src="assets/images/logo.png" class="footer-logo" alt="Blue Dyke Brass Band logo">

                <p class="footer-text">
                    Blue Dyke Brass Band – Making Moments Musical.
                    Bringing communities together through inspiring live brass performances
                    in Eldoret and across Kenya.
                </p>

            </div>

            <div>

                <h3>Quick Links</h3>

                <ul>

                    <li><a href="#home">Home</a></li>

                    <li><a href="#about">About</a></li>

                    <li><a href="#gallery">Gallery</a></li>

                    <li><a href="#members">Members</a></li>

                    <li><a href="#events">Events</a></li>

                    <li><a href="#contact">Contact</a></li>

                </ul>

            </div>

            <div>

                <h3>Brass Band Services</h3>

                <ul>
                    <li>Wedding Brass Band Services</li>
                    <li>Church Brass Band Services</li>
                    <li>Live Concert Performances</li>
                    <li>Parades and Processions</li>
                    <li>Graduation Ceremonies</li>
                </ul>

            </div>

            <div>

                <h3>Contact</h3>

                <p>
                    <a href="tel:+254718877448">+254 718 877 448</a>
                </p>

                <p>
                    <a href="tel:+254717827959">+254 717 827 959</a>
                </p>

                <p>
                    <a href="tel:+254791249805">+254 791 249 805</a>
                </p>

                <p>✉ bluedykebrass@gmail.com</p>

                <p>📍 Eldoret, Kenya</p>

            </div>

        </div>

        <div class="footer-bottom">

            <p>
                🎺 Making Moments Musical • © 2026 Blue Dyke Brass Band. All Rights Reserved.
            </p>

            <p class="developer-credit">
                Designed with ❤️ for Blue Dyke Brass Band by:
                <a href="https://henry-portfolio-fawn.vercel.app" target="_blank" rel="noopener noreferrer">

                    Henry Semo
                </a>

            </p>

        </div>

    </footer>

    <script src="assets/js/script.js"></script>
    <!-- Floating Buttons -->

    <div class="floating-buttons">

        <!-- WhatsApp -->

        <a href="https://wa.me/254718877448" target="_blank" rel="noopener noreferrer" class="floating-btn whatsapp"
            aria-label="Contact Blue Dyke Brass Band on WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>

        </a>

        <!-- Back To Top -->

        <a href="#home" class="floating-btn back-to-top">

            <i class="fas fa-chevron-up"></i>

        </a>

    </div>
</body>

</html>
