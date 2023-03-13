<?php

namespace App\Services;
use Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CompanyListService
{

    public static function create(array $data)
    {


        return User::create([

            'meter_id' => $data['meter_id'],
            'manager_id' => $data['manager_id'],
            'username' => $data['username'],
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'about' => $data['about'],
            'image' => $data['image'],
            'address' => $data['address'],
            // 'longitude' => $data['longitude'],
            'password' => Hash::make($data['password']),
            'c_password' => Hash::make($data['c_password']),
            'role' => $data['role'],
          ]);
    }

    public static function update(array $data, User $user)
    {

        $data = $user->update($data);

        return $data;
    }

    public static function updateById(array $data, $id)
    {

        $data = User::whereId($id)->update($data);
        return $data;
    }

    public static function getById($id)
    {
        $data = User::find($id);
        return $data;
    }

    public static function delete(User $user)
    {
        $data = $user->delete();
        return $data;
    }

    public static function deleteById($id)
    {
        $data = User::whereId($id)->delete();
        return $data;
    }

    public static function datatable()
    {
        // $data = DB::select('select * from users where role = ?', [0]);
        // $data = DB::table('users')
        // ->select('users.*','users.id as id')
        // // ->join('location','location.location_id','=','users.id')
        // ->orderBy('users.created_at', 'asc')->where('role','0')->get();


        $data = DB::table('users')
        ->select('users.*','users.id as id','location.location as address',)
        ->join('location','location.location_id','=','users.address')
        ->orderBy('users.created_at', 'desc')->where('role','0')->get();
        return $data;
    }

}
