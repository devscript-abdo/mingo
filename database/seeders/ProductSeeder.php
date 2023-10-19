<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $products = [
            [
                'name' => 'Dual Camera 20MP',
                'slug' => Str::slug('Dual Camera 20MP'),
                'price' => 80.25,
                'is_featured' => true,
            ],
            [
                'name' => 'Smart Watches',
                'slug' => Str::slug('Smart Watches'),
                'price' => 40.5,
                'sale_price' => 35,
                'is_featured' => true,
            ],
            [
                'name' => 'Beat Headphone',
                'slug' => Str::slug('Beat Headphone'),
                'price' => 20,
                'is_featured' => true,
            ],
            [
                'name' => 'Red & Black Headphone',
                'slug' => Str::slug('Red & Black Headphone'),
                'price' => $faker->numberBetween(50, 60),
                'is_featured' => true,
            ],
            [
                'name' => 'Smart Watch External',
                'slug' => Str::slug('Smart Watch External'),
                'price' => $faker->numberBetween(70, 90),
                'is_featured' => true,
            ],
            [
                'name' => 'Nikon HD camera',
                'slug' => Str::slug('Nikon HD camera'),
                'price' => $faker->numberBetween(40, 50),
                'is_featured' => true,
            ],
            [
                'name' => 'Audio Equipment',
                'slug' => Str::slug('Audio Equipment'),
                'price' => $faker->numberBetween(50, 60),
                'is_featured' => true,
            ],
            [
                'name' => 'Smart Televisions',
                'slug' => Str::slug('Smart Televisions'),
                'price' => $faker->numberBetween(110, 130),
                'sale_price' => $faker->numberBetween(80, 100),
                'is_featured' => true,
            ],
            [
                'name' => 'Samsung Smart Phone',
                'slug' => Str::slug('Samsung Smart Phone'),
                'price' => $faker->numberBetween(50, 60),
                'is_featured' => true,
            ],
            [
                'name' => 'Herschel Leather Duffle Bag In Brown Color',
                'slug' => Str::slug('Herschel Leather Duffle Bag In Brown Color'),
                'price' => $faker->numberBetween(110, 130),
                'sale_price' => $faker->numberBetween(80, 100),
            ],
            [
                'name' => 'Xbox One Wireless Controller Black Color',
                'slug' => Str::slug('Xbox One Wireless Controller Black Color'),
                'price' => $faker->numberBetween(110, 130),
                'sale_price' => $faker->numberBetween(80, 100),
            ],
            [
                'name' => 'EPSION Plaster Printer',
                'slug' => Str::slug('EPSION Plaster Printer'),
                'price' => $faker->numberBetween(50, 60),
            ],
            [
                'name' => 'Sound Intone I65 Earphone White Version',
                'slug' => Str::slug('Sound Intone I65 Earphone White Version'),
                'price' => $faker->numberBetween(50, 60),
            ],
            [
                'name' => 'B&O Play Mini Bluetooth Speaker',
                'slug' => Str::slug('B&O Play Mini Bluetooth Speaker'),
                'price' => $faker->numberBetween(50, 60),
            ],
            [
                'name' => 'Apple MacBook Air Retina 13.3-Inch Laptop',
                'slug' => Str::slug('Apple MacBook Air Retina 13.3-Inch Laptop'),
                'price' => $faker->numberBetween(50, 60),
            ],
            [
                'name' => 'Apple MacBook Air Retina 12-Inch Laptop',
                'slug' => Str::slug('Apple MacBook Air Retina 12-Inch Laptop'),
                'price' => $faker->numberBetween(50, 60),
            ],
            [
                'name' => 'Samsung Gear VR Virtual Reality Headset',
                'slug' => Str::slug('Samsung Gear VR Virtual Reality Headset'),
                'price' => $faker->numberBetween(50, 60),
            ],
            [
                'name' => 'Aveeno Moisturizing Body Shower 450ml',
                'slug' => Str::slug('Aveeno Moisturizing Body Shower 450ml'),
                'price' => $faker->numberBetween(110, 130),
                'sale_price' => $faker->numberBetween(80, 100),
            ],
            [
                'name' => 'NYX Beauty Couton Pallete Makeup 111',
                'slug' => Str::slug('NYX Beauty Couton Pallete Makeup 111'),
                'price' => $faker->numberBetween(110, 130),
                'sale_price' => $faker->numberBetween(80, 100),
            ],
            [
                'name' => 'NYX Beauty Couton Pallete Makeup 12',
                'slug' => Str::slug('NYX Beauty Couton Pallete Makeup 12'),
                'price' => $faker->numberBetween(110, 130),
                'sale_price' => $faker->numberBetween(80, 100),
            ],
            [
                'name' => 'MVMTH Classical Leather Watch In Black',
                'slug' => Str::slug('MVMTH Classical Leather Watch In Black'),
                'price' => '62.35',
                'sale_price' => '57.99',
            ],
            [
                'name' => 'Baxter Care Hair Kit For Bearded Mens',
                'slug' => Str::slug('Baxter Care Hair Kit For Bearded Mens'),
                'price' => '125.17',
                'sale_price' => '93.59',
            ],
            [
                'name' => 'Ciate Palemore Lipstick Bold Red Color',
                'slug' => Str::slug('Ciate Palemore Lipstick Bold Red Color'),
                'price' => '66.78',
                'sale_price' => '42.33',
            ],
        ];

        Product::truncate();

        foreach ($products as $key => $item) {
            $item['description'] = '<ul><li> Unrestrained and portable active stereo speaker</li>
            <li> Free from the confines of wires and chords</li>
            <li> 20 hours of portable capabilities</li>
            <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
            <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li></ul>';
            $item['content'] = '<p>Short Hooded Coat features a straight body, large pockets with button flaps, ventilation air holes, and a string detail along the hemline. The style is completed with a drawstring hood, featuring Rains&rsquo; signature built-in cap. Made from waterproof, matte PU, this lightweight unisex rain jacket is an ode to nostalgia through its classic silhouette and utilitarian design details.</p>
                                <p>- Casual unisex fit</p>

                                <p>- 64% polyester, 36% polyurethane</p>

                                <p>- Water column pressure: 4000 mm</p>

                                <p>- Model is 187cm tall and wearing a size S / M</p>

                                <p>- Unisex fit</p>

                                <p>- Drawstring hood with built-in cap</p>

                                <p>- Front placket with snap buttons</p>

                                <p>- Ventilation under armpit</p>

                                <p>- Adjustable cuffs</p>

                                <p>- Double welted front pockets</p>

                                <p>- Adjustable elastic string at hempen</p>

                                <p>- Ultrasonically welded seams</p>

                                <p>This is a unisex item, please check our clothing &amp; footwear sizing guide for specific Rains jacket sizing information. RAINS comes from the rainy nation of Denmark at the edge of the European continent, close to the ocean and with prevailing westerly winds; all factors that contribute to an average of 121 rain days each year. Arising from these rainy weather conditions comes the attitude that a quick rain shower may be beautiful, as well as moody- but first and foremost requires the right outfit. Rains focus on the whole experience of going outside on rainy days, issuing an invitation to explore even in the most mercurial weather.</p>';
            $item['status'] = $faker->randomElement(['published', 'pending']);
            $item['sku'] = 'SW-'.$faker->numberBetween(100, 200);
            $item['brand_id'] = $faker->numberBetween(1, 7);
            $item['quantity'] = $faker->numberBetween(10, 20);

            $images = [
                'products/demo-product.jpg',
            ];

            if (FacadesFile::exists(database_path('seeders/files/products/demo-product.jpg'))) {
                $images[] = 'products/demo-product.jpg';

                $productsFolder = storage_path('app/public/products');

                if (! FacadesFile::isDirectory($productsFolder)) {

                    FacadesFile::makeDirectory($productsFolder, 0777, true, true);

                    FacadesFile::copy(database_path('seeders/files/products/demo-product.jpg'), storage_path('app/public/products/demo-product.jpg'));
                }
            }

            $item['image'] = 'products/demo-product.jpg';
            $item['images'] = json_encode($images);

            $item['category_id'] = $faker->numberBetween(10, 40);

            $product = Product::create($item);

            /* $product->productCollections()->sync([$faker->numberBetween(1, 3)]);

             if ($product->id % 3 == 0) {
                 $product->productLabels()->sync([$faker->numberBetween(1, 3)]);
             }*/

            /*$product->categories()->sync([
                $faker->numberBetween(1, 37),
                $faker->numberBetween(1, 37),
                $faker->numberBetween(1, 37),
                $faker->numberBetween(15, 17),
            ]);*/
        }
    }
}
