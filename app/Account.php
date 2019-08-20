<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\userController;
class Account extends Model
{
        protected $fillable = ['name' , 'desc'];
      //  protected $msg = "";
        public function scopeGetUser($query,$s)
        {
          // return $query->latest();
          return $query->where('name','like','%'. $s .'%')
            ->orWhere('desc','like','%'. $s .'%');
        }

        // public function scopeSearch($query , $s)
        // {
        //   return $query->where('name','like','%'. $s .'%')
        //     ->orWhere('desc','like','%'. $s .'%');
        // }

        public function newUser($request)
        {
          $new = Account::insert([
                'name' => $request['name'],
                'desc' => $request['desc']
              ]);
          return $new;
        }

        public function UpdtOrCrte($request)
        {
          //  firstOrCreate / firstOrNew
          $updcrt = Account::updateOrCreate([
            'name' => $request['name']],[
            'name' => $request['name'],
            'desc' => $request['desc']
          ]);
          //$wasCreated = $updcrt->wasRecentlyCreated;
          $wasChanged = $updcrt->wasChanged();

          if($wasChanged)
          {
              $msg = "Data updated succesfully!";
          }
          else
          {
              $msg = "New data created succesfully!";

          }
          return $msg;

        }

        public function updateUser($request , $id)
        {
            $data = Account::findOrFail($id);
            $data->name = $request['name'];
            $data->desc = $request['desc'];
            $data->save();
            $msg = "Data updated succesfully!";
            return $msg;
        }

        public function deleteUser($id)
        {
          $data = Account::findOrFail($id);
          $data-> delete();

          $msg = "Data deleted";

          return $msg;
        }

        public function showData($id)
        {
          $data = Account::findOrFail($id);
          return $data;
        }

        public function frstOrCrte($request)
        {
            //firstOrNew
            // $foc = Account::firstOrCreate([
            //     'name' => $request['name']
            //     'desc' => $request['desc']
            // ]);
            // return $foc;
        }

}
