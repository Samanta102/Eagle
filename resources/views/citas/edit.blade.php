<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cita</title>
</head>
<body>
    <h1>Editar Cita</h1>

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('citas.update', $cita) }}">
        @csrf
        @method('PUT')

        <label>Usuario:</label>
        <select name="id_usuario" required>
            @foreach($usuarios as $usuario)
                <option value="{{ $usuario->id_usuario }}" {{ $cita->id_usuario == $usuario->id_usuario ? 'selected' : '' }}>
                    {{ $usuario->nombre }}
                </option>
            @endforeach
        </select><br><br>

        <label>Patineta:</label>
        <select name="id_patineta" required>
            @foreach($patinetas as $patineta)
                <option value="{{ $patineta->id_patineta }}" {{ $cita->id_patineta == $patineta->id_patineta ? 'selected' : '' }}>
                    {{ $patineta->modelo }}
                </option>
            @endforeach
        </select><br><br>

        <label>Fecha:</label>
        <input type="date" name="fecha" value="{{ $cita->fecha }}" required><br><br>

        <label>Hora:</label>
        <input type="time" name="hora" value="{{ $cita->hora }}" required><br><br>

        <label>Motivo:</label>
        <textarea name="motivo" required>{{ $cita->motivo }}</textarea><br><br>

        <button type="submit">Actualizar</button>
    </form>

    <br>
    <a href="{{ route('citas.index') }}">Volver al listado</a>
</body>
</html>
