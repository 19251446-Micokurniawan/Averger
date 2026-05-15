<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 500px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 500px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
</style>
</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="#home" class="active">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<div style="padding-left:16px">
  <h2>Form Input Mahasiswa</h2>
  <form id="mahasiswaForm" action="#" method="post">
    <table border="1" style="width:100%; border-collapse: collapse;">
      <thead>
        <tr style="background-color: #f2f2f2;">
          <th style="padding: 8px; text-align: left;">Nama</th>
          <th style="padding: 8px; text-align: left;">NIM</th>
          <th style="padding: 8px; text-align: left;">Mata Kuliah</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td style="padding: 8px;"><input type="text" id="nama" name="nama" required style="width: 100%; border: none;"></td>
          <td style="padding: 8px;"><input type="text" id="nim" name="nim" required style="width: 100%; border: none;"></td>
          <td style="padding: 8px;"><input type="text" id="mata_kuliah" name="mata_kuliah" required style="width: 100%; border: none;"></td>
        </tr>
      </tbody>
    </table>
    <br>
    <input type="submit" value="Simpan" style="padding: 10px 20px; background-color: #04AA6D; color: white; border: none; cursor: pointer;">
  </form>

  <h3>History Input</h3>
  <div id="history">
    <!-- History akan ditampilkan di sini -->
  </div>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

// Fungsi untuk menampilkan history
function displayHistory() {
  const historyDiv = document.getElementById('history');
  const history = JSON.parse(localStorage.getItem('mahasiswaHistory')) || [];
  historyDiv.innerHTML = '';
  if (history.length === 0) {
    historyDiv.innerHTML = '<p>Tidak ada history.</p>';
    return;
  }
  const table = document.createElement('table');
  table.setAttribute('border', '1');
  table.style.width = '100%';
  table.style.borderCollapse = 'collapse';
  const thead = document.createElement('thead');
  thead.innerHTML = `
    <tr style="background-color: #f2f2f2;">
      <th style="padding: 8px; text-align: left;">Nama</th>
      <th style="padding: 8px; text-align: left;">NIM</th>
      <th style="padding: 8px; text-align: left;">Mata Kuliah</th>
      <th style="padding: 8px; text-align: left;">Tanggal</th>
    </tr>
  `;
  table.appendChild(thead);
  const tbody = document.createElement('tbody');
  history.forEach(item => {
    const tr = document.createElement('tr');
    tr.innerHTML = `
      <td style="padding: 8px;">${item.nama}</td>
      <td style="padding: 8px;">${item.nim}</td>
      <td style="padding: 8px;">${item.mata_kuliah}</td>
      <td style="padding: 8px;">${item.timestamp}</td>
    `;
    tbody.appendChild(tr);
  });
  table.appendChild(tbody);
  historyDiv.appendChild(table);
}

// Handle form submit
document.getElementById('mahasiswaForm').addEventListener('submit', function(e) {
  e.preventDefault();
  const nama = document.getElementById('nama').value;
  const nim = document.getElementById('nim').value;
  const mata_kuliah = document.getElementById('mata_kuliah').value;
  const timestamp = new Date().toLocaleString();
  const newEntry = { nama, nim, mata_kuliah, timestamp };
  const history = JSON.parse(localStorage.getItem('mahasiswaHistory')) || [];
  history.push(newEntry);
  localStorage.setItem('mahasiswaHistory', JSON.stringify(history));
  displayHistory();
  this.reset();
});

// Load history saat page load
window.addEventListener('load', displayHistory);
</script>

</body>
</html>