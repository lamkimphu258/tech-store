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
        $rates = range(0, 5, 0.5);

        foreach ($rates as $rate) {
            dump($rate);
            $this->rateRepository->save($rate);
        }
    }
}
