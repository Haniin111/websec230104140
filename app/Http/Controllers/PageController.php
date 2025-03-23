<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function miniTest()
    {
        $bill = [
            ['name' => 'Bread', 'quantity' => 2, 'price' => 10],
            ['name' => 'Milk', 'quantity' => 1, 'price' => 15],
            ['name' => 'Eggs', 'quantity' => 12, 'price' => 1.25],
        ];

        return view('minitest', ['bill' => $bill]);
    }

    public function products()
    {
        $products = [
            [
                'name' => 'Laptop',
                'image' => 'https://egyptlaptop.com/images/detailed/68/Laptop-Hp-Victus-15-fa1051ne.webp',
                'price' => 15000,
                'description' => 'High performance laptop for developers.'
            ],
            [
                'name' => 'Smartphone',
                'image' => 'https://images-cdn.ubuy.co.in/634d031dba8fe623b47893cc-smart-phone-android-8-1-smartphone-hd.jpg',
                'price' => 8000,
                'description' => 'Latest Android smartphone.'
            ],
            [
                'name' => 'Headphones',
                'image' => 'https://products.shureweb.eu/shure_product_db/product_main_images/files/c25/16a/40-/large_transparent/ce632827adec4e1842caa762f10e643d.png',
                'price' => 1200,
                'description' => 'Noise-cancelling wireless headphones.'
            ],
        ];

        return view('products', ['products' => $products]);
    }
}

