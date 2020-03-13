<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technical_support = new \App\Models\Admin();
        $technical_support->name = 'technical-support';
        $technical_support->email = 'technical.support@gmail.com';
        $technical_support->password = Hash::make('password');
        $technical_support->save();
        $technical_support->assignRole('technical-support');

        $manager = new \App\Models\Admin();
        $manager->name = 'manager';
        $manager->email = 'manager@gmail.com';
        $manager->password = Hash::make('password');
        $manager->save();
        $manager->assignRole('manager');


        $accounting = new \App\Models\Admin();
        $accounting->name = 'accounting';
        $accounting->email = 'accounting@gmail.com';
        $accounting->password = Hash::make('password');
        $accounting->save();
        $accounting->assignRole('accounting');


        $resolution = new \App\Models\Admin();
        $resolution->name = 'resolution';
        $resolution->email = 'resolution@gmail.com';
        $resolution->password = Hash::make('password');
        $resolution->save();
        $resolution->assignRole('resolution');

    }
}
