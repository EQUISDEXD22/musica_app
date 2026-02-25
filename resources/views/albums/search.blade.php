<!DOCTYPE html>
<html>
<head>
    <title>Buscador</title>
</head>
<body>
<h1>Buscar</h1>

<form action="{{ route('albums.search', $album->id) }}" method="POST">
    @csrf
    @method('PUT')
    <p>
        <label>Contiene:</label><br>
        <input type="text" name="contiene" value="{{$album->title}}" >
    </p>

    <p>
        <label>Género:</label><br>
        <input type="text" name="genero" value="{{$album->genre}}" >
    </p>

    <p>
        <label>Rango años:</label><br>
        <input type="number" name="rango_1" value="{{$album->release_year}}" >
        <input type="number" name="rango_2" value="{{$album->release_year}}" >
    </p>

    <p>
        <label>Valoración:</label><br>
        <input type="text" name="valoracion" value="{{$album->average_rating}}">
    </p>

    <button type="submit">Actualizar</button>
</form>

<p>
    <a href="{{route('albums.index')}}">Volver</a>
</p>
</body>
</html>
