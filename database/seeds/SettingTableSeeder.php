<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
            'facebook' => 'https://facebook.com/devzakir',
            'linkedin' => 'https://linkedin.com/devzakir',
            'github' => 'https://github.com/devzakir',
            'quora' => 'https://quora.com/zakirhossen16',
            'phone' => '+8801625592566',
            'email' => 'web.zakirbd@gmail.com',
            'address' => 'Adabor, Dhaka-1207, Bangladesh'
        ]);
    }
}
