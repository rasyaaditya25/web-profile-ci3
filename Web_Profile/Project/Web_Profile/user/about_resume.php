<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Web Profile User</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="../assets/img/logo.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="../assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: DevFolio
  * Template URL: https://bootstrapmade.com/devfolio-bootstrap-portfolio-html-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page overflow-x-hidden">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="../assets/img/logo.png" alt="" height="auto">
            </a>

            <?php
            include 'menu.php'
                ?>

        </div>
    </header>

    <main class="main">

        <!-- About Section -->
        <section id="about" class="about section bg-light py-5">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4 justify-content-center">

                    <!-- About Info -->
                    <div class="col-md-6 col-lg-5">
                        <div class="row justify-content-between gy-4">
                            <div class="col-12 text-center">
                                <img src="../assets/img/profile.png" class="img-fluid rounded-circle shadow-lg" 
                                alt="Profile Image" style="width: 250px; height: 250px; object-fit: cover;">
                            </div>
                            <div class="col-12 mt-4 text-center">
                                <h3 class="fw-bold text-primary"><p>Rasya Aditya</p></h3>
                                <h6><strong>Beginner Developer</strong></h6>
                                <h6><strong>Email : </strong><span>rasyaaditya2506@gmail.com</span></h6>
                                <h6><strong>Phone : </strong><span>+6282292538035</span></h6>
                            </div>
                        </div>
                    </div>

                    <!-- About Me -->
                    <div class="col-md-6 col-lg-7">
                        <div class="about-me p-4 bg-white rounded shadow-sm">
                            <h4 class="mb-4 text-primary">About Me</h4>
                            <p>
                                Hello! I am a student at SMK Negeri 3 Palu, majoring in Software and Game Development
                                (PPLG).
                                I have a strong passion for technology, especially in application and game development.
                            </p>
                            <p>
                                I am highly interested in modern technologies and always eager to learn new things, from
                                programming languages to the latest trends in software development. In addition, I
                                actively
                                participate in various projects and activities that help enhance my skills in the tech
                                field.
                            </p>
                            <p>
                                I aspire to become a skilled developer who can create innovative and creative solutions
                                in the field of software and game development. If you'd like to learn more about me or
                                discuss something, feel free to reach out.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- End About Section -->

        <!-- Resume Section -->
        <section id="resume" class="resume section">
            <div class="container" data-aos="fade-up">

                <!-- Section Title -->
                <div class="section-title">
                    <h2 class="text-primary">Resume</h2>
                </div>

                <div class="row">

                    <!-- Summary, Education, and Skills -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <h3 class="resume-title">Summary</h3>
                        <div class="resume-item pb-0">
                            <h4>Rasya Aditya</h4>
                            <p><em>Innovative and passionate startup developer with a focus on creating user-centric
                                    websites and games.</em></p>
                            <ul>
                                <li>Palu City, Central Sulawesi</li>
                                <li>+6282292538035</li>
                                <li>rasyaaditya2506@gmail.com</li>
                            </ul>
                        </div>

                        <h3 class="resume-title">Education</h3>
                        <div class="resume-item">
                            <h4>SDN Inpres 1 Birobuli - Palu</h4>
                            <h5>Elementary School, 2013 - 2019</h5>
                            <p>Completed foundational education, developing basic academic skills and building a strong
                                foundation in core subjects.</p>
                        </div>

                        <div class="resume-item">
                            <h4>SMP Negeri 6 Palu - Palu</h4>
                            <h5>Junior High School, 2019 - 2022</h5>
                            <p>Gained deeper knowledge in various academic disciplines and actively participated in
                                school activities that nurtured teamwork and leadership skills.</p>
                        </div>

                        <div class="resume-item">
                            <h4>SMK Negeri 3 Palu - Palu</h4>
                            <h5>Vocational High School, Major in Software and Game Development, 2022 - 2025</h5>
                            <p>Focused on acquiring skills in software and game development, including programming,
                                application design, and interactive media. Participated in projects and practical
                                learning to enhance technical expertise.</p>
                        </div>
                    </div>

                    <!-- Professional Experience -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <h3 class="resume-title">Skills</h3>
                        <div class="resume-item">
                            <ul>
                                <li>HTML</li>
                                <li>CSS</li>
                                <li>PHP</li>
                                <li>JavaScript</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- End Resume Section -->


    </main>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/typed.js/typed.umd.js"></script>
    <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>

</html>