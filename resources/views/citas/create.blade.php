<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Cita</title>
</head>
<body>
    <h1>Crear Nueva Cita</h1>

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('citas.store') }}">
        @csrf

        <label>Usuario:</label>
        <select name="id_usuario" required>
            <option value="">Seleccione</option>
            @foreach($usuarios as $usuario)
                <option value="{{ $usuario->id_usuario }}">{{ $usuario->nombre }}</option>
            @endforeach
        </select><br><br>

        <label>Patineta:</label>
        <select name="id_patineta" required>
            <option value="">Seleccione</option>
            @foreach($patinetas as $patineta)
                <option value="{{ $patineta->id_patineta }}">{{ $patineta->modelo }}</option>
            @endforeach
        </select><br><br>

        <label>Fecha:</label>
        <input type="date" name="fecha" required><br><br>

        <label>Hora:</label>
        <input type="time" name="hora" required><br><br>

        <label>Motivo:</label>
        <textarea name="motivo" required></textarea><br><br>

        <button type="submit">Guardar</button>
    </form>

    <br>
    <a href="{{ route('citas.index') }}">Volver al listado</a>
</body>
</html>
