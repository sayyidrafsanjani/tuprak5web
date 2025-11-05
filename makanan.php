<?php
session_start();
if (empty($_SESSION['login']) || empty($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Makanan Khas Sulawesi Selatan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    form {
      background-color: #fff;
      padding: 2rem;
      margin: 1rem 0;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }
    label {
      display: block;
      margin-bottom: 8px;
    }
    input[type="text"], input[type="file"] {
      width: 100%;
      padding: 8px;
      margin-bottom: 1rem;
      border: 1px solid #ddd;
      border-radius: 4px;
    }
  </style>
</head>
<body>
  <header class="bg-dark text-white text-center py-3">
    <h1>Makanan Khas Sulawesi Selatan</h1>
    <p style="position:absolute; top:10px; right:20px;">Hi, <?php echo htmlspecialchars($username); ?></p>
  </header>
  <div class="container-fluid">
    <div class="row">
      <aside class="col-md-3 col-lg-2 bg-secondary text-white min-vh-100 p-3">
        <nav class="nav flex-column">
          <a class="nav-link text-white" href="dashboard.php">Dashboard</a>
          <a class="nav-link active bg-primary text-white" href="makanan.php">Makanan Khas</a>
          <a class="nav-link text-white" href="logout.php">Keluar</a>
        </nav>
      </aside>
      <main class="col-md-9 col-lg-10 p-4">
        <h2 class="mb-4">Daftar Makanan Khas Sulawesi Selatan</h2>
        <form id="food-form">
          <h4 id="form-title">Tambah Makanan Khas</h4>
          <label for="food-name">Nama Makanan:</label>
          <input type="text" id="food-name" name="food-name" placeholder="Masukkan nama makanan...">
          <label for="food-desc">Deskripsi Makanan:</label>
          <input type="text" id="food-desc" name="food-desc" placeholder="Masukkan deskripsi makanan...">
          <label for="food-image">Gambar Makanan:</label>
          <input type="file" id="food-image" name="food-image">
          <div class="text-end">
            <button type="submit" id="submit-btn" class="btn btn-success">Tambah</button>
          </div>
        </form>
        <table id="food-table" class="table table-striped table-bordered align-middle">
          <thead class="table-dark">
            <tr>
              <th>No</th>
              <th>Nama Makanan</th>
              <th>Gambar</th>
              <th>Deskripsi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Coto Makassar</td>
              <td><img src="coto makassar.jpeg" alt="Coto Makassar" width="100"></td>
              <td>Sup tradisional khas Makassar dengan daging sapi dan rempah khas.</td>
              <td>
                <button class="btn btn-primary btn-sm" onclick="editRow(this)">Edit</button>
                <button class="btn btn-danger btn-sm" onclick="deleteRow(this)">Hapus</button>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>Pallubasa</td>
              <td><img src="pallubasa.jpeg" alt="Pallubasa" width="100"></td>
              <td>Mirip Coto Makassar, tetapi ditambah kelapa parut sangrai.</td>
              <td>
                <button class="btn btn-primary btn-sm" onclick="editRow(this)">Edit</button>
                <button class="btn btn-danger btn-sm" onclick="deleteRow(this)">Hapus</button>
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>Pisang Ijo</td>
              <td><img src="pisang_ijo.jpeg" alt="Pisang Ijo" width="100"></td>
              <td>Pisang dibalut adonan hijau, disajikan dengan sirup merah dan susu.</td>
              <td>
                <button class="btn btn-primary btn-sm" onclick="editRow(this)">Edit</button>
                <button class="btn btn-danger btn-sm" onclick="deleteRow(this)">Hapus</button>
              </td>
            </tr>
          </tbody>
        </table>
      </main>
    </div>
  </div>
  <script>
    let editingRow = null;
    const foodForm = document.getElementById('food-form');
    const foodTable = document.getElementById('food-table').getElementsByTagName('tbody')[0];
    const submitBtn = document.getElementById('submit-btn');
    const formTitle = document.getElementById('form-title');
    foodForm.addEventListener('submit', function(e) {
      e.preventDefault();
      const foodName = document.getElementById('food-name').value.trim();
      const foodDesc = document.getElementById('food-desc').value.trim();
      const foodImage = document.getElementById('food-image').files[0];
      if (!foodName || !foodDesc || !foodImage) {
        alert("Nama, Deskripsi, dan Gambar harus diisi");
        return;
      }
      const reader = new FileReader();
      reader.onload = function(e) {
        if (editingRow) {
          editingRow.cells[1].textContent = foodName;
          editingRow.cells[2].innerHTML = `<img src="${e.target.result}" alt="${foodName}" width="100">`;
          editingRow.cells[3].textContent = foodDesc;
          editingRow = null;
          submitBtn.textContent = "Tambah";
          submitBtn.classList.remove("btn-primary");
          submitBtn.classList.add("btn-success");
          formTitle.textContent = "Tambah Makanan Khas";
          foodForm.reset();
        } else {
          const newRow = foodTable.insertRow();
          const cellNo = newRow.insertCell(0);
          const cellName = newRow.insertCell(1);
          const cellImage = newRow.insertCell(2);
          const cellDesc = newRow.insertCell(3);
          const cellAction = newRow.insertCell(4);
          cellNo.textContent = foodTable.rows.length;
          cellName.textContent = foodName;
          cellImage.innerHTML = `<img src="${e.target.result}" alt="${foodName}" width="100">`;
          cellDesc.textContent = foodDesc;
          cellAction.innerHTML = `
            <button class="btn btn-primary btn-sm" onclick="editRow(this)">Edit</button>
            <button class="btn btn-danger btn-sm" onclick="deleteRow(this)">Hapus</button>
          `;
          foodForm.reset();
        }
      };
      reader.readAsDataURL(foodImage);
    });
    function deleteRow(button) {
      if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
        const row = button.parentElement.parentElement;
        row.remove();
        const rows = foodTable.rows;
        for (let i = 0; i < rows.length; i++) {
          rows[i].cells[0].textContent = i + 1;
        }
      }
    }
    function editRow(button) {
      const row = button.parentElement.parentElement;
      editingRow = row;
      const foodName = row.cells[1].textContent;
      const foodDesc = row.cells[3].textContent;
      document.getElementById('food-name').value = foodName;
      document.getElementById('food-desc').value = foodDesc;
      submitBtn.textContent = "Simpan";
      submitBtn.classList.remove("btn-success");
      submitBtn.classList.add("btn-primary");
      formTitle.textContent = "Edit Makanan Khas";
    }
  </script>
</body>
</html>
