<?php
require 'config/database.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM update_history WHERE laptop_id = ? ORDER BY updated_at DESC");
$stmt->execute([$id]);
$history = $stmt->fetchAll(PDO::FETCH_ASSOC);

include 'header.php';
?>

<h1 class="h3 mb-4 text-gray-800">Update History</h1>
<a href="index.php" class="btn btn-secondary mb-3">Back to Inventory List</a>
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
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($history as $entry) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($entry['id']); ?></td>
                    <td><?php echo htmlspecialchars($entry['brand']); ?></td>
                    <td><?php echo htmlspecialchars($entry['model']); ?></td>
                    <td><?php echo htmlspecialchars($entry['cpu']); ?></td>
                    <td><?php echo htmlspecialchars($entry['ram']); ?></td>
                    <td><?php echo htmlspecialchars($entry['storage']); ?></td>
                    <td><?php echo htmlspecialchars($entry['gpu']); ?></td>
                    <td><?php echo htmlspecialchars($entry['screen_size']); ?></td>
                    <td><?php echo htmlspecialchars($entry['battery']); ?></td>
                    <td><?php echo htmlspecialchars($entry['os']); ?></td>
                    <td><?php echo htmlspecialchars($entry['serial_number']); ?></td>
                    <td><?php
                        // Kode format tanggal bahasa Indonesia
                        $tanggal = $entry['purchase_date'];
                        $timestamp = strtotime($tanggal);
                        $hari = date('w', $timestamp); // Ambil hari dalam format angka (0-6)
                        $hariIndo = hariIndonesia($hari); // Ubah hari ke bahasa Indonesia
                        $tanggalIndo = date('d', $timestamp); // Ambil tanggal
                        $bulanIndo = bulanIndonesia(date('m', $timestamp)); // Ubah bulan ke bahasa Indonesia
                        $tahunIndo = date('Y', $timestamp); // Ambil tahun
                        echo $hariIndo . ', ' . $tanggalIndo . ' ' . $bulanIndo . ' ' . $tahunIndo;
                        ?></td>
                    <td><?php echo htmlspecialchars($entry['keterangan']); ?></td>
                    <td><?php
                        // Kode format datetime bahasa Indonesia
                        $timestampUpdated = strtotime($entry['updated_at']);
                        $hariUpdated = date('w', $timestampUpdated); // Ambil hari dalam format angka (0-6)
                        $hariIndoUpdated = hariIndonesia($hariUpdated); // Ubah hari ke bahasa Indonesia
                        $tanggalIndoUpdated = date('d', $timestampUpdated); // Ambil tanggal
                        $bulanIndoUpdated = bulanIndonesia(date('m', $timestampUpdated)); // Ubah bulan ke bahasa Indonesia
                        $tahunIndoUpdated = date('Y', $timestampUpdated); // Ambil tahun
                        $jamIndoUpdated = date('H:i:s', $timestampUpdated); // Ambil jam, menit, detik
                        echo $hariIndoUpdated . ', ' . $tanggalIndoUpdated . ' ' . $bulanIndoUpdated . ' ' . $tahunIndoUpdated . ', ' . $jamIndoUpdated;
                        ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>