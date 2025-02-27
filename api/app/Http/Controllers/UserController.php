<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    /**
     * Get all users with pagination.
     */
    public function index(Request $request)
    {
        $page = $request->input('page', 1); 
        $perPage = 10; 

        // To avoid stale data, cache each page separately 
        $users = Cache::remember("users_list_page_{$page}", 3600, function () use ($perPage) {
            return User::select('id', 'name', 'email', 'latitude', 'longitude')
                        ->orderBy('id') 
                        ->paginate($perPage);
        });

        return response()->json([
            'message' => 'Users retrieved successfully.',
            'users' => $users,
        ]);
    }
}
