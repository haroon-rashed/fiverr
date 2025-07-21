<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use App\Models\Gig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GigController extends Controller
{
    public function getCategories()
    {
        $categories = Category::all();
        return view('seller.pages.create-gig', compact('categories'));
    }

    public function getReleventValues(Request $req) 
    {
        try {
            $options_val = $req->option;
            
            Log::info('Getting relevant values for category:', ['category_id' => $options_val]);
            
            // Get the JSON string from the DB
            $find_val = Category::where('id', $options_val)->pluck('values')->first();
            
            if (!$find_val) {
                Log::warning('No values found for category:', ['category_id' => $options_val]);
                return response()->json([], 404);
            }
            
            // Decode JSON into PHP array
            $arr = json_decode($find_val, true);
            
            Log::info('Decoded values:', ['values' => $arr]);
            
            return response()->json($arr ?: []);
        } catch (\Exception $e) {
            Log::error('Get Relevant Values Error:', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }
     
public function addGig(Request $req)
{
    $validator = Validator::make($req->all(), [
        'title' => ['required', 'min:6'],
        'category' => 'required',
        'category_values' => 'required|array',
        'description' => 'required',
        'faq' => 'required',
        'base_price' => 'required',
        'standard_price' => 'required',
        'premium_price' => 'required',
        'images' => ['required', 'mimes:jpg,jpeg,webp,png'],
        'tags' => 'required'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 'error',
            'errors' => $validator->errors()
        ], 422); // Unprocessable Entity
    }

    $formFields = $validator->validated();

    // Convert array to comma-separated string
    $formFields['category_values'] = implode(',', $formFields['category_values']);

    $formFields['images'] = $req->file('images')->store('gigs', 'public');

    // Create gig
    Gig::create($formFields);

    return response()->json([
        'status' => 'success',
        'message' => 'Gig added successfully!'
    ]);

    // return back()->with('message', 'Gig added successfully!');
}

public function gitGigs(){
    $gigs = Gig::all();
    return view('welcome', compact('gigs'));
}

}