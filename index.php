<?php
// Sederhana: Array untuk menyimpan data tugas sementara (bisa dikembangkan pakai Database nanti)
$tasks = [
    "Menyelesaikan laporan proyek kuliah",
    "Melakukan uji keamanan dengan Burp Suite",
    "Commit kode ke GitHub menggunakan Git Bash"
];

// Cek jika ada tugas baru yang dikirim lewat form
if (isset($_POST['task_name']) && !empty($_POST['task_name'])) {
    $newTask = htmlspecialchars($_POST['task_name']);
    $tasks[] = $newTask;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Tugas - Tugas Kuliah</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f6f9; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h2 { color: #333; text-align: center; }
        form { display: flex; gap: 10px; margin-bottom: 20px; }
        input[type="text"] { flex: 1; padding: 10px; border: 1px solid #ddd; border-radius: 4px; }
        button { padding: 10px 15px; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #218838; }
        ul { list-style-type: none; padding: 0; }
        li { background: #f9f9f9; margin-bottom: 8px; padding: 10px; border-left: 4px solid #007bff; border-radius: 4px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Manajemen Tugas Tim Kuliah</h2>
    
    <!-- Form Tambah Tugas -->
    <form method="POST" action="">
        <input type="text" name="task_name" placeholder="Masukkan nama tugas baru..." required>
        <button type="submit">Tambah Tugas</button>
    </form>

    <!-- Daftar Tugas -->
    <h3>Daftar Tugas Aktif:</h3>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li><?php echo $task; ?></li>
        <?php endforeach; ?>
    </ul>
</div>

</body>
</html>
