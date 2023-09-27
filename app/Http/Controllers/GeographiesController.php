<?php
namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseStatusCodeSame;

use function PHPSTORM_META\map;

class GeographiesController extends Controller{
    public function geographies(Request $request){
        $query = DB::table('locations')->select('locations.id','locations.name');

        $geographies = $query->get();
        return $geographies;
    }

    public function index() {
        return view('locations.index');
    }

    public function store(Request $request){
        try{
            $request->validate([
                'name' => 'min:4|required',
            ]);

            $location = Location::create($request->all());

            return response()->json([
                'message' => 'Creation was successfull!',
                'location' => $location
            ], 201);
        }
        catch (ValidationException $e){
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    public function update(Request $request, Location $location){
        $request->validate([]);

        $location->update($request->all());

        return response()->json(['message' => 'Updated'], 200);

    }

    public function destroy(Request $request){
        $id = $request->route('id');
        $location = Location::find($id);

        if (!$location) {
            return response()->json(['message' => 'Location not found'], 404);
        }

        $location->delete();

        return response()->json(['message' => 'Delete succesfull'], 200);
    }

}

