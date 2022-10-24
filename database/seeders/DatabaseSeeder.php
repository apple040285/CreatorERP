<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
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

        // for ($i = 0; $i < 3; $i++) {
        //     \App\Models\Department::create([
        //         'code'          => str()->random(5),
        //         'name'          => str()->random(6),
        //         'remark'        => null,
        //         'status'        => 'disable',
        //         'disable_at'    => now(),
        //     ]);
        // }

        // for ($i = 0; $i < 20; $i++) {
        //     \App\Models\Department::create([
        //         'code'      => str()->random(5),
        //         'name'      => str()->random(6),
        //         'remark'    => null,
        //         'status'    => 'active',
        //     ]);
        // }

        $this->call([
            UserSeeder::class,
        ]);
    }
}
