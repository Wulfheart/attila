<?php

namespace Database\Seeders;

use App\Models\BasePower;
use App\Models\Variant;
use Illuminate\Database\Seeder;

class VariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $variant = new Variant();
        $variant->name = 'Standard';
        $variant->api_name = 'standard';
        $variant->default_player_count = 7;
        $variant->default_scs_to_win = 18;
        $variant->save();

        $ps = [
            ['name' => 'England', 'api_name' => 'ENGLAND', 'color' => '#9400D3'],
            ['name' => 'Russia', 'api_name' => 'RUSSIA', 'color' => '#757D91'],
            ['name' => 'Turkey', 'api_name' => 'TURKEY', 'color' => '#B9A61C'],
            ['name' => 'Austria', 'api_name' => 'AUSTRIA', 'color' => '#C48F85'],
            ['name' => 'Germany', 'api_name' => 'GERMANY', 'color' => '#A08A75'],
            ['name' => 'France', 'api_name' => 'FRANCE', 'color' => '#4169E1'],
            ['name' => 'Italy', 'api_name' => 'ITALY', 'color' => '#228B22'],
        ];

        foreach ($ps as $bp) {
            $p = new BasePower();
            $p->variant_id = $variant->id;
            $p->name = $bp['name'];
            $p->api_name = $bp['api_name'];
            $p->color = $bp['color'];
            $p->save();
        }
    }
}
