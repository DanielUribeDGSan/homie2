<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('propietario');
        Storage::deleteDirectory('propietario/escrituras');
        Storage::deleteDirectory('propietario/contrato_compraventa');
        Storage::deleteDirectory('propietario/poder_notarial');
        Storage::deleteDirectory('propietario/comprobante_domicilio');
        Storage::deleteDirectory('propietario/identificacion_oficial');

        Storage::deleteDirectory('inquilino');
        Storage::deleteDirectory('inquilino/identificacion');
        Storage::deleteDirectory('inquilino/nominas');
        Storage::deleteDirectory('inquilino/estado_cuenta');


        Storage::deleteDirectory('inquilino/roomie/identificacion');
        Storage::deleteDirectory('inquilino/roomie/nominas');
        Storage::deleteDirectory('inquilino/roomie/estado_cuenta');


        Storage::makeDirectory('propietario');
        Storage::makeDirectory('propietario/escrituras');
        Storage::makeDirectory('propietario/contrato_compraventa');
        Storage::makeDirectory('propietario/poder_notarial');
        Storage::makeDirectory('propietario/comprobante_domicilio');
        Storage::makeDirectory('propietario/identificacion_oficial');

        Storage::makeDirectory('inquilino');
        Storage::makeDirectory('inquilino/identificacion');
        Storage::makeDirectory('inquilino/nominas');
        Storage::makeDirectory('inquilino/estado_cuenta');


        Storage::makeDirectory('inquilino/roomie/identificacion');
        Storage::makeDirectory('inquilino/roomie/nominas');
        Storage::makeDirectory('inquilino/roomie/estado_cuenta');



        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
