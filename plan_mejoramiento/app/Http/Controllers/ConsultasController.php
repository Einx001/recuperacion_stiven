<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Hotel;

class ConsultasController extends Controller
{
    public function rooms()
    {
        return response()->json(
            Room::with('reservationRoomAgencies')->get()
        );
    }

    public function roomParticulars()
    {
        return response()->json(
            Room::with('reservationRoomParticulars')->get()
        );
    }

    public function hotels()
    {
        return response()->json(
            Hotel::select(
                'id',
                'nombre',
                'direccion',
                'tipo',
                'anio',
                'category_id'
            )->with('category')->get()
        );
    }
}
