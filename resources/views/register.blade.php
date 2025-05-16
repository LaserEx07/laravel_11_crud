<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: "Sans Serif", sans-serif;
        }
        .custom-border {
            border: 2px solid #2D582E;
        }
        .btn {
            color: white;
            border: none;
            padding: 10px 20px;
            width: 100%;
            background-color: yellow;
            color: #2D582E;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            border: 2px solid #2D582E;
            font-style: Sans serif;
        }
        h2 {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            color: #2D582E;
            padding-bottom: 20px;
        }
        .form-label {
            color: #2D582E;
            font-weight: 500;
        }
        .register-link {
            color: #2D582E;
            text-decoration: underline;
        }
        .register-link:hover {
            color: #1a3a1c;
        }
    </style>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-md custom-border">
        <h2><u>Register</u></h2>

        <form action="{{ route('register.user') }}" method="post" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="form-label block text-sm font-medium">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" value="{{ old('name') }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-yellow-500 focus:border-yellow-500 custom-border">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="email" class="form-label block text-sm font-medium">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-yellow-500 focus:border-yellow-500 custom-border">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="password" class="form-label block text-sm font-medium">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-yellow-500 focus:border-yellow-500 custom-border">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="form-label block text-sm font-medium">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-yellow-500 focus:border-yellow-500 custom-border">
            </div>

            <button type="submit" class="btn">
                <u>Register</u>
            </button>
        </form>

        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">Already have an account? <a href="{{ route('login') }}"
                    class="register-link">Login</a>
            </p>
        </div>
    </div>
</body>

</html>
