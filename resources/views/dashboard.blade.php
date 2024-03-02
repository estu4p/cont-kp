<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        .container {
            padding: 20px;
        }

        .card-group {
            display: flex;
            gap: 20px;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 400px;
        }

        .card-header {
            color: #333;
            background-color: #f7f7f7; 
            border-bottom: 1px solid #ccc; 
            padding: 10px;
            font-size: 30px;
        }

        .card-title {
            font-weight: bold;
            font-size: 18px;
        }

        .card-text {
            font-size: 16px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <h1>SELAMAT DATANG</h1>
    <h2>DI PANEL CONTRIBUTOR</h2>
    <p>Pantau Mahasiswa/Siswa/i Anda Disini</p>

    <div class="card-group">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Jumlah Mahasiswa</h5>
                <p class="card-text">5</p>
            </div>
            <div class="card-body">
                <a href="#" class="btn btn-primary">View Detail</a>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                <div>
                    <h5 class="card-title">Masuk</h5>
                    <p class="card-text">5</p>
                </div>
                <div>
                    <h5 class="card-title">Izin</h5>
                    <p class="card-text">8</p>
                </div>
            </div>
            <div class="card-body">
                <a href="#" class="btn btn-primary">View Detail</a>
            </div>
        </div>
    </div>
</body>
</html>
