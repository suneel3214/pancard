<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\State;
class StateTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states =  [
            [
                'name' => 'ANDAMAN AND NICOBAR ISLANDS',
                'type' => 'State',
            ],
            [
                'name' => 'ANDHRA PRADESH',
                'type' => 'State',
            ],
             [
                'name' => 'ARUNACHAL PRADESH',
                'type' => 'State',
            ], 
            [
                'name' => 'ASSAM',
                'type' => 'State',
            ],
             [
                'name' => 'BIHAR',
                'type' => 'State',
            ],
            [
                'name' => 'CHANDIGARH',
                'type' => 'State',
            ],
            [
                'name' => 'CHHATTISGARH',
                'type' => 'State',
            ],
             [
                'name' => 'DADRA AND NAGAR HAVELI',
                'type' => 'State',
            ], 
            [
                'name' => 'DAMAN AND DIU',
                'type' => 'State',
            ],
             [
                'name' => 'DELHI',
                'type' => 'State',
            ],
            [
                'name' => 'GOA',
                'type' => 'State',
            ],
            [
                'name' => 'GUJARAT',
                'type' => 'State',
            ],
            [
                'name' => 'HARAYANA',
                'type' => 'State',
            ],
            [
                'name' => 'HIMACHAL PRADESH',
                'type' => 'State',
            ],
            [
                'name' => 'JAMMU AND KASHMIR',
                'type' => 'State',
            ],
            [
                'name' => 'JHARKHAND',
                'type' => 'State',
            ],
            [
                'name' => 'KARNATAKA',
                'type' => 'State',
            ],
            [
                'name' => 'KERALA',
                'type' => 'State',
            ],
            [
                'name' => 'LAKSHADWEEP',
                'type' => 'State',
            ],
            [
                'name' => 'MADHYA PRADESH',
                'type' => 'State',
            ],
            [
                'name' => 'MAHARASHTRA',
                'type' => 'State',
            ],
            [
                'name' => 'MANIPUR',
                'type' => 'State',
            ],
            [
                'name' => 'MEGHALAYA',
                'type' => 'State',
            ],
            [
                'name' => 'MIZORAM',
                'type' => 'State',
            ],
            [
                'name' => 'NAGALAND',
                'type' => 'State',
            ],
            [
                'name' => 'ODISHA',
                'type' => 'State',
            ],
            [
                'name' => 'OTHER',
                'type' => 'State',
            ],
            [
                'name' => 'PONDICHERRY',
                'type' => 'State',
            ],
            [
                'name' => 'PUNJAB',
                'type' => 'State',
            ],
            [
                'name' => 'RAJASTHAN',
                'type' => 'State',
            ],
            [
                'name' => 'SIKKIM',
                'type' => 'State',
            ],
            [
                'name' => 'TAMILNADU',
                'type' => 'State',
            ],
            [
                'name' => 'TELANGANA',
                'type' => 'State',
            ],
            [
                'name' => 'TRIPURA',
                'type' => 'State',
            ],
            [
                'name' => 'UTTAR PRADESH',
                'type' => 'State',
            ],
            [
                'name' => 'UTTARAKHAND',
                'type' => 'State',
            ],
            [
                'name' => 'WEST BENGAL',
                'type' => 'State',
            ],
           
        ];
        foreach ($states as $key => $value) {
            $state = State::create([
                'name' => $value['name'],
                'type' => $value['type']
            ]);
        }
    }
}

