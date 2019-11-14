<?php

use Illuminate\Database\Seeder;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\About::create([
            'name' => 'Zakir Hossen',
            'greeting' => 'Hello! I am Zakir',
            'banner_title' => 'Full Stack Web Developer',
            'avatar' => 'null',
            'greeting_note' => 'Let me help you increase business egagement with qualityful Websites and Web Applications.',
            'description' => '<p>Hi, I am Zakir. A passionate Web Developer from Dhaka, Bangladesh. I prefer to learn consistently to expand my knowledge.</p>

            <p>I started my career as a Web Designer. After 3 years of consistently working in this field. It helped me gain lots of knowledge about business, marketing, and user experience. Also, I have tried a few more things to understand customer satisfaction, business engagement & marketing including e-commerce business, blogging, writing, YouTube & affiliate marketing.</p>
            
            <p>Now I am working as a Full-stack Web Developer. I am able to design & develop responsive website using the latest technology & design trends. I have worked with many clients and a few local companies in the past few years. I am very interested to work with future projects and able to use my coding skills to make a super-fast and & super professional website.</p>',
        ]);
    }
}
