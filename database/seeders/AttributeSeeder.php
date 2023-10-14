<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attribute::create([
            'code' => 'size',
            'name' => 'Size',
            'frontend_type' => 'select',
            'is_filterable' => 1,
            'is_required' => 1,
        ]);

        // Create a color attribute
        Attribute::create([
            'code' => 'color',
            'name' => 'Color',
            'frontend_type' => 'color_selector',
            'is_filterable' => 1,
            'is_required' => 1,
        ]);
    }
}
