<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
        }
        .sidebar {
            width: 250px;
            background: #343a40;
            color: white;
            padding: 20px 0;
        }
        .sidebar a {
            color: white;
            display: block;
            padding: 10px 20px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #495057;
        }
        .main {
            flex: 1;
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center">Admin Panel</h4>
        <a href="#" data-bs-toggle="modal" data-bs-target="#dashboardModal">Dashboard</a>
        <a href="#" data-bs-toggle="modal" data-bs-target="#penggunaModal">Pengguna</a>
        <a href="#" data-bs-toggle="modal" data-bs-target="#laporanModal">Laporan</a>
        <a href="#" data-bs-toggle="modal" data-bs-target="#pengaturanModal">Pengaturan</a>
    </div>




    <!-- Konten Utama -->
    <div class="main">
        <div class="d-flex justify-content-between align-items-center mb-3">
         <h2>Daftar Pengguna</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahPenggunaModal">+ Tambah Pengguna</button>
        </div>
        <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']) ?></td>
                        <td><?= htmlspecialchars($row['nama']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td>
                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#readModal<?= $row['id'] ?>">Read</button>
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id'] ?>">Edit</button>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $row['id'] ?>">Delete</button>
                        </td>
                    </tr>


                    <!-- Modal Read -->
                    <div class="modal fade" id="readModal<?= $row['id'] ?>" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Detail Pengguna</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>ID:</strong> <?= htmlspecialchars($row['id']) ?></p>
                            <p><strong>Nama:</strong> <?= htmlspecialchars($row['nama']) ?></p>
                            <p><strong>Email:</strong> <?= htmlspecialchars($row['email']) ?></p>
                        </div>
                        </div>
                    </div>
                    </div>


                    <!-- Modal Edit -->
                    <div class="modal fade" id="editModal<?= $row['id'] ?>" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Pengguna</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="edit_user.php">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($row['nama']) ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($row['email']) ?>">
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>


                    <!-- Modal Delete -->
                    <div class="modal fade" id="deleteModal<?= $row['id'] ?>" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Konfirmasi Hapus</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah yakin ingin menghapus pengguna <strong><?= htmlspecialchars($row['nama']) ?></strong>?</p>
                        </div>
                        <div class="modal-footer">
                            <form method="POST" action="delete_user.php">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>


                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="4" class="text-center">Tidak ada data</td></tr>
            <?php endif; ?>
        </tbody>
        </table>
    </div>


<!-- Modal Dashboard -->
<div class="modal fade" id="dashboardModal" tabindex="-1" aria-labelledby="dashboardModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="dashboardModalLabel">Dashboard</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <p>Konten dashboard bisa ditaruh di sini.</p>
      </div>
    </div>
  </div>
</div>


<!-- Modal Pengguna -->
<div class="modal fade" id="penggunaModal" tabindex="-1" aria-labelledby="penggunaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="penggunaModalLabel">Daftar Pengguna</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id']) ?></td>
                            <td><?= htmlspecialchars($row['nama']) ?></td>
                            <td><?= htmlspecialchars($row['email']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="3" class="text-center">Tidak ada data</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<!-- Modal Laporan -->
<div class="modal fade" id="laporanModal" tabindex="-1" aria-labelledby="laporanModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="laporanModalLabel">Laporan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <p>Contoh laporan bisa ditampilkan di sini.</p>
      </div>
    </div>
  </div>
</div>


<!-- Modal Pengaturan -->
<div class="modal fade" id="pengaturanModal" tabindex="-1" aria-labelledby="pengaturanModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pengaturanModalLabel">Pengaturan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="siteName" class="form-label">Nama Situs</label>
            <input type="text" class="form-control" id="siteName" value="Admin Panel">
          </div>
          <div class="mb-3">
            <label for="emailSupport" class="form-label">Email Support</label>
            <input type="email" class="form-control" id="emailSupport" value="admin@example.com">
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal Tambah Pengguna -->
<div class="modal fade" id="tambahPenggunaModal" tabindex="-1" aria-labelledby="tambahPenggunaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="tambah_user.php" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Pengguna Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
          <div class="mb-3">
              <label class="form-label">Nama</label>
              <input type="text" name="nama" class="form-control" required>
          </div>
          <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
      </div>
    </form>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
