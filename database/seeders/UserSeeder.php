<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prof=User::create([
                                'email' =>'prof@gmail.com',
                                'password' =>Hash::make('test12345'),
                                'lastname' =>'',
                                'first_name' =>'Admin',
                        
        ]); 
        $prof->attachRole('prof');

        // $etudiant=User::create([
        // 'email' =>'etudiant@gmail.com',
        // 'password' =>Hash::make('test12345'),

        // ]); 
        // $etudiant->attachRole('etudiant');


    
    }
}
