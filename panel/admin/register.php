<?php include "header.php"?>
<body id="page-top">
    <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-2 d-none d-lg-block "></div>
                <div class="col-lg-8">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Registrasi Akun</h1>
                        </div>
                        <form class="user" method="post" action="proses-regis.php">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="username"
                                placeholder="Username" name="username" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nama"
                                    placeholder="Nama" name="nama" required>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user"
                                        id="Password" placeholder="Password" name="password" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user"
                                    id="RepeatPassword" placeholder="Ulang Password" name="password2" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="email"
                                    placeholder="Email" name="email" required>
                            </div>
                            <div class="form-group">
                                <select class="form-select form-control form-control user" id="akses" name="akses" required>
                                    <option value="" disabled selected>Pilih Hak Akses</option>
                                    <option value="admin">Admin</option>
                                    <option value="operator">Operator</option>
                                </select>
                            </div>
                            <button type="submit" name="regis" class="btn btn-primary btn-user btn-block">Buat Akun</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function validateForm() {
        var nama = document.getElementById("nama").value;
        var username = document.getElementById("username").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("Password").value;
        var repeatPassword = document.getElementById("RepeatPassword").value;
        var akses = document.getElementById("akses").value;

        if (nama === "" || username === "" || email === "" || password === "" || repeatPassword === "" || akses === "") {
            alert("Please fill in all fields");
            return false;
        }
        return true;
    }
</script>

    <?php include "footer.php"?>
   