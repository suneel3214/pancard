<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Role;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $users =  User::with('roles','creates')->select('id','name','email','user_type','created_by','points','referal_code','mobile','state')->get();
        // dd($users);
        $allData = [];
        foreach($users as $user){
            $data['id'] = $user->id;
            $data['name'] = $user->name;
            $data['email'] = $user->email;
            $data['user_type'] = $user->roles ? $user->roles->name:'';
            $data['created_by'] = $user->creates ? $user->creates->name:'';
            $data['points'] = $user->points;
            $data['referal_code'] = $user->referal_code;
            $data['mobile'] = $user->mobile;
            $data['state'] = $user->state;


            $allData [] = $data;
        }

        return collect($allData);
    }

    public function headings(): array
    {
        return [
            'Id', 'Name', 'Email', 'Role', 'Created By','Wallet Amount','Referal Code','Mobile','State'
        ];
    }
}
