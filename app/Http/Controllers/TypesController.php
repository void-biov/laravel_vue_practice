<?php
namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;


class TypesController extends Controller{
    public function types(Request $request){
        $query = DB::table('types')->select('types.id','types.name');

        $types = $query->get();
        return $types;
    }

    public function index(){
        return view('types.index');
    }

    public function store(Request $request) {
        try {
            $request->validate([
                'name' => 'min:4|required',
            ]);

            $type = Type::create($request->all());

            return response()->json([
                'message' => 'Creation was successful!',
                'type' => $type
            ], 201);
        }
        catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    public function update(Request $request, Type $type) {
        $request->validate([]);

        $type->update($request->all());

        return response()->json(['message' => 'Updated'], 200);
    }

    public function destroy(Type $type) {
        if (!$type) {
            return response()->json(['message' => 'Type not found'], 404);
        }

        $type->delete();

        return response()->json(['message' => 'Delete succesful'], 200);

    }
}

