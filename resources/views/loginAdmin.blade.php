<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    @vite(['resources/js/app.js'])
</head>

<body>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card p-3 mt-5">
                    <form class="was-validated" action="/loginAdmin/proses" method="get">
                        <div class="mb-3">
                            <label for="validationTextarea" class="form-label">Username</label>
                            <input type="text" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" name="username" required>
                            <div class="invalid-feedback">
                                Username tidak boleh kosong.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="validationTextarea" class="form-label">password</label>
                            <input type="password" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" name="password" required>
                            <div class="invalid-feedback">
                                password tidak boleh kosong.
                            </div>
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

</body>

</html>