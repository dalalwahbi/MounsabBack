<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrestataireController extends Controller
{
    public function createAnnonce(Request $request)
    {
        $user_id = Auth::guard('api')->user()->id;

        try {
            // Validate the incoming request data
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'location' => 'required|string|max:255',
                'sub_category_id' => 'required|integer',
                'sous_category_id' => 'integer',
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'price' => 'required|numeric',
            ]);

            // Handle the picture file upload
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $file = $request->file('image');
                $pictureName = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/images', $pictureName);
                $pictureUrl = 'storage/images/' . $pictureName;
            } else {
                return response()->json(['error' => 'File upload failed or invalid file.'], 400);
            }

            // Create a new Annonce
            $annonce = Annonce::create([
                'title' => $request->title,
                'description' => $request->description,
                'location' => $request->location,
                'sub_category_id' => $request->sub_category_id,
                'sous_category_id' => $request->sous_category_id,
                'image' => $pictureUrl,
                'user_id' => $user_id,
                'price' => $request->price,
            ]);

            // Return success response
            return response()->json([
                "status" => "success",
                "message" => "Annonce created successfully",
                "annonce" => $annonce
            ], 201);

        } catch (\Exception $e) {
            // Return error response
            return response()->json([
                'status' => 'error',
                'message' => 'Annonce creation failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}