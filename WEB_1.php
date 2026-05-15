<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title>Data Penilaian Mahasiswa</title>

<style>
body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    background-color: #f4f4f4;
}

/* Navbar */
.topnav {
    overflow: hidden;
    background-color: #333;
}

.topnav a {
    float: left;
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}

.topnav a:hover {
    background-color: #ddd;
    color: black;
}

.topnav .active {
    background-color: #04AA6D;
    color: white;
}

.topnav .icon {
    display: none;
}

/* Responsive Navbar */
@media screen and (max-width: 600px) {
    .topnav a:not(:first-child) {
        display: none;
    }

    .topnav a.icon {
        float: right;
        display: block;
    }
}

@media screen and (max-width: 600px) {
    .topnav.responsive {
        position: relative;
    }

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

/* Container */
.container {
    padding: 20px;
}

/* Card */
.card {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
    margin-bottom: 20px;
}

/* Table */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

table, th, td {
    border: 1px solid #ccc;
}

th {
    background-color: #04AA6D;
    color: white;
}

th, td {
    padding: 10px;
    text-align: left;
}

/* Button */
button,
input[type=submit] {
    background-color: #04AA6D;
    color: white;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

button:hover,
input[type=submit]:hover {
    background-color: #038f5a;
}

/* Input */
input[type=text],
input[type=number],
select {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
}
</style>
</head>

<body>

<!-- Navbar -->
<div class="topnav" id="myTopnav">
    <a href="#" class="active">Home</a>
    <a href="#">Data Mahasiswa</a>
    <a href="#">Penilaian</a>
    <a href="#">About</a>

    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
    </a>
</div>

<div class="container">

    <!-- Form Input -->
    <div class="card">
        <h2>Form Penilaian Mahasiswa</h2>

        <form id="nilaiForm">

            <table>
                <tr>
                    <td>Nama Mahasiswa</td>
                    <td>
                        <input type="text" id="nama" required>
                    </td>
                </tr>

                <tr>
                    <td>NIM</td>
                    <td>
                        <input type="text" id="nim" required>
                    </td>
                </tr>

                <tr>
                    <td>Mata Kuliah</td>
                    <td>
                        <input type="text" id="matkul" required>
                    </td>
                </tr>

                <tr>
                    <td>Kehadiran (20%)</td>
                    <td>
                        <input type="number" id="kehadiran" min="0" max="100" required>
                    </td>
                </tr>

                <tr>
                    <td>Tugas (25%)</td>
                    <td>
                        <input type="number" id="tugas" min="0" max="100" required>
                    </td>
                </tr>

                <tr>
                    <td>Project Akhir (55%)</td>
                    <td>
                        <input type="number" id="project" min="0" max="100" required>
                    </td>
                </tr>

                <tr>
                    <td>Jenis Asesmen</td>
                    <td>
                        <input type="checkbox" checked> Tes Tertulis <br>
                        <input type="checkbox"> Ujian Lisan <br>
                        <input type="checkbox" checked> Tes Kinerja Praktik <br>
                        <input type="checkbox" checked> Tugas / Portofolio
                    </td>
                </tr>

                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="Simpan Data">
                    </td>
                </tr>
            </table>

        </form>
    </div>

    <!-- Keterangan -->
    <div class="card">
        <h2>Keterangan</h2>

        <h3>Bobot Penilaian</h3>

        <table>
            <tr>
                <th>Komponen</th>
                <th>Bobot</th>
            </tr>

            <tr>
                <td>Kehadiran</td>
                <td>20%</td>
            </tr>

            <tr>
                <td>Tugas</td>
                <td>25%</td>
            </tr>

            <tr>
                <td>Project Akhir</td>
                <td>55%</td>
            </tr>
        </table>

        <h3>Range Nilai</h3>

        <table>
            <tr>
                <th>Angka</th>
                <th>Huruf</th>
            </tr>

            <tr>
                <td>80 - 100</td>
                <td>A</td>
            </tr>

            <tr>
                <td>70 - 79</td>
                <td>B</td>
            </tr>

            <tr>
                <td>60 - 69</td>
                <td>C</td>
            </tr>

            <tr>
                <td>31 - 59</td>
                <td>D</td>
            </tr>

            <tr>
                <td>0 - 30</td>
                <td>E</td>
            </tr>
        </table>
    </div>

    <!-- History -->
    <div class="card">
        <h2>History Penilaian</h2>

        <div id="historyData">
            Belum ada data.
        </div>
    </div>

</div>

<script>

/* Navbar Responsive */
function myFunction() {
    var x = document.getElementById("myTopnav");

    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

/* Menentukan Nilai Huruf */
function getGrade(nilai) {

    if (nilai >= 80) {
        return "A";
    } else if (nilai >= 70) {
        return "B";
    } else if (nilai >= 60) {
        return "C";
    } else if (nilai >= 31) {
        return "D";
    } else {
        return "E";
    }
}

/* Tampilkan History */
function tampilHistory() {

    const data = JSON.parse(localStorage.getItem("dataMahasiswa")) || [];

    const historyDiv = document.getElementById("historyData");

    if (data.length === 0) {
        historyDiv.innerHTML = "Belum ada data.";
        return;
    }

    let table = `
    <table>
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Mata Kuliah</th>
            <th>Nilai Akhir</th>
            <th>Grade</th>
        </tr>
    `;

    data.forEach(item => {
        table += `
        <tr>
            <td>${item.nama}</td>
            <td>${item.nim}</td>
            <td>${item.matkul}</td>
            <td>${item.nilai}</td>
            <td>${item.grade}</td>
        </tr>
        `;
    });

    table += `</table>`;

    historyDiv.innerHTML = table;
}

/* Submit Form */
document.getElementById("nilaiForm")
.addEventListener("submit", function(e) {

    e.preventDefault();

    const nama = document.getElementById("nama").value;
    const nim = document.getElementById("nim").value;
    const matkul = document.getElementById("matkul").value;

    const kehadiran = parseFloat(document.getElementById("kehadiran").value);
    const tugas = parseFloat(document.getElementById("tugas").value);
    const project = parseFloat(document.getElementById("project").value);

    /* Perhitungan Nilai */
    const nilaiAkhir =
        (kehadiran * 0.20) +
        (tugas * 0.25) +
        (project * 0.55);

    const grade = getGrade(nilaiAkhir);

    const dataBaru = {
        nama: nama,
        nim: nim,
        matkul: matkul,
        nilai: nilaiAkhir.toFixed(2),
        grade: grade
    };

    let data = JSON.parse(localStorage.getItem("dataMahasiswa")) || [];

    data.push(dataBaru);

    localStorage.setItem("dataMahasiswa", JSON.stringify(data));

    tampilHistory();

    alert("Data berhasil disimpan!");

    document.getElementById("nilaiForm").reset();
});

/* Load Data */
window.onload = tampilHistory;

</script>

</body>
</html>