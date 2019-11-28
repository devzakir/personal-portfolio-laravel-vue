<?php

use Illuminate\Database\Seeder;

class SEOTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\SEO::create([
            'title' => 'Zakir Hossen Personal Portfolio',
            'keyword' => 'Web Developer, Developer, Designer, Laravel Developer, Front End Developer, PHP Developer, Vue JS Developer, Web Designer, WordPress Expert, Website Developer, Full Stack Web Developer',
            'description' => 'Hello World',
            'meta' => '',
        ]);
    }
}
