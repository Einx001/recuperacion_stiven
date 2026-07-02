<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\Agency;
use App\Models\Particular;
use App\Models\ReservationRoomAgency;
use App\Models\ReservationRoomParticular;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'iva' => '19%',
            'descripcion' => 'Cinco estrellas'
        ]);

        Category::create([
            'iva' => '10%',
            'descripcion' => 'Tres estrellas'
        ]);

        Hotel::create([
            'nombre' => 'Hotel Plaza',
            'direccion' => 'Calle 10 #20-30',
            'tipo' => 'Lujo',
            'anio' => '2020',
            'category_id' => 1
        ]);

        Hotel::create([
            'nombre' => 'Hotel Central',
            'direccion' => 'Carrera 15 #40-20',
            'tipo' => 'Ejecutivo',
            'anio' => '2018',
            'category_id' => 2
        ]);

        Room::create([
            'tipo' => 'Sencilla',
            'hotel_id' => 1
        ]);

        Room::create([
            'tipo' => 'Doble',
            'hotel_id' => 1
        ]);

        Room::create([
            'tipo' => 'Suite',
            'hotel_id' => 2
        ]);

        Agency::create([
            'nombre' => 'Viajes Colombia',
            'tipo' => 'Turismo',
            'direccion' => 'Calle 100 #20-15',
            'nombre_persona' => 'Juan Pérez'
        ]);

        Agency::create([
            'nombre' => 'Travel World',
            'tipo' => 'Empresarial',
            'direccion' => 'Carrera 50 #30-10',
            'nombre_persona' => 'María Gómez'
        ]);

        Particular::create([
            'nombre' => 'Carlos Ramírez',
            'direccion' => 'Calle 50 #12-30',
            'telefono' => '3001112233'
        ]);

        Particular::create([
            'nombre' => 'Laura Torres',
            'direccion' => 'Carrera 80 #15-10',
            'telefono' => '3109876543'
        ]);

        ReservationRoomAgency::create([
            'fecha_inicio' => '2026-07-10',
            'fecha_fin' => '2026-07-15',
            'room_id' => 1,
            'agency_id' => 1
        ]);

        ReservationRoomAgency::create([
            'fecha_inicio' => '2026-08-01',
            'fecha_fin' => '2026-08-05',
            'room_id' => 2,
            'agency_id' => 2
        ]);

        ReservationRoomParticular::create([
            'fecha_inicio' => '2026-07-20',
            'fecha_fin' => '2026-07-22',
            'room_id' => 3,
            'particular_id' => 1
        ]);

        ReservationRoomParticular::create([
            'fecha_inicio' => '2026-08-10',
            'fecha_fin' => '2026-08-15',
            'room_id' => 1,
            'particular_id' => 2
        ]);
    }
}