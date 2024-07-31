<?php

namespace Database\Seeders;

use App\Models\Empresa;
use App\Models\Obra;
use App\Models\ObraTipo;
use App\Models\TrabajoTipo;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Empresa::factory()->create([
            'name' => 'VIVID',
            'description' => 'EMPRESA CONSTRUCTORA',
        ]);


        ObraTipo::factory()->create([
            'name' => 'Rotulación',
            'description' => 'Obra de Rotulación',
        ]);
        TrabajoTipo::factory()->create([
            'name' => 'Montaje',
            'description' => 'Trabajo de Montaje',
        ]);
        TrabajoTipo::factory()->create([
            'name' => 'Verificación y Finalización de Obra',
            'description' => 'Trabajo Finalización Obra',
        ]);
        Obra::factory()->create([
            'obra_tipo_id' => ObraTipo::all()->random()->id,
            'name' => 'VIVID',
            'description' => 'EMPRESA CONSTRUCTORA',
        ]);
    }
}
