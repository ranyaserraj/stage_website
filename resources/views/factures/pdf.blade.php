<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Facture</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Facture</h1>
    <p>Patient : {{ $appo->nom_patient_ }}</p>
    <p>Total des Actes : {{ $total }} €</p>
</body>
</html>
