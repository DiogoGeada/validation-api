<?php

use Illuminate\Database\Seeder;

class ActivationKeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\ActivationKey::class, 10)->create();
    }
}
