<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Reply;
use Illuminate\Database\Seeder;

class ExampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $post1 = Post::create([
            'title' => 'Tema 1',
            'content' => 'Contenido del Tema 1',
            'user_id' => 1,
        ]);

        $post2 = Post::create([
            'title' => 'Tema 2',
            'content' => 'Contenido del Tema 2',
            'user_id' => 1,
        ]);

        // Crea algunas respuestas (replies)
        Reply::create([
            'content' => 'Respuesta al Tema 1',
            'post_id' => $post1->id,
            'user_id' => 1,
        ]);

        Reply::create([
            'content' => 'Respuesta al Tema 1 - Otra respuesta',
            'post_id' => $post1->id,
            'user_id' => 1,
        ]);

        Reply::create([
            'content' => 'Respuesta al Tema 2',
            'post_id' => $post2->id,
            'user_id' => 1,
        ]);
    }
}
