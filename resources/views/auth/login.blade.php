<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body{
            background: #f4f7fc;
        }

        .login-card{
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }

        .form-control{
            height: 50px;
            border-radius: 10px;
        }

        .btn-login{
            height: 50px;
            border-radius: 10px;
            font-weight: 600;
        }

        .logo{
            font-size: 32px;
            font-weight: bold;
            color: #0d6efd;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="row justify-content-center align-items-center min-vh-100">

        <div class="col-md-5">

            <div class="card login-card p-4">

                <div class="text-center mb-4">
                    <div class="logo">
                        URL Shortener
                    </div>

                    <p class="text-muted">
                        Login to your account
                    </p>
                </div>

                <form method="POST" action="{{ route('login.submit') }}">

                    @csrf

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label">
                            Email
                        </label>

                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-envelope"></i>
                            </span>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                placeholder="Enter email"
                                required
                            >
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label class="form-label">
                            Password
                        </label>

                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-lock"></i>
                            </span>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="Enter password"
                                required
                            >
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-login">
                            Login
                        </button>
                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

</body>
</html>