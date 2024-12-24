<?php 
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VisitorRepresentativeController extends Controller
{
    public function storeOrUpdate(Request $request)
    {
        $user = $request->user();

        $validatedData = $request->validate([
            'identification' => 'required|string|unique:visitor_representatives,identification,' . ($user->representative->id ?? 'NULL'),
            'phone' => 'required|string',
        ]);

        $representative = $user->representative()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'identification' => $validatedData['identification'],
                'phone' => $validatedData['phone'],
            ]
        );

        return response()->json([
            'message' => 'Perfil de representante actualizado.',
            'data' => $representative,
        ]);
    }
}
