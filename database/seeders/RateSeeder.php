<?php

namespace Database\Seeders;

use App\Http\Repository\RateRepository;
use Illuminate\Database\Seeder;

class RateSeeder extends Seeder
{
    public function __construct(
        protected RateRepository $rateRepository
    ) {
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rates = range(1, 5);

        foreach ($rates as $rate) {
            $this->rateRepository->save($rate);
        }
    }
}
