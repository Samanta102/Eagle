<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Patineta</title>
</head>
<body>

    <h1>Registrar Patineta</h1>

    <form action="{{ route('patinetas.store') }}" method="POST">
        @csrf

        <label for="id_usuario">Usuario:</label>
        <select name="id_usuario" id="id_usuario" required>
            @foreach($usuarios as $usuario)
                <option value="{{ $usuario->id_usuario }}">{{ $usuario->nombre_usuario }}</option>
            @endforeach
        </select><br><br>

        <label for="numero_serial">Número Serial:</label>
        <input type="text" name="numero_serial" id="numero_serial" required><br><br>

        <label for="marca">Marca:</label>
        <input type="text" name="marca" id="marca" maxlength="20" required><br><br>

        <label for="color">Color:</label>
        <input type="text" name="color" id="color" maxlength="20" required><br><br>

        <label for="fecha_registro">Fecha de Registro:</label>
        <input type="date" name="fecha_registro" id="fecha_registro" required><br><br>

        <button type="submit">Guardar</button>
    </form>

    <br>
    <a href="{{ route('patinetas.index') }}">Volver al listado</a>

</body>
</html>
