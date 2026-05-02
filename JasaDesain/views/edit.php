<?php
include_once dirname(__DIR__) . "/controller/PesananController.php";
$controller = new PesananController();

$id = $_GET['id'];
$res = $controller->model->getById($id);
$row = $res->fetch_assoc();

if(isset($_POST['update'])) {
    $controller->model->update($id, $_POST['nama_klien'], $_POST['jenis_desain'], $_POST['deadline'], $_POST['harga'], $_POST['status']);
    header("Location: list.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Pesanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
    <div class="max-w-md mx-auto bg-white p-8 rounded-2xl shadow-lg border border-gray-200">
        <h2 class="text-xl font-bold mb-6 text-gray-800">Edit Data Klien</h2>
        <form method="POST" class="space-y-4">
            <input type="text" name="nama_klien" value="<?= $row['nama_klien'] ?>" class="w-full p-2 border rounded-md">
            <input type="text" name="jenis_desain" value="<?= $row['jenis_desain'] ?>" class="w-full p-2 border rounded-md">
            <input type="date" name="deadline" value="<?= $row['deadline'] ?>" class="w-full p-2 border rounded-md">
            <input type="number" name="harga" value="<?= $row['harga'] ?>" class="w-full p-2 border rounded-md">
            <select name="status" class="w-full p-2 border rounded-md">
                <option value="Pending" <?= $row['status']=='Pending'?'selected':'' ?>>Pending</option>
                <option value="Proses" <?= $row['status']=='Proses'?'selected':'' ?>>Proses</option>
                <option value="Selesai" <?= $row['status']=='Selesai'?'selected':'' ?>>Selesai</option>
            </select>
            <button type="submit" name="update" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">Update Data</button>
        </form>
    </div>
</body>
</html>