<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resumen Visita Profesional</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        h1 { text-align: center; }
        p { margin-bottom: 8px; }
    </style>
</head>
<body>
    <h1>Resumen Visita Profesional</h1>

    <p><strong>Nombre:</strong> {{ $visit->name }} {{ $visit->surname }}</p>
    <p><strong>Email:</strong> {{ $visit->email }}</p>
    <p><strong>Edad:</strong> {{ $professional->age }}</p>
    <p><strong>Tarea:</strong> {{ $professional->task }}</p>
    <p><strong>Empresa:</strong> {{ $company->name }}</p>
    <p><strong>Teléfono empresa:</strong> {{ $company->telephone }}</p>
    <p><strong>Fecha de entrada:</strong> {{ $entry->date_entry }}</p>
    <p><strong>Fecha de salida:</strong> {{ $entry->date_exit }}</p>
</body>
</html>
