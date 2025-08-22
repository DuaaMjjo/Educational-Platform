<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

include 'db.php';

try {
    $stmt = $conn->prepare("
        SELECT c.title, c.image, e.enrolled_at 
        FROM enrollments e 
        JOIN courses c ON e.course_id = c.id 
        WHERE e.student_id = :student_id
    ");
    $stmt->bindParam(':student_id', $_SESSION['id'], PDO::PARAM_INT);
    $stmt->execute();
    $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Error loading courses: " . $e->getMessage());
    $error = "An error occurred during courses loading";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Courses | Dashboard</title>
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

<!-- Header -->
<header>
        <div class="main-header">
            <div class="header-bottom header-sticky sticky-bar">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="courses.php">Courses</a></li>
                                    <li><a href="dashboard.php">Dashboard</a></li>
                                    <?php if ($_SESSION['is_admin']): ?>
                                        <li><a href="users.php">Manage Users</a></li>
                                    <?php endif; ?>
                                    <li><a href="logout.php">Logout</a></li>
                                    <button id="themeToggle" class="theme-toggle">◐ Dark</button>

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
</header>
<main class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-8">
            <div class="section-tittle text-center mb-70 ">
                <h2 class="mb-4" style="padding-top: 100px"><strong>Hello <?= htmlspecialchars($_SESSION['name']) ?>, Your Learning:</strong></h2>

            </div>
        </div>
    </div>



    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php elseif (empty($courses)): ?>
        <div class="alert alert-info">You Haven't Registered In Any Course Yet.</div>
    <?php else: ?>
        <ul class="list-group">
            <?php foreach ($courses as $course): ?>
                <li class="list-group-item d-flex align-items-center">
                    <img src="<?= htmlspecialchars($course['image']) ?>" alt="Course Image"
                         class="rounded"
                         style="width: 100px; height: 100px; object-fit: cover; margin-right: 20px;">
                    <div>
                        <h3 class="mb-1"><strong><?= htmlspecialchars($course['title']) ?></strong></h3>
                        <small class="text-muted">(<?= $course['enrolled_at'] ?>)</small>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</main>

<!-- JS here -->
<script src="assets/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.slicknav.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/animated.headline.js"></script>
<script src="assets/js/jquery.magnific-popup.js"></script>
<script src="assets/js/jquery.scrollUp.min.js"></script>
<script src="assets/js/jquery.nice-select.min.js"></script>
<script src="assets/js/jquery.sticky.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/contact.js"></script>
<script src="assets/js/jquery.form.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/mail-script.js"></script>
<script src="assets/js/jquery.ajaxchimp.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>

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
