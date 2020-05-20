<?php

use Illuminate\Database\Seeder;

class TipoDocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \Illuminate\Support\Facades\DB::table('tipo_docs')->insert([
           [
               'descripcion' => 'CEDULA DE CIUDADANIA',
               'estado' => 1,
               'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
               'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
           ],
            [
               'descripcion' => 'NIT',
               'estado' => 1,
               'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
               'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
           ]
        ]);
    }
}
