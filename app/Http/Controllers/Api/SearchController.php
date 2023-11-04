<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $query = $request->get('query');
        $cars = Car::where('name', 'like', "%$query%")->get();
        return response()->json([
            'message' => 'success',
            'cars' => $cars
        ]);
    }
}
