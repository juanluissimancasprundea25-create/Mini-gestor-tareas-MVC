<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de Tareas</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #f2f2f2; }
        .empty { text-align: center; padding: 30px; color: #666; }
        form label { display: block; margin-bottom: 5px; font-weight: bold; }
        form input[type="text"] { width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 3px; }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1> Mini Gestor de Tareas</h1>
        </header>
        <nav>
            <a href="index.php?accion=listar"> Listar</a>
            <a href="index.php?accion=crear"> Crear</a>
        </nav>
        
        <main>
