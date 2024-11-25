<?php

namespace Tests\Feature;

use App\Models\Genero;
use App\Models\Libro;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UsuarioTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_consulta_index_devuelve_200_y_muestra_texto()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/libros/mis-libros');

        $response->assertStatus(200);
        $response->assertSee('Listado de Libros');
    }

    public function test_crear_libro(): void
    {
        $user = User::factory()->create();
        $generos = Genero::factory()->count(3)->create();

        $libro = Libro::factory()->make(['user_id' => $user->id]);

        $response = $this->actingAs($user)
            ->post(
                route('libro.store'),
                $libro->toArray() + ['generos' => $generos->pluck('id')->toArray()]
            );

        $response->assertRedirect('/libro');

        $this->assertDatabaseHas('libros', $libro->toArray());
    }


    public function test_usuario_crea_libro_con_datos_invalidos(): void
    {
        $user = User::factory()->create();

        $datosInvalidos = [
            'titulo' => '',
            'autor' => '',
            'precio' => -10,
            'anio_publicacion' => 2050,
            'isbn' => '1234567890',
            'paginas' => 0,
            'generos' => [],
            'sinopsis' => '',
        ];
        
        $response = $this->actingAs($user)
            ->post(
                route('libro.store'),
                $datosInvalidos
            );
        
        $response->assertSessionHasErrors([
            'titulo',
            'autor',
            'precio',
            'anio_publicacion',
            'paginas',
            'generos'
        ]);

        $this->assertDatabaseCount('libros', 0);
    }



    

}
