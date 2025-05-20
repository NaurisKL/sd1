<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Types</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        .user-types {
            display: flex;
            gap: 2rem;
        }
        .user-type {
            padding: 1rem 2rem;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .user-type:hover {
            background-color: #45a049;
        }
        .student-info {
            margin-bottom: 2rem;
            text-align: center;
            color: #333;
        }
        .student-info h1 {
            margin: 0;
            font-size: 1.5rem;
        }
        .student-info p {
            margin: 0.5rem 0 0 0;
            font-size: 1.2rem;
            color: #666;
        }
    </style>
</head>
<body>
    @include('components.navbar')
    <div class="student-info">
        <h1>Nauris Kliucius</h1>
        <p>PIT-21-NL</p>
    </div>
    <div class="user-types">
        <a href="/client" class="user-type">Klientas</a>
        <a href="/employee" class="user-type">Darbuotojas</a>
        <a href="/admin" class="user-type">Administratorius</a>
    </div>
</body>
</html> 