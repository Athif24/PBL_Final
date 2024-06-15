<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <div class="card-header text-center">
    <img class="img" src="dist/img/polinema.png" alt="polinema" style="width: 150px; height: auto; margin-bottom: 10px;">
      <h2 style="font-size:20px"><b>Survey Polinema</b></h2>
    </div>
    <title>Survey Selection</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script>
        function handleSelection() {
            var selectElement = document.getElementById('userType');
            var buttonElement = document.getElementById('submitButton');
            switch(selectElement.value) {
                case "Admin":
                    window.location.href = 'login.php';
                    break;
                case "Mahasiswa":
                    window.location.href = 'responden_mahasiswa_form.php?bio=mahasiswa';
                    break;
                case "Dosen":
                    window.location.href = 'responden_dosen_form.php?bio=dosen';
                    break;
                case "tendik":
                    window.location.href = 'responden_tendik_form.php?bio=tendik';
                    break;
                case "Orang Tua":
                    window.location.href = 'responden_ortu_form.php?bio=ortu';
                    break;
                case "Alumni":
                    window.location.href = 'responden_alumni_form.php?bio=alumni';
                    break;
                case "Industri":
                    window.location.href = 'responden_industri_form.php?bio=industri';
                    break;
                default:
                    if (selectElement.value !== "") {
                        buttonElement.style.display = 'block';
                    } else {
                        buttonElement.style.display = 'none';
                    }
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-body">
                        <p class="login-box-msg">Pilih Jenis Survey</p>
                        <form action="cek_login.php" method="post">
                            <div class="form-group">
                                <select id="userType" class="form-control" name="username" onchange="handleSelection()">
                                    <option value="">Pilih Salah satu</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Mahasiswa">Mahasiswa</option>
                                    <option value="Dosen">Dosen</option>
                                    <option value="tendik">Tenaga Pendidik</option>
                                    <option value="Orang Tua">Orang Tua</option>
                                    <option value="Alumni">Alumni</option>
                                    <option value="Industri">Industri</option>
                                </select>
                            </div>
                            <div id="buttonContainer">
                                <button id="submitButton" type="submit" class="btn btn-primary" style="display: none;">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
