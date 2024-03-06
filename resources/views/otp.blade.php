<!-- resources/views/verify-otp.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <style>
        .otp-input {
            width: 40px;
            height: 40px;
            text-align: center;
            margin: 0 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Verify OTP</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('otp.verify') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="otp" class="col-md-4 col-form-label text-md-right">Enter OTP</label>

                                <div class="col-md-6">
                                    <div class="otp-group">
                                        <input type="text" class="otp-input" name="digit1" maxlength="1" pattern="[0-9]" required>
                                        <input type="text" class="otp-input" name="digit2" maxlength="1" pattern="[0-9]" required>
                                        <input type="text" class="otp-input" name="digit3" maxlength="1" pattern="[0-9]" required>
                                        <input type="text" class="otp-input" name="digit4" maxlength="1" pattern="[0-9]" required>
                                    </div>

                                    @error('otp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Verify OTP
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
