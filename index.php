<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Courses | Education</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/progressbar_barfiller.css">
    <link rel="stylesheet" href="assets/css/gijgo.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/animated-headline.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        body.light-mode { background:#fff;  color:#000; }
        body.dark-mode  { background:#121212; color:#eee; }

        .theme-toggle {
            position:fixed; top:20px; right:20px; z-index:9999;
            background: #cd3eff; border:1px solid #ccc; border-radius:4px;
            padding:6px 10px; font-size:14px; cursor:pointer;
        }
        body.dark-mode .theme-toggle { background: #151788; color:#eee; border-color:#555; }
    </style>
</head>
<body>

<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
        </div>
    </div>
</div>
<!-- Preloader End -->

<header>
    <!-- Header Start -->
    <div class="header-area header-transparent">
        <div class="main-header">
            <div class="header-bottom header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Main-menu -->
                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="courses.php">Courses</a></li>
                                    <?php if (isset($_SESSION['id'])): ?>
                                        <li><a href="dashboard.php">Dashboard</a></li>
                                        <?php if ($_SESSION['is_admin']): ?>
                                            <li><a href="users.php">Manage Users</a></li>
                                        <?php endif; ?>
                                        <li><a href="logout.php">Logout</a></li>
                                    <?php else: ?>
                                        <li><a href="register.php">Register</a></li>
                                        <li><a href="login.php">Login</a></li>
                                    <?php endif; ?>
                                    <li></li><button id="themeToggle" class="theme-toggle">◐ Dark</button></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>

<main>
    <!-- Slider Area Start -->
    <section class="slider-area">
        <div class="slider-active">
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7 col-md-12">
                            <div class="hero__caption">
                                <h1 data-animation="fadeInLeft" data-delay="0.2s">Online learning<br> platform</h1>
                                <p data-animation="fadeInLeft" data-delay="0.4s">
                                    Build skills with courses, certificates, and degrees online from world-class universities and companies
                                </p>
                                <a href="login.php" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.7s">Join Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Top Subjects Area Start -->
    <div class="topic-area section-padding40">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center mb-55">
                        <h2>Our Courses</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Course 1 -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-topic text-center mb-30">
                        <div class="topic-img">
                            <img src="assets/img/gallery/web.jpg" alt="">
                            <div class="topic-content-box">
                                <div class="topic-content">
                                    <h3><a href="#">WEB</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Course 2 -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-topic text-center mb-30">
                        <div class="topic-img">
                            <img src="assets/img/gallery/english.jpg" alt="">
                            <div class="topic-content-box">
                                <div class="topic-content">
                                    <h3><a href="#">English</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Course 3 -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-topic text-center mb-30">
                        <div class="topic-img">
                            <img src="assets/img/gallery/it.jpg" alt="">
                            <div class="topic-content-box">
                                <div class="topic-content">
                                    <h3><a href="#">IT</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End row -->

            <!-- View More -->
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="section-tittle text-center mt-20">
                        <a href="courses.php" class="border-btn">View More Courses</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Subjects Area End -->

    <!-- Register Area Start -->
    <section class="about-area2 fix pb-padding">
        <div class="support-wrapper align-items-center">
            <div class="right-content2">
                <div class="right-img">
                    <img src="assets/img/gallery/Register Area.png" alt="">
                </div>
            </div>
            <div class="left-content2">
                <div class="section-tittle section-tittle2 mb-20">
                    <div class="front-text">
                        <h2>Take the next step toward your personal and professional goals with us.</h2>
                        <a href="register.php" class="btn">Register Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Register Area End -->
</main>

<footer>
    <div class="footer-wrappper footer-bg">
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="col align-items-center">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-social">
                            <a href="#"><i class="fab fa-whatsapp"></i></a>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Scroll Up -->
<div id="back-top">
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

<!-- JS Scripts -->
<script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<script src="./assets/js/jquery.slicknav.min.js"></script>
<script src="./assets/js/owl.carousel.min.js"></script>
<script src="./assets/js/slick.min.js"></script>
<script src="./assets/js/wow.min.js"></script>
<script src="./assets/js/animated.headline.js"></script>
<script src="./assets/js/jquery.magnific-popup.js"></script>
<script src="./assets/js/gijgo.min.js"></script>
<script src="./assets/js/jquery.nice-select.min.js"></script>
<script src="./assets/js/jquery.sticky.js"></script>
<script src="./assets/js/jquery.barfiller.js"></script>
<script src="./assets/js/jquery.counterup.min.js"></script>
<script src="./assets/js/waypoints.min.js"></script>
<script src="./assets/js/jquery.countdown.min.js"></script>
<script src="./assets/js/hover-direction-snake.min.js"></script>
<script src="./assets/js/contact.js"></script>
<script src="./assets/js/jquery.form.js"></script>
<script src="./assets/js/jquery.validate.min.js"></script>
<script src="./assets/js/mail-script.js"></script>
<script src="./assets/js/jquery.ajaxchimp.min.js"></script>
<script src="./assets/js/plugins.js"></script>
<script src="./assets/js/main.js"></script>


<script>
    /* أدوات الكوكي */
    function setCookie(n,v,d=365){
        const date=new Date(); date.setTime(date.getTime()+d*24*60*60*1000);
        document.cookie=`${n}=${v};expires=${date.toUTCString()};path=/`;
    }
    function getCookie(n){
        return document.cookie.split('; ').find(row=>row.startsWith(n+'='))?.split('=')[1];
    }

    /* تفعيل الثيم المحفوظ */
    const pref = getCookie('theme');
    if(pref==='dark'){document.body.classList.add('dark-mode');}
    else{document.body.classList.add('light-mode');}

    /* تحديث نص الزر */
    const btn = document.getElementById('themeToggle');
    function updateLabel(){
        btn.textContent = document.body.classList.contains('dark-mode') ? '☀ Light' : '◐ Dark';
    }
    updateLabel();

    /* تبديل عند النقر */
    btn.addEventListener('click',()=>{
        document.body.classList.toggle('dark-mode');
        document.body.classList.toggle('light-mode');
        setCookie('theme', document.body.classList.contains('dark-mode') ? 'dark' : 'light');
        updateLabel();
    });
</script>

</body>
</html>
