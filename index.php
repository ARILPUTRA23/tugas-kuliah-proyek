<?php
// Memulai session agar data tugas tetap tersimpan sementara saat halaman direfresh
session_start();

// Jika session tasks belum ada, buat array kosong
if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [
        "Menyelesaikan laporan proyek kuliah",
        "Melakukan uji keamanan dengan Burp Suite",
        "Commit kode ke GitHub menggunakan Git Bash"
    ];
}

// Cek jika ada tugas baru yang dikirim lewat form
if (isset($_POST['task_name']) && !empty(trim($_POST['task_name']))) {
    $newTask = htmlspecialchars(trim($_POST['task_name']));
    $_SESSION['tasks'][] = $newTask; // Masukkan ke session
    header("Location: " . $_SERVER['PHP_SELF']); // Refresh halaman agar bersih
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Tugas - Tugas Kuliah</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f6f9; margin: 0; padding: 40px; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        h2 { color: #333; text-align: center; margin-bottom: 25px; }
        form { display: flex; gap: 10px; margin-bottom: 25px; }
        input[type="text"] { flex: 1; padding: 12px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px; }
        button { padding: 12px 20px; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 14px; font-weight: bold; }
        button:hover { background-color: #218838; }
        ul { list-style-type: none; padding: 0; }
        li { background: #f9f9f9; margin-bottom: 10px; padding: 12px; border-left: 5px solid #007bff; border-radius: 4px; font-size: 15px; }
        .info { background: #e2f0d9; color: #385723; padding: 10px; border-radius: 4px; margin-bottom: 20px; font-size: 13px; text-align: center; }
    </style>
</head>
<body>

<div class="container">
    <h2>Manajemen Tugas Tim Kuliah</h2>
    <div class="info">Status: Mode Tanpa Database (Aman & Gampang untuk Tugas Kuliah)</div>
    
    <!-- Form Tambah Tugas -->
    <form method="POST" action="">
        <input type="text" name="task_name" placeholder="Masukkan nama tugas baru..." required autocomplete="off">
        <button type="submit">Tambah Tugas</button>
    </form>

    <!-- Daftar Tugas -->
    <h3>Daftar Tugas Aktif:</h3>
    <ul>
        <?php if (empty($_SESSION['tasks'])): ?>
            <li>Belum ada tugas yang ditambahkan.</li>
        <?php else: ?>
            <?php foreach ($_SESSION['tasks'] as $task): ?>
                <li><?php echo $task; ?></li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</div>

</body>
</html>
