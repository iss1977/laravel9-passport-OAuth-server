<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name'=>'Admin User Seeded',
            'email' => 'admin@test.com',
            'password'=> Hash::make('12345678'),
            'email_verified_at'=> now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user->posts()->create([
            'title' => 'Sample post for admin user',
            'content' => 'Sample content for admin user',
        ]);

        User::factory()
        ->count(20)
        ->has(Post::factory()->count(25))
        ->create();


    }
}
