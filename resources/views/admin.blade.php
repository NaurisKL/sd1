<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administratoriaus Sritis</title>
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
        .section {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .section h2 {
            margin-top: 0;
            color: #333;
        }
        .action-btn {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin: 5px;
        }
        .action-btn.delete {
            background-color: #f44336;
        }
        .action-btn.edit {
            background-color: #2196F3;
        }
        .action-btn:hover {
            opacity: 0.9;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f5f5f5;
        }
        .add-new {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    @include('components.navbar')
    <div class="container">
        <a href="/" class="back-btn">← Grįžti</a>
        
        <div class="section">
            <h2>Konferencijų Valdymas</h2>
            <a href="#" class="add-new">+ Pridėti naują konferenciją</a>
            <table>
                <thead>
                    <tr>
                        <th>Pavadinimas</th>
                        <th>Data</th>
                        <th>Vieta</th>
                        <th>Veiksmai</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>IT Konferencija 2024</td>
                        <td>2024-06-15</td>
                        <td>Vilnius</td>
                        <td>
                            <a href="#" class="action-btn edit">Redaguoti</a>
                            <a href="#" class="action-btn delete">Šalinti</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Mokslo Forumas</td>
                        <td>2024-07-20</td>
                        <td>Kaunas</td>
                        <td>
                            <a href="#" class="action-btn edit">Redaguoti</a>
                            <a href="#" class="action-btn delete">Šalinti</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="section">
            <h2>Naudotojų Valdymas</h2>
            <table>
                <thead>
                    <tr>
                        <th>Vardas</th>
                        <th>Pavardė</th>
                        <th>Tipas</th>
                        <th>Veiksmai</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Jonas</td>
                        <td>Jonaitis</td>
                        <td>Klientas</td>
                        <td>
                            <a href="#" class="action-btn edit">Redaguoti</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Petras</td>
                        <td>Petraitis</td>
                        <td>Darbuotojas</td>
                        <td>
                            <a href="#" class="action-btn edit">Redaguoti</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html> 