<?php
require 'config/database.php';

$query = $pdo->query("SELECT * FROM hardware_laptops");
$laptops = $query->fetchAll(PDO::FETCH_ASSOC);
include 'header.php';
?>

<h1 class="h3 mb-4 text-gray-800">Inventory List</h1>
<a href="create.php" class="btn btn-primary mb-3">Add New Laptop</a>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Cpu</th>
                <th>Ram</th>
                <th>Storage</th>
                <th>Gpu</th>
                <th>Screen Size</th>
                <th>Battery</th>
                <th>Os</th>
                <th>Serial Number</th>
                <th>Purchase Date</th>
                <th>Keterangan</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($laptops as $laptop) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($laptop['id']); ?></td>
                    <td><?php echo htmlspecialchars($laptop['brand']); ?></td>
                    <td><?php echo htmlspecialchars($laptop['model']); ?></td>
                    <td><?php echo htmlspecialchars($laptop['cpu']); ?></td>
                    <td><?php echo htmlspecialchars($laptop['ram']); ?></td>
                    <td><?php echo htmlspecialchars($laptop['storage']); ?></td>
                    <td><?php echo htmlspecialchars($laptop['gpu']); ?></td>
                    <td><?php echo htmlspecialchars($laptop['screen_size']); ?></td>
                    <td><?php echo htmlspecialchars($laptop['battery']); ?></td>
                    <td><?php echo htmlspecialchars($laptop['os']); ?></td>
                    <td><?php echo htmlspecialchars($laptop['serial_number']); ?></td>
                    <td><?php
                        // Kode format tanggal bahasa Indonesia
                        $tanggal = $laptop['purchase_date'];
                        $timestamp = strtotime($tanggal);
                        $hari = date('w', $timestamp); // Ambil hari dalam format angka (0-6)
                        $hariIndo = hariIndonesia($hari); // Ubah hari ke bahasa Indonesia
                        $tanggalIndo = date('d', $timestamp); // Ambil tanggal
                        $bulanIndo = bulanIndonesia(date('m', $timestamp)); // Ubah bulan ke bahasa Indonesia
                        $tahunIndo = date('Y', $timestamp); // Ambil tahun
                        echo $hariIndo . ', ' . $tanggalIndo . ' ' . $bulanIndo . ' ' . $tahunIndo;
                        ?></td>
                    <td><?php echo htmlspecialchars($laptop['keterangan']); ?></td>
                    <td>
                        <a href="update.php?id=<?php echo $laptop['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete.php?id=<?php echo $laptop['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        <a href="history.php?id=<?php echo $laptop['id']; ?>" class="btn btn-info btn-sm">View History</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>