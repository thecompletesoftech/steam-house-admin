<?php

namespace App\Services;
use Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class EmployeeService
{

    public static function create(array $data)
    {


        return User::create([

            'manager_id' => $data['manager_id'],
            'username' => $data['username'],
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'about' => $data['about'],
            'image' => $data['image'],
            'emo_expert' => $data['emo_expert'],
            'address' => $data['address'],
            // 'latitude' => $data['latitude'],
            // 'longitude' => $data['longitude'],
            'password' => Hash::make($data['password']),
            'c_password' => Hash::make($data['c_password']),
            'role' => $data['role'],
          ]);
    }

    public static function update(array $data)
    {


        $data = DB::table('users')->where('id',$data['id'])->update($data);
        return $data;
        // $data = $user->update($data);
        // $data = User::update([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'phone' => $data['phone'],
        //     'about' => $data['about'],
        //     'password' => Hash::make($data['password']),
        //     'c_password' => Hash::make($data['c_password']),
        //     'role' => $data['role'],
        //   ]);
        // return $data;
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
        $data = DB::select('select * from users where role = ?', [2]);

        // $data = DB::table('users')
        // ->select('users.*','location.location as address','users.created_at as users')
        // ->join('users','users.id','=','location.location_id')
        // ->orderBy('users.created_at', 'desc')->get();

        return $data;
    }

}
