<?php

namespace Database\Seeders;

use Exception;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ProductSeeder extends Seeder
{
    private function downloadAndConvertToBase64($imageUrl)
    {
        try {
            $response = Http::timeout(30)->get($imageUrl);
            if ($response->successful()) {
                $imageData = $response->body();
                $base64 = base64_encode($imageData);
                return "data:image/jpeg;base64," . $base64;
            }
        } catch (Exception $e) {
            \Log::error("Error downloading image: " . $e->getMessage());
        }
        return null;
    }

    private function getBase64Images(): array
    {
        $imageUrls = [
            // Smartphones
            'https://dummyimage.com/600x600/000/fff.jpg&text=iPhone+15',
            'https://dummyimage.com/600x600/000/fff.jpg&text=Samsung+S24',
            'https://dummyimage.com/600x600/000/fff.jpg&text=Pixel+8',

            // Laptops
            'https://dummyimage.com/600x600/000/fff.jpg&text=MacBook',
            'https://dummyimage.com/600x600/000/fff.jpg&text=ROG',
            'https://dummyimage.com/600x600/000/fff.jpg&text=Legion',

            // Computer Parts
            'https://dummyimage.com/600x600/000/fff.jpg&text=RTX4080',
            'https://dummyimage.com/600x600/000/fff.jpg&text=Intel',
            'https://dummyimage.com/600x600/000/fff.jpg&text=SSD',

            // Audio
            'https://dummyimage.com/600x600/000/fff.jpg&text=Sony+WH1000XM5',
            'https://dummyimage.com/600x600/000/fff.jpg&text=JBL',
            'https://dummyimage.com/600x600/000/fff.jpg&text=Bose',

            // Gaming
            'https://dummyimage.com/600x600/000/fff.jpg&text=PS5',
            'https://dummyimage.com/600x600/000/fff.jpg&text=Switch',
            'https://dummyimage.com/600x600/000/fff.jpg&text=Xbox',

            // Cameras
            'https://dummyimage.com/600x600/000/fff.jpg&text=Sony+Camera',
            'https://dummyimage.com/600x600/000/fff.jpg&text=Canon',
            'https://dummyimage.com/600x600/000/fff.jpg&text=Fujifilm',

            // Smart Home
            'https://dummyimage.com/600x600/000/fff.jpg&text=Nest+Hub',
            'https://dummyimage.com/600x600/000/fff.jpg&text=Echo',
            'https://dummyimage.com/600x600/000/fff.jpg&text=Philips+Hue',

            // Wearables
            'https://dummyimage.com/600x600/000/fff.jpg&text=Apple+Watch',
            'https://dummyimage.com/600x600/000/fff.jpg&text=Galaxy+Watch',
            'https://dummyimage.com/600x600/000/fff.jpg&text=Garmin',

            // Networking
            'https://dummyimage.com/600x600/000/fff.jpg&text=ASUS+Router',
            'https://dummyimage.com/600x600/000/fff.jpg&text=TP+Link',
            'https://dummyimage.com/600x600/000/fff.jpg&text=Netgear',

            // Accessories
            'https://dummyimage.com/600x600/000/fff.jpg&text=Logitech',
            'https://dummyimage.com/600x600/000/fff.jpg&text=Keychron',
            'https://dummyimage.com/600x600/000/fff.jpg&text=Samsung+SSD'
        ];

        $base64Images = [];
        foreach ($imageUrls as $url) {
            $base64 = $this->downloadAndConvertToBase64($url);
            if ($base64) {
                $base64Images[] = $base64;
            }
        }

        return $base64Images;
    }

    public function run(): void
    {
        $allProducts = json_decode(file_get_contents(database_path('seeders/products_data.json')), true);
        $base64Images = $this->getBase64Images();
        $imageIndex = 0;

        foreach ($allProducts as $categoryName => $products) {
            $category = Category::firstOrCreate(['name' => $categoryName]);

            foreach ($products as $product) {
                Product::create([
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'stock' => $product['stock'],
                    'description' => $product['description'],
                    'category_id' => $category->id,
                    'image' => $base64Images[$imageIndex] ?? null,
                ]);

                $imageIndex++;
            }
        }
    }
}
