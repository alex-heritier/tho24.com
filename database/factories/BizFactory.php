<?php

namespace Database\Factories;

use App\Models\Biz;
use App\Services\SaigonService;
use App\Services\TradeService;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Biz>
 */
class BizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $districtData = SaigonService::DISTRICTS['district'][array_rand(SaigonService::DISTRICTS['district'])];
        $district = $districtData['code'];
        $ward = $districtData['ward'][array_rand($districtData['ward'])]['code'];

        return [
            'name' => fake()->company(),
            'descr' => fake()->text(),
            'trade' => array_rand(TradeService::TRADES),
            'url' => fake()->url(),
            // 'main_img' => fake()->imageUrl(),
            'main_img' => "https://picsum.photos/1200/350?random=" . mt_rand(1, 55000),
            'email' => fake()->unique()->companyEmail(),
            'phone_code' => '84',
            'phone' => fake()->numerify('9## ### ###'),
            'district' => $district,
            'ward' => $ward,
        ];
    }
}
