<?php
include_once dirname(__DIR__) . "/controller/PesananController.php";
$controller = new PesananController();

if(isset($_POST['simpan'])) {
    $controller->model->create(
        $_POST['nama_klien'], $_POST['jenis_desain'], 
        $_POST['deadline'], $_POST['harga'], $_POST['status']
    );
    header("Location: list.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pesanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10 font-sans">
    <div class="max-w-md mx-auto bg-white p-8 rounded-2xl shadow-lg">
        <h2 class="text-xl font-bold mb-6 text-gray-800">Tambah Pesanan</h2>
        <form method="POST" class="space-y-4">
            <input type="text" name="nama_klien" placeholder="Nama Klien" class="w-full p-2 border rounded-md" required>
            <input type="text" name="jenis_desain" placeholder="Jenis Desain" class="w-full p-2 border rounded-md" required>
            <input type="date" name="deadline" class="w-full p-2 border rounded-md" required>
            <input type="number" name="harga" placeholder="Harga" class="w-full p-2 border rounded-md" required>
            <select name="status" class="w-full p-2 border rounded-md">
                <option value="Pending">Pending</option>
                <option value="Proses">Proses</option>
                <option value="Selesai">Selesai</option>
            </select>
            <div class="flex justify-between items-center pt-4">
                <a href="list.php" class="text-gray-500 hover:underline text-sm">Kembali</a>
                <button type="submit" name="simpan" class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>