<div class="flex space-x-1">
    <a href="{{ route('dashboard', ['id' => $id]) }}" class='btn btn-green'>Ver</a>
    <a href="{{ route('dashboard', ['id' => $id]) }}" class='btn btn-blue'>Editar</a>
    <form action="">
        @csrf
        <button class='btn btn-red'>Eliminar</button>
    </form>
</div>
