<?php
session_start();
include 'db.php';

// تحقق من صلاحيات المدير (اختياري لكنه مهم)
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header("Location: login.php");
    exit;
}

$id = (int)($_GET['id'] ?? 0);
if (!$id) { header("Location: users.php"); exit; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $is_admin = isset($_POST['is_admin']) ? 1 : 0;
    $stmt = $conn->prepare("
        UPDATE students 
        SET name = :name, email = :email, is_admin = :is_admin 
        WHERE id = :id
    ");
    $stmt->execute([
        ':name' => $_POST['name'],
        ':email' => $_POST['email'],
        ':is_admin' => $is_admin,
        ':id' => $id
    ]);
    header("Location: users.php");
    exit;
}

$stmt = $conn->prepare("SELECT id, name, email, is_admin FROM students WHERE id = :id");
$stmt->execute([':id' => $id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$user) { echo "User not found."; exit; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Courses | Edit User</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body.light-mode { background: #fff; color: #000; }
        body.dark-mode  { background: #121212; color: #eee; }

        .theme-toggle {
            position: fixed; top: 20px; right: 20px; z-index: 9999;
            background: #cd3eff; border: 1px solid #ccc; border-radius: 4px;
            padding: 6px 10px; font-size: 14px; cursor: pointer;
        }
        body.dark-mode .theme-toggle {
            background: #151788; color: #eee; border-color: #555;
        }
    </style>
</head>

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
        <div class="col-xl-6 col-lg-7">
            <div class="section-tittle text-center mb-4">
                <h2 style="padding-top: 100px;">Edit User #<?= $user['id']; ?></h2>
            </div>

            <form method="POST" class="bg-light p-4 rounded shadow">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control"
                           value="<?= htmlspecialchars($user['name']); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control"
                           value="<?= htmlspecialchars($user['email']); ?>" required>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="is_admin"
                           name="is_admin" <?= $user['is_admin'] ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="is_admin">Administrator</label>
                </div>

                <button type="submit" class=" btn-sm btn-primary">Update</button>
                <a href="users.php" class="btn-sm btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</main>

<!-- JavaScript والثيم -->
<script src="assets/js/bootstrap.min.js"></script>
<script>
    function setCookie(n, v, d = 365) {
        const date = new Date();
        date.setTime(date.getTime() + d * 24 * 60 * 60 * 1000);
        document.cookie = `${n}=${v};expires=${date.toUTCString()};path=/`;
    }
    function getCookie(n) {
        return document.cookie.split('; ').find(row => row.startsWith(n + '='))?.split('=')[1];
    }

    const pref = getCookie('theme');
    if (pref === 'dark') {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.add('light-mode');
    }

    const btn = document.getElementById('themeToggle');
    function updateLabel() {
        btn.textContent = document.body.classList.contains('dark-mode') ? '☀ Light' : '◐ Dark';
    }
    updateLabel();

    btn.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
        document.body.classList.toggle('light-mode');
        setCookie('theme', document.body.classList.contains('dark-mode') ? 'dark' : 'light');
        updateLabel();
    });
</script>
</body>
</html>
