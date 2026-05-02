<?php
include_once dirname(__DIR__) . "/controller/PesananController.php";
$controller = new PesananController();

// Logika Hapus
if(isset($_GET['hapus'])) {
    $controller->model->delete($_GET['hapus']);
    header("Location: list.php");
    exit();
}

$data = $controller->model->getAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan Desain</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 p-6 md:p-12">
    <div class="max-w-6xl mx-auto">
        
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 flex items-center gap-3">
                📋 Daftar Pesanan Desain
            </h1>
            <a href="tambah.php" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2.5 rounded-xl shadow-md transition-all flex items-center gap-2">
                <span class="text-xl font-bold">+</span> Tambah Data
            </a>
        </div>

        <!-- Table Card -->
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 text-gray-500 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="px-6 py-4 font-semibold">No</th>
                        <th class="px-6 py-4 font-semibold">Nama Klien</th>
                        <th class="px-6 py-4 font-semibold">Harga</th>
                        <th class="px-6 py-4 font-semibold">Status</th>
                        <th class="px-6 py-4 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php 
                    $no = 1; 
                    if ($data && $data->num_rows > 0):
                        while($row = $data->fetch_assoc()): 
                    ?>
                    <tr class="hover:bg-indigo-50/30 transition-colors">
                        <td class="px-6 py-4 text-gray-400 font-medium"><?= $no++; ?></td>
                        <td class="px-6 py-4">
                            <span class="text-gray-800 font-semibold text-lg"><?= $row['nama_klien']; ?></span>
                        </td>
                       <td class="px-6 py-4 text-gray-600 font-medium">
                       Rp <?= number_format($row['harga'], 0, ',', '.'); ?>
                        </td>
                        <td class="px-6 py-4">
                            <?php 
                                $status = $row['status'];
                                $colorClass = "bg-gray-100 text-gray-600"; // Default
                                if($status == 'Selesai') $colorClass = "bg-green-100 text-green-700";
                                if($status == 'Proses') $colorClass = "bg-yellow-100 text-yellow-700";
                                if($status == 'Pending') $colorClass = "bg-red-100 text-red-700";
                            ?>
                            <span class="px-3 py-1 rounded-full text-xs font-bold <?= $colorClass; ?>">
                                <?= strtoupper($status); ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center gap-4">
                                <a href="edit.php?id=<?= $row['id']; ?>" class="text-blue-600 hover:text-blue-800 font-semibold transition-colors">Edit</a>
                                <a href="list.php?hapus=<?= $row['id']; ?>" onclick="return confirm('Hapus data <?= $row['nama_klien']; ?>?')" class="text-red-500 hover:text-red-700 font-semibold transition-colors">Hapus</a>
                            </div>
                        </td>
                    </tr>
                    <?php 
                        endwhile; 
                    else:
                    ?>
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-gray-400 italic">Belum ada data pesanan.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>