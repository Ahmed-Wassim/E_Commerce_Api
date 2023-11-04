<?php

namespace App\Http\Controllers\Api;

use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $categories = Category::all();
        $randomCars = Car::inRandomOrder()->take(8)->get();
        return response()->json([
            'message' => 'success',
            'categories' => $categories,
            'cars' => $randomCars
        ]);
    }
}
