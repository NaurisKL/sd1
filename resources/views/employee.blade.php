<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Darbuotojo Sritis</title>
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
            margin-top: 20px;
        }
        .conference-item {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .conference-item h3 {
            margin-top: 0;
            color: #333;
        }
        .registrants {
            margin-top: 15px;
            padding: 15px;
            background: #f9f9f9;
            border-radius: 4px;
        }
        .registrant {
            padding: 8px;
            border-bottom: 1px solid #eee;
        }
        .registrant:last-child {
            border-bottom: none;
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
        .status {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.9em;
            margin-left: 10px;
        }
        .status-upcoming {
            background-color: #e3f2fd;
            color: #1976d2;
        }
        .status-past {
            background-color: #f5f5f5;
            color: #757575;
        }
    </style>
</head>
<body>
    @include('components.navbar')
    <div class="container">
        <a href="/" class="back-btn">← Grįžti</a>
        <h1>Konferencijų Sąrašas</h1>
        
        <div class="conference-list">
            <div class="conference-item">
                <h3>IT Konferencija 2024 <span class="status status-upcoming">Planuojama</span></h3>
                <p>Data: 2024-06-15</p>
                <p>Vieta: Vilnius, Lietuva</p>
                <div class="registrants">
                    <h4>Užsiregistravę dalyviai:</h4>
                    <div class="registrant">Jonas Jonaitis</div>
                    <div class="registrant">Petras Petraitis</div>
                    <div class="registrant">Ona Onaitė</div>
                </div>
            </div>
            
            <div class="conference-item">
                <h3>Mokslo Forumas 2023 <span class="status status-past">Įvykusi</span></h3>
                <p>Data: 2023-07-20</p>
                <p>Vieta: Kaunas, Lietuva</p>
                <div class="registrants">
                    <h4>Dalyviai:</h4>
                    <div class="registrant">Marija Marijaitė</div>
                    <div class="registrant">Antanas Antanaitis</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 