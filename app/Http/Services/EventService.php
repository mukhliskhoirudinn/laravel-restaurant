<?php

namespace App\Http\Services;

use App\Models\Event;

class EventService
{
    public function select($paginate = null)
    {
        if ($paginate) {
            return Event::latest()->paginate($paginate);
        }

        return Event::latest()->get();
    }

    public function selectFirstBy($column, $value)
    {
        return Event::where($column, $value)->firstOrFail();
    }

    public function create($data)
    {
        return Event::create($data);
    }

    public function update($data, $uuid)
    {
        return Event::where('uuid', $uuid)->update($data);
    }
}
