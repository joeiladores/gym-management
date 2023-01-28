<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use App\Models\Trainer;
use App\Models\Member;
use App\Models\Membership;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Generate 10 Trainers
        for($i = 0; $i < 10; $i++){
            \App\Models\Trainer::create([
                'name' => fake()->name,
                'email' => fake()->safeEmail,
                'specialization' => Arr::random(['Nutrition', 'Strength & Conditioning', 'Yoga', 'Corrective Exercise']),
                'phone' => fake()->phoneNumber,
            ]);
        }

        // Membership
        \App\Models\Membership::create([        
            'membership_type' => 'Annual',   
            'membership_price' => 10000,
        ]);   
        \App\Models\Membership::create([        
            'membership_type' => 'Monthly',   
            'membership_price' => 1200,
        ]); 
        \App\Models\Membership::create([        
            'membership_type' => 'Semi-Annual',   
            'membership_price' => 6000,
        ]); 
        // \App\Models\Membership::create([        
        //     'membership_type' => 'Pay-As-You-Go',   
        //     'membership_price' => 10000,
        // ]); 

        // Generate 10 Members
        for($j = 0; $j < 10; $j++){
            \App\Models\Member::create([
                'name' => fake()->name,
                'email' => fake()->safeEmail,
                // 'membership_type' => Arr::random(['Monthly', 'Annual', 'Pay-As-You-Go']),
                'membership_expiration' => '2023-06-15',
                'trainer_id' => fake()->randomDigit+1,
                'membership_id' => Arr::random([1, 2, 3]),
               
            ]);            
        }  

        
    }
}
