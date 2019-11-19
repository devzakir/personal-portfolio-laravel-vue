<?php

use App\Service;
use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'title' => 'Web Design',
            'icon' => '',
            'description' => 'Professional and affordable web design service. I design website with your customer in mind using latest technology & modern design trends',
        ]);
        
        Service::create([
            'title' => 'Web Development',
            'icon' => '',
            'description' => 'Expert and experienced  in web development. Proving all kinds of website development service from standard to complicated websites',
        ]);

        Service::create([
            'title' => 'Application Development',
            'icon' => '',
            'description' => 'Easy to use and trustworthy application development service.  Fully functional and detailed report based custom solution for enterprise platform',
        ]);

        Service::create([
            'title' => 'WordPress Development',
            'icon' => '',
            'description' => "Looking for a powerful, compact and a high-performing WordPress website? You're in the right place. I am providing responsive and full functional wordpress website development services.",
        ]);
    }
}
