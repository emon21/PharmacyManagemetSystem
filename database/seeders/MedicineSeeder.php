<?php

namespace Database\Seeders;

use App\Models\Medicine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        # fake data for medicines
        // \App\Models\Medicine::factory(10)->create([
        //     'name' => fake()->word(),
        //     'packing' => fake()->word(),
        //     'genericName' => fake()->word(),
        //     'supplierName' => fake()->word(),
        // ]);
        // \App\Models\Medicine::factory(10)->create();


        // Uncomment the following line to create 10 fake medicine entries
        // $medicine = Medicine::create([
        //     'name' => fake()->sentence(),
        //     'packing' => fake()->sentence(),
        //     'genericName' => fake()->sentence(),
        //     'supplierName' => fake()->sentence(),
        // ]);

       

       // Medicine::create($medicine)->count(5);


       # medicine 5 data create
        // Medicine::create($medicine)->count(5);

        // for ($i = 0; $i < 5; $i++) {
        //     Medicine::create([
        //         'name' => fake()->sentence(10),
        //         'packing' => fake()->sentence(5),
        //         'genericName' => fake()->sentence(3),
        //         'supplierName' => fake()->sentence(5),
        //     ]);
        // }

        # Medicine Seeder
        # medicine name 

        $medicine = [
            'Paracetamol', 'Ibuprofen', 'Amoxicillin', 'Ciprofloxacin', 'Metformin',
            'Aspirin', 'Omeprazole', 'Lisinopril', 'Atorvastatin', 'Levothyroxine',
            'Simvastatin', 'Metoprolol', 'Cefazolin', 'Paracetamol', 'Ibuprofen',
            'Amoxicillin','Ciprofloxacin', 'Metformin', 'Aspirin', 'Omeprazole', 
            'Lisinopril', 'Atorvastatin','Levothyroxine', 'Simvastatin', 'Metoprolol',
             'Cefazolin',
               
        ];

        # Medicine insert
        Medicine::insert(array_map(function ($name) {
            return [
                'name' => $name,
                'packing' => fake()->sentence(5),
                'genericName' => fake()->sentence(3),
                'supplierName' => fake()->sentence(5),
            ];
        }, $medicine));


        # medicine image on online path
        # medicine image path

        //  $medicineImage = [
        //     'https://example.com/images/paracetamol.jpg',
        //     'https://example.com/images/ibuprofen.jpg',
        //     'https://example.com/images/amoxicillin.jpg',
        //     'https://example.com/images/ciprofloxacin.jpg',
        //     'https://example.com/images/metformin.jpg',
        //     'https://example.com/images/aspirin.jpg',
        //     'https://example.com/images/omeprazole.jpg', 
        //     'https://example.com/images/lisinopril.jpg',
        //     'https://example.com/images/atorvastatin.jpg',
        //     'https://example.com/images/levothyroxine.jpg',
        //     'https://example.com/images/simvastatin.jpg',
        //     'https://example.com/images/metoprolol.jpg',
        //     'https://example.com/images/cefazolin.jpg',
        //     'https://example.com/images/paracetamol.jpg',
        //     'https://example.com/images/ibuprofen.jpg',
        //     'https://example.com/images/amoxicillin.jpg',
        //     'https://example.com/images/ciprofloxacin.jpg',
        //     'https://example.com/images/metformin.jpg',
        //     'https://example.com/images/aspirin.jpg',
        //     'https://example.com/images/omeprazole.jpg',
        //     'https://example.com/images/lisinopril.jpg',
        //     'https://example.com/images/atorvastatin.jpg',
        //     'https://example.com/images/levothyroxine.jpg',
        //     'https://example.com/images/simvastatin.jpg',
        //     'https://example.com/images/metoprolol.jpg',
        //     'https://example.com/images/cefazolin.jpg'
        
        // ];

        // $medicineImage = [

        //     'paracetamol.jpg', 'ibuprofen.jpg', 'amoxicillin.jpg', 'ciprofloxacin.jpg', 'metformin.jpg',
        //     'aspirin.jpg', 'omeprazole.jpg', 'lisinopril.jpg', 'atorvastatin.jpg', 'levothyroxine.jpg',
        //     'simvastatin.jpg', 'metoprolol.jpg', 'cefazolin.jpg', 'paracetamol.jpg', 'ibuprofen.jpg',
        //     'amoxicillin.jpg', 'ciprofloxacin.jpg', 'metformin.jpg', 'aspirin.jpg', 'omeprazole.jpg',
        //     'lisinopril.jpg', 'atorvastatin.jpg', 'levothyroxine.jpg', 'simvastatin.jpg', 'metoprolol.jpg',
        //     'cefazolin.jpg'

        // ];  





    }
}
