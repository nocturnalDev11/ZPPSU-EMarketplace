<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Account Credentials</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-100 p-6">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Hello, {{ $user->first_name }} {{ $user->last_name }}!</h1>
        <p class="text-gray-700 mb-2">Here are your account credentials. Use this as you log in:</p>
        <p class="text-gray-600 mb-2"><strong>University ID:</strong> {{ $user->university_id }}</p>
        <p class="text-gray-600 mb-2"><strong>Password:</strong> securePassword123!</p>
        <p class="text-gray-600">For your security, please safeguard this information. You can update your password after
            logging in.</p>
    </div>
</body>

</html>
