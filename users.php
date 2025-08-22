<?php
include 'auth_admin.php';

// جلب المستخدمين
$stmt = $conn->query("SELECT id, name, email, is_admin FROM students");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Courses | Manage Users</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS العام للموقع -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
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
<body>

<!-- Header الموحد -->
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

<!-- Main Content -->
<main class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-8">
            <div class="section-tittle text-center mb-70 ">
                <h2 style="padding-top: 100px">Manage Users</h2>
            </div>
        </div>
    </div>


    <table class="table table-striped table-hover table-bordered">
        <thead class="table-dark">
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= htmlspecialchars($user['name']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= $user['is_admin'] ? 'Admin' : 'Student' ?></td>
                <td>
                    <a href="edit_user.php?id=<?= $user['id'] ?>" class="btn-sm btn-primary">Edit</a>
                    <a href="delete_user.php?id=<?= $user['id'] ?>"  onclick="return confirm('Are you sure?')" class=" btn-sm btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</main>

<!-- JS المشترك -->
<script src="assets/js/bootstrap.min.js"></script>


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
