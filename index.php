<?php
session_start();

if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}

if (isset($_POST['add_task'])) {
    $taskName = trim($_POST['task_name']);
    $taskAssignee = trim($_POST['task_assignee']);
    
    if (!empty($taskName) && !empty($taskAssignee)) {
        $_SESSION['tasks'][] = [
            'name' => htmlspecialchars($taskName),
            'assignee' => htmlspecialchars($taskAssignee)
        ];
    }
    header("Location: index.php");
    exit();
}

if (isset($_GET['delete'])) {
    $index = $_GET['delete'];
    if (isset($_SESSION['tasks'][$index])) {
        unset($_SESSION['tasks'][$index]);
        $_SESSION['tasks'] = array_values($_SESSION['tasks']);
    }
    header("Location: index.php");
    exit();
}

$total_tasks = count($_SESSION['tasks']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Tugas Tim - Tugas Kuliah</title>
    <!-- Google Fonts Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- CSS Eksternal -->
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="wrapper">
    <!-- Header -->
    <div class="header">
        <h1><i class="fa-solid fa-list-check"></i> Manajemen Tugas Kuliah</h1>
        <p>Proyek Kolaborasi Tim Pengembang (Session-Based)</p>
    </div>

    <!-- Statistik & Info Tim -->
    <div class="info-section">
        <div class="stat-box">
            <span>Total Tugas Aktif</span>
            <strong><?= $total_tasks; ?></strong>
        </div>
        <div class="team-box">
            <span>👥 Anggota Tim:</span>
            <ul>
                <li><strong>Aril Putra</strong> (Ketua / Lead)</li>
                <li><strong>Ahmad Tama</strong> (Developer)</li>
                <li><strong>Wahib Maulana</strong> (Developer)</li>
            </ul>
        </div>
    </div>

    <div class="content">
        <!-- Form Input -->
        <form method="POST" action="" id="taskForm">
            <input type="text" name="task_name" id="taskInput" placeholder="Tulis tugas atau fitur baru..." autocomplete="off" required>
            <select name="task_assignee" required>
                <option value="">-- Pilih Anggota --</option>
                <option value="Aril Putra (Ketua)">Aril Putra (Ketua)</option>
                <option value="Ahmad Tama">Ahmad Tama</option>
                <option value="Wahib Maulana">Wahib Maulana</option>
            </select>
            <button type="submit" name="add_task" class="btn-add">
                <i class="fa-solid fa-plus"></i> Tambah
            </button>
        </form>

        <!-- Tabel Data -->
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th style="width: 8%;">No</th>
                        <th>Nama Tugas / Fitur</th>
                        <th>Penanggung Jawab</th>
                        <th style="width: 15%; text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($_SESSION['tasks'])): ?>
                        <tr>
                            <td colspan="4" class="empty-state">
                                <i class="fa-regular fa-folder-open"></i>
                                Belum ada tugas. Silakan tambahkan tugas tim di atas!
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($_SESSION['tasks'] as $index => $task): ?>
                            <tr>
                                <td><?= $index + 1; ?></td>
                                <td style="font-weight: 500;"><?= $task['name']; ?></td>
                                <td>
                                    <span class="badge"><i class="fa-solid fa-user"></i> <?= $task['assignee']; ?></span>
                                </td>
                                <td style="text-align: center;">
                                    <a href="?delete=<?= $index; ?>" onclick="return confirm('Yakin ingin menghapus tugas ini?');" class="btn-delete">
                                        <i class="fa-solid fa-trash-can"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer Tim -->
    <div class="footer">
        <p>&copy; 2026 Tugas Kuliah Proyek | <strong>Aril Putra, Ahmad Tama, Wahib Maulana</strong></p>
    </div>
</div>

<!-- JS Eksternal -->
<script src="assets/script.js"></script>
</body>
</html>
