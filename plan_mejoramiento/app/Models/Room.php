<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo'
    ];

    protected $allowIncluded = [
        'hotel',
        'reservationRoomAgencies',
        'reservationRoomParticulars',
    ];

    protected $allowFilter = [
        'id',
        'tipo'
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function reservationRoomAgencies()
    {
        return $this->belongsToMany(
            Agency::class,
            'reservation_room_agencies',
            'room_id',
            'agency_id'
        );
    }

    public function reservationRoomParticulars()
    {
        return $this->belongsToMany(
            Particular::class,
            'reservation_room_particulars',
            'room_id',
            'particular_id'
        );
    }

    public function scopeIncluded(Builder $query)
    {
        if (empty($this->allowIncluded) || empty(request('included'))) {
            return;
        }

        $relations = explode(',', request('included'));

        $allowIncluded = collect($this->allowIncluded);

        foreach ($relations as $key => $relationship) {

            if (!$allowIncluded->contains($relationship)) {
                unset($relations[$key]);
            }
        }

        $query->with($relations);
    }

    public function scopeFilter(Builder $query)
    {
        if (empty($this->allowFilter) || empty(request('filter'))) {
            return;
        }

        $filters = request('filter');

        $allowFilter = collect($this->allowFilter);

        foreach ($filters as $filter => $value) {

            if ($allowFilter->contains($filter)) {

                $query->where($filter, 'LIKE', '%' . $value . '%');
            }
        }
    }

    public function scopeGetOrPaginate(Builder $query)
    {
        if (request('perPage')) {

            $perPage = intval(request('perPage'));

            if ($perPage) {

                return $query->paginate($perPage);
            }
        }

        return $query->get();
    }
}
