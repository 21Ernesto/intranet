<?php

namespace App\Imports;

use App\Models\Level;
use App\Models\Role;
use App\Models\User; // Asegúrate de importar el modelo Role aquí
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class UsersImport implements ToCollection, WithBatchInserts, WithChunkReading
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row) {
            if ($key == 0) {
                continue;
            }

            $levelName = $row[3];
            $level = Level::firstOrCreate(['name' => $levelName]);

            $roleName = $row[8];
            $role = Role::firstOrCreate(['name' => $roleName, 'key' => $roleName]);

            try {
                User::updateOrCreate(
                    ['identification' => $row[0]],
                    [
                        'first_name' => $row[1],
                        'last_name' => $row[2],
                        'level_id' => $level->id,
                        'gender' => $row[4],
                        'phone' => $row[5] ?? null,
                        'mobile' => $row[6] ?? null,
                        'email' => $row[7],
                        'password' => bcrypt('password'),
                        'role_id' => $role->id,
                    ]
                );
            } catch (\Exception $e) {
            }
        }
    }

    public function batchSize(): int
    {
        return 100; // Tamaño más pequeño para evitar tiempo de ejecución excedido
    }

    public function chunkSize(): int
    {
        return 100; // Tamaño más pequeño para evitar tiempo de ejecución excedido
    }
}
