<?php

namespace App\Services;

use App\Models\LocationModel;
use Illuminate\Support\Facades\DB;

class LocationService
{

    public static function create(array $data)
    {
        $data = LocationModel::create($data);
        return $data;
    }

    public static function update(array $data,LocationModel $location)
    {
        $data = $location->update($data);
        return $data;
    }

    public static function updateById(array $data, $id)
    {
        $data = LocationModel::whereId($id)->update($data);
        return $data;
    }

    public static function getById($id)
    {
        $data = LocationModel::find($id);
        return $data;
    }

    public static function delete(LocationModel $location)
    {
        $data = $location->delete();
        return $data;
    }

    public static function deleteById($id)
    {
        $data = LocationModel::whereId($id)->delete();
        return $data;
    }

    public static function datatable()
    {
        $data = DB::table('location')->orderBy('created_at', 'asc')->paginate(10);
        return $data;
    }

}
