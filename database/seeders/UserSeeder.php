<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $number_of_users = 50;
        $user1 = User::factory()->create(['email' => 'dahmenhacker41@gmail.com']);
        $user2 = User::factory()->create(['email' => 'dahmenhacker12@gmail.com']);
        $user1->friends()->syncWithoutDetaching($user2);
        $user2->friends()->syncWithoutDetaching($user1);
        User::factory($number_of_users)->create();
        $users = User::all();
        // adding friends to the users
        $users->each(function ($user) use ($number_of_users, $users) {
            $number_of_friends = rand(2, 5);
            for ($i = 0; $i < $number_of_friends; $i++) {
                $random_user = $users->whereNotIn('id', $user)->random();
                $user->friends()->syncWithoutDetaching($random_user);
                $random_user->friends()->syncWithoutDetaching($user);
            }
        });

    }
}
