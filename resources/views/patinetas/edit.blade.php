<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Patineta</title>
</head>
<body>

    <h1>Editar Patineta</h1>

    <form action="{{ route('patinetas.update', $patineta->id_patineta) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="id_usuario">Usuario:</label>
        <select name="id_usuario" id="id_usuario" required>
            @foreach($usuarios as $usuario)
                <option value="{{ $usuario->id_usuario }}" {{ $usuario->id_usuario == $patineta->id_usuario ? 'selected' : '' }}>
                    {{ $usuario->nombre_usuario }}
                </option>
            @endforeach
        </select><br><br>

        <label for="numero_serial">Número Serial:</label>
        <input type="text" name="numero_serial" id="numero_serial" value="{{ $patineta->numero_serial }}" required><br><br>

        <label for="marca">Marca:</label>
        <input type="text" name="marca" id="marca" value="{{ $patineta->marca }}" maxlength="20" required><br><br>

        <label for="color">Color:</label>
        <input type="text" name="color" id="color" value="{{ $patineta->color }}" maxlength="20" required><br><br>

        <label for="fecha_registro">Fecha de Registro:</label>
        <input type="date" name="fecha_registro" id="fecha_registro" value="{{ $patineta->fecha_registro }}" required><br><br>

        <button type="submit">Actualizar</button>
    </form>

    <br>
    <a href="{{ route('patinetas.index') }}">Volver al listado</a>

</body>
</html>
