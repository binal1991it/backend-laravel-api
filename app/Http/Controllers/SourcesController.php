<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Sources;
use App\Models\Categories;
use App\Models\Savesearch;
use DB;
use Validator;


class SourcesController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function index(Request $request) {
        return response()->json([
            'message' => 'Data get successfully',
            'status' => 1,
            'sources' => Sources::whereNull('deleted_at')->get(),
            'categories' => DB::table('categories')->whereNull('deleted_at')->get(),
            'saveSearches' => DB::table('savesearches')->whereNull('deleted_at')->get(),
        ], 201);
    }
    public function saveSearch(Request $request) {
        $saveSearch = Savesearch::create([
                            'userId' => $request->userId,
                            'search_name' => $request->search_name,
                            'category' => $request->category,
                            'source' => $request->source,
                            'keyword' => $request->keyword,
                            'date' => $request->date,
                            ]);

        return response()->json([
            'message' => 'Search successfully saved',
            'status' => 1,
            'saveSearch' => $saveSearch
        ], 201);
    }
    

}
