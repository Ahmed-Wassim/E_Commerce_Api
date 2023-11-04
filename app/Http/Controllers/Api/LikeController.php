<?php

namespace App\Http\Controllers\Api;

use App\Models\Car;
use App\Models\Like;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LikeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Car $car)
    {
        $user = auth()->user();
        $like = $user->likes->where('car_id', $car->id)->first();

        if (!$like) {
            Like::create([
                'user_id' => $user->id,
                'car_id' => $car->id
            ]);
            return response()->json([
                'message' => 'Car liked'
            ]);
        }
        $like->delete();
        return response()->json([
            'message' => 'Car unliked'
        ]);
    }
}
