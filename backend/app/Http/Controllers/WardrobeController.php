<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WardrobeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $items = Item::where('user_id', auth()->user()->id)->get();

        return response()->json($items);
    }

    /**
     * Store a newly created item in database.
     */
    public function store(Request $request)
    {
        try {
            $validated = Validator::make($request->all(), 
            [
                'name' => 'required|string',
                'category' => 'required|string',
                'description' => 'required|string',
                'image_url' => 'required|url',
            ]);

            if($validated->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation failed',
                    'errors' => $validated->errors()
                ], 401);
            }
        
            $item = Item::create([
                'name' => $request->name,
                'category' => $request->category,
                'description' => $request->description,
                'image_url' => $request->image_url,
                'user_id' => auth()->user()->id,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Item Added Successfully',
                'item' => $item
            ], 201);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified item.
     */
    public function show(string $id)
    {
        return Item::findOrFail($id);
    }

    /**
     * Update the specified item in database.
     */
    public function update(Request $request, string $id)
    {
        $item = Item::findOrFail($id);

        $item->update($request->all());

        return response()->json($item, 200);
    }

    /**
     * Remove the specified item from database.
     */
    public function destroy(string $id)
    {
        $item = Item::findOrFail($id);

        $item->delete();

        return response()->json(null, 204);
    }

    /**
     * Filter a listing of the resource.
     */
    public function filter(Request $request)
    {
        $items = Item::where('user_id', auth()->user()->id)
            ->when($request->category, function ($query) use ($request) {
                $query->where('category', $request->category);
            })
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%'.$request->search.'%');
            })
            ->get();

        return response()->json($items);
    }
}
