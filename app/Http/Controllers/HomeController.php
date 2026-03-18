<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
//    private $topPicksProducts = [
//        [
//            'id'    => 1,
//            'name'  => 'La Sportiva Finale',
//            'price' => '129.95',
//            'image' => 'assets/img/image1.png',
//            'badge' => 'In Stock',
//            'url'   => '/products/la-sportiva-finale'
//        ],
//        [
//            'id'    => 2,
//            'name'  => 'Chalk Powder 300g',
//            'price' => '18.95',
//            'image' => 'assets/img/image2.png',
//            'badge' => 'Best Seller',
//            'url'   => '/products/chalk-powder'
//        ],
//        [
//            'id'    => 3,
//            'name'  => 'La Sportiva Chalkbag',
//            'price' => '24.95',
//            'image' => 'assets/img/image3.png',
//            'badge' => 'New Arrival',
//            'url'   => '/products/chalkbag'
//        ],
//        [
//            'id'    => 4,
//            'name'  => 'La Sportiva Tarantula',
//            'price' => '99.95',
//            'image' => 'assets/img/image4.png',
//            'badge' => 'Limited Edition',
//            'url'   => '/products/tarantula'
//        ],
//    ];
//
//    private $bestSellingGear = [
//        [
//            'id'    => 5,
//            'name'  => 'MOUNTAIN T-SHIRT MEN',
//            'price' => '24.95',
//            'image' => 'assets/img/image5.png',
//            'badge' => 'Up to 35% off',
//            'url'   => '/products/mountain-t-shirt'
//        ],
//        [
//            'id'    => 6,
//            'name'  => 'LA SPORTIVA TARANTULA',
//            'price' => '90.95',
//            'image' => 'assets/img/image6.png',
//            'badge' => 'Best Seller',
//            'url'   => '/products/tarantula-shoes'
//        ],
//        [
//            'id'    => 7,
//            'name'  => 'WOODBRUSH',
//            'price' => '10.95',
//            'image' => 'assets/img/image7.png',
//            'badge' => 'New Arrival',
//            'url'   => '/products/woodbrush'
//        ],
//        [
//            'id'    => 8,
//            'name'  => 'TRAD CHALKBAG',
//            'price' => '13.95',
//            'image' => 'assets/img/image8.png',
//            'badge' => 'Limited Edition',
//            'url'   => '/products/trad-chalkbag'
//        ],
//    ];

    public function index() {
        $topPicks = Product::orderBy('name','asc')->take(4)->get();
        $bestSellers = Product::select('products.*')->orderBy('products.name','desc')->join('badges', 'products.badge_id', '=', 'badges.id')->where('badges.name', 'Best Seller')->take(4)->get();

        return view('index', compact('topPicks', 'bestSellers'));
    }
}
