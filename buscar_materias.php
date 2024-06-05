<?php
include 'db_connection.php';

// Inicializar variable de búsqueda
$busqueda = "";
$result = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $busqueda = $_POST['busqueda'];

    // Consulta SQL con el operador LIKE
    $sql = "SELECT * FROM MATERIA WHERE nombre LIKE '%$busqueda%'";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de la Búsqueda</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Resultados de la Búsqueda</h2>
        <?php
        if ($result->num_rows > 0) {
            echo "<table class='table table-striped mt-4'>
                    <thead class='thead-dark'>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Profesor</th>
                        </tr>
                    </thead>
                    <tbody>";
            // Mostrar cada fila de resultados
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['nombre']}</td>
                        <td>{$row['profesor']}</td>
                      </tr>";
            }
            echo "</tbody>
                  </table>";
        } else {
            echo "<p class='text-center mt-4'>No se encontraron resultados.</p>";
        }
        $conn->close();
        ?>
        <div class="text-center mt-4">
            <a href="formulario_busqueda.html" class="btn btn-secondary">Volver al formulario de búsqueda</a>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
