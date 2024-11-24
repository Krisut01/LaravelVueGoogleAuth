<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Reset and base styles */
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #f4f6f8;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container */
        .dashboard-container {
            max-width: 600px;
            width: 90%;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 30px;
        }

        /* Header */
        .dashboard-container h1 {
            font-size: 2rem;
            margin-bottom: 10px;
            color: #2c3e50;
        }

        .dashboard-container p {
            font-size: 1rem;
            color: #7f8c8d;
            margin-bottom: 20px;
        }

        /* User Info */
        .user-info {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .user-info img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-right: 15px;
        }

        .user-info div {
            text-align: left;
        }

        .user-info div h3 {
            margin: 0;
            font-size: 1.2rem;
            color: #34495e;
        }

        .user-info div span {
            font-size: 0.9rem;
            color: #7f8c8d;
        }

        /* Button */
        .dashboard-container .action-btn {
            display: inline-block;
            padding: 12px 20px;
            font-size: 1rem;
            color: white;
            background-color: #3498db;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin: 10px 5px;
        }

        .dashboard-container .action-btn:hover {
            background-color: #2980b9;
        }

        .dashboard-container .logout-btn {
            background-color: #e74c3c;
        }

        .dashboard-container .logout-btn:hover {
            background-color: #c0392b;
        }

        /* Footer */
        .dashboard-container .footer {
            margin-top: 20px;
            font-size: 0.9rem;
            color: #bdc3c7;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- User Info -->
        <div class="user-info">
            <!-- Display the avatar -->
            <img src="{{ $user->avatar }}" alt="User Avatar">
            <div>
                <h3>{{ $user->name }}</h3>
                <span>{{ $user->email }}</span>
            </div>
        </div>

        <h1>Welcome to Your Dashboard!</h1>
        <p>You have successfully logged in. Start exploring your personalized content.</p>
        <div>
            <a href="/profile" class="action-btn">Go to Profile</a>
            <!-- Logout Button -->
            <form action="/logout" method="POST" style="display: inline;">
                <!-- CSRF Token -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="action-btn logout-btn">Logout</button>
            </form>
        </div>
        <div class="footer">
            &copy; 2024 YourApp. All rights reserved.
        </div>
    </div>
</body>
</html>
