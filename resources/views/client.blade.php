<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kliento Sritis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .conference-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .conference-card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .conference-card h3 {
            margin-top: 0;
            color: #333;
        }
        .register-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }
        .register-btn:hover {
            background-color: #45a049;
        }
        .back-btn {
            background-color: #666;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
        }
        .back-btn:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    @include('components.navbar')
    <div class="container">
        <a href="/" class="back-btn">← Grįžti</a>
        <h1>Planuojamos Konferencijos</h1>
        
        <div class="conference-list">
            <!-- Example conference cards -->
            <div class="conference-card">
                <h3>IT Konferencija 2024</h3>
                <p>Data: 2024-06-15</p>
                <p>Vieta: Vilnius, Lietuva</p>
                <p>Aprašymas: Metinė IT konferencija su naujausiomis technologijomis.</p>
                <a href="#" class="register-btn">Registruotis</a>
            </div>
            
            <div class="conference-card">
                <h3>Mokslo Forumas</h3>
                <p>Data: 2024-07-20</p>
                <p>Vieta: Kaunas, Lietuva</p>
                <p>Aprašymas: Mokslo ir inovacijų forumas.</p>
                <a href="#" class="register-btn">Registruotis</a>
            </div>
        </div>
    </div>
</body>
</html> 