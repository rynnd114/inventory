<?php
require 'config/database.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM hardware_laptops WHERE id = ?");
$stmt->execute([$id]);
$laptop = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $cpu = $_POST['cpu'];
    $ram = $_POST['ram'];
    $storage = $_POST['storage'];
    $gpu = $_POST['gpu'];
    $screen_size = $_POST['screen_size'];
    $battery = $_POST['battery'];
    $os = $_POST['os'];
    $keterangan = $_POST['keterangan'];
    $serial_number = $_POST['serial_number'];
    $purchase_date = $_POST['purchase_date'];

    // Simpan data lama ke tabel update_history
    $sql = "INSERT INTO update_history (laptop_id, brand, model, cpu, ram, storage, gpu, screen_size, battery, os, keterangan, serial_number, purchase_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id, $laptop['brand'], $laptop['model'], $laptop['cpu'], $laptop['ram'], $laptop['storage'], $laptop['gpu'], $laptop['screen_size'], $laptop['battery'], $laptop['os'], $laptop['keterangan'], $laptop['serial_number'], $laptop['purchase_date']]);

    // Update data di tabel laptops
    $sql = "UPDATE hardware_laptops SET brand = ?, model = ?, cpu = ?, ram = ?, storage = ?, gpu = ?, screen_size = ?, battery = ?, os = ?, keterangan = ?, serial_number = ?, purchase_date = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$brand, $model, $cpu, $ram, $storage, $gpu, $screen_size, $battery, $os, $keterangan, $serial_number, $purchase_date, $id]);

    header("Location: index.php");
}

include 'header.php';
?>

<h1 class="h3 mb-4 text-gray-800">Edit Laptop</h1>
<form method="post" class="mb-4">
    <div class="form-group">
        <label>Brand</label>
        <input type="text" name="brand" class="form-control" value="<?php echo htmlspecialchars($laptop['brand']); ?>" required>
    </div>
    <div class="form-group">
        <label>Model</label>
        <input type="text" name="model" class="form-control" value="<?php echo htmlspecialchars($laptop['model']); ?>" required>
    </div>
    <div class="form-group">
        <label>CPU</label>
        <input type="text" name="cpu" class="form-control" value="<?php echo htmlspecialchars($laptop['cpu']); ?>" required>
    </div>
    <div class="form-group">
        <label>RAM</label>
        <input type="text" name="ram" class="form-control" value="<?php echo htmlspecialchars($laptop['ram']); ?>" required>
    </div>
    <div class="form-group">
        <label>Storage</label>
        <input type="text" name="storage" class="form-control" value="<?php echo htmlspecialchars($laptop['storage']); ?>" required>
    </div>
    <div class="form-group">
        <label>GPU</label>
        <input type="text" name="gpu" class="form-control" value="<?php echo htmlspecialchars($laptop['gpu']); ?>" required>
    </div>
    <div class="form-group">
        <label>Screen Size</label>
        <input type="text" name="screen_size" class="form-control" value="<?php echo htmlspecialchars($laptop['screen_size']); ?>" required>
    </div>
    <div class="form-group">
        <label>Battery</label>
        <input type="text" name="battery" class="form-control" value="<?php echo htmlspecialchars($laptop['battery']); ?>" required>
    </div>
    <div class="form-group">
        <label>OS</label>
        <input type="text" name="os" class="form-control" value="<?php echo htmlspecialchars($laptop['os']); ?>" required>
    </div>
    <div class="form-group">
        <label>Keterangan</label>
        <input type="text" name="keterangan" class="form-control" value="<?php echo htmlspecialchars($laptop['keterangan']); ?>" required>
    </div>
    <div class="form-group">
        <label>Serial Number</label>
        <input type="text" name="serial_number" class="form-control" value="<?php echo htmlspecialchars($laptop['serial_number']); ?>" required>
    </div>
    <div class="form-group">
        <label>Purchase Date</label>
        <input type="date" name="purchase_date" class="form-control" value="<?php echo htmlspecialchars($laptop['purchase_date']); ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

<?php include 'footer.php'; ?>
