<?php

namespace Database\Seeders;
use \App\Models\Listing ;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(5)->create(); // it creates 10 dummy users using the user factroy file found in the factories.php file . you must first run the database using a php artisan db:seed
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',

        ]);

        Listing::factory(6)->create([
            'user_id'=> $user-> id
        ]);

            //   Listing::factory(6)->create();
        // Listing::create(
        //     [
        //         'title' => 'Laravel Senior Developer',
        //         'tags' => 'Laravel, Javascript',
        //         'company' => 'Acme Cop',
        //         'location' => 'Boston , MA',
        //         'email' => 'email@gmail.com',
        //         'website' => 'www.google.com',
        //         'description' => 'A software product which provides solution for baby health, baby food, baby tips, baby products, baby names, parenting etc. Here, user can view baby names, baby names by religion, baby tips, baby food and baby product. Admin can add and delete baby names.',
        //     ]
        // );

        // Listing::create(
        //     [
        //         'title' => 'Software Engineer',
        //         'tags' => 'Java , Python',
        //         'company' => 'Verizon Careers',
        //         'location' => 'Nashville , MA',
        //         'email' => 'email@gmail.com',
        //         'website' => 'www.kabarak.com',
        //         'description' => 'A software product which provides solution for baby health, baby food, baby tips, baby products, baby names, parenting etc. Here, user can view baby names, baby names by religion, baby tips, baby food and baby product. Admin can add and delete baby names.',
        //     ] 
        // );
           
        // Listing::create(
        //     [
        //         'title' => 'Frontend Engineer',
        //         'tags' => 'Javascript , ReactJs',
        //         'company' => 'Google',
        //         'location' => 'Nashville , MA',
        //         'email' => 'email2@gmail.com',
        //         'website' => 'www.kabarak.com',
        //         'description' => 'A software product which provides solution for baby health, baby food, baby tips, baby products, baby names, parenting etc. Here, user can view baby names, baby names by religion, baby tips, baby food and baby product. Admin can add and delete baby names.',
        //     ] 
        // );Listing::create(
        //     [
        //         'title' => 'Full stack developer',
        //         'tags' => 'Javascript , php',
        //         'company' => 'LinkedIn',
        //         'location' => 'Nashville , MA',
        //         'email' => 'email1@gmail.com',
        //         'website' => 'www.kabarak.com',
        //         'description' => 'A software product which provides solution for baby health, baby food, baby tips, baby products, baby names, parenting etc. Here, user can view baby names, baby names by religion, baby tips, baby food and baby product. Admin can add and delete baby names.',
        //     ] 
        // );
        // Listing::create(
        //     [
        //         'title' => 'Web developer',
        //         'tags' => 'Ruby on Rills, php',
        //         'company' => 'Spotify',
        //         'location' => 'Nashville , MA',
        //         'email' => 'email1@gmail.com',
        //         'website' => 'www.kabarak.com',
        //         'description' => 'A software product which provides solution for baby health, baby food, baby tips, baby products, baby names, parenting etc. Here, user can view baby names, baby names by religion, baby tips, baby food and baby product. Admin can add and delete baby names.',
        //     ] 
        // );Listing::create(
        //     [
        //         'title' => 'Bckend Engineer',
        //         'tags' => 'Python ,  Java',
        //         'company' => 'LinkedIn',
        //         'location' => 'Los Angeles, MA',
        //         'email' => 'email1@gmail.com',
        //         'website' => 'www.kabarak.com',
        //         'description' => 'A software product which provides solution for baby health, baby food, baby tips, baby products, baby names, parenting etc. Here, user can view baby names, baby names by religion, baby tips, baby food and baby product. Admin can add and delete baby names.',
        //     ] 
        // );
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
