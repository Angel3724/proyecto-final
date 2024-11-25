<x-mail::message>
# Se agregó un nuevo libro
## {{ $libro->titulo }}
<x-mail::panel>
{{ $libro->descripcion }}
</x-mail::panel>
<x-mail::button :url="route('libro.show', $libro)">
Ver Libro
</x-mail::button>
Gracias,<br>
{{ config('app.name') }}
</x-mail::message>
