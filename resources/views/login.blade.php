<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    </style>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-md custom-border">
      

         <h2><u>Login</u></h2>

        <form action="{{ route('login.user') }}" method="post" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-yellow-500 focus:border-yellow-500 custom-border">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" value="{{ old('password') }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-yellow-500 focus:border-yellow-500 custom-border">
            </div>

            <button type="submit"
                class="btn">
                <u>Login</u>
            </button>
        </form>
        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">Don't have an account? <a href="{{ route('register') }}"
                    class="text-yellow-600 hover:underline">Register</a>
            </p>
        </div>
    </div>
</body>

</html>
