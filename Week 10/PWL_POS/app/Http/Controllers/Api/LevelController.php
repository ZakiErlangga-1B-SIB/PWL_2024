<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LevelModel;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index()
    {
        return LevelModel::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'level_kode' => 'required|string|max:50|unique:m_level,level_kode',
            'level_nama' => 'required|string|max:100',
        ]);

        $level = LevelModel::create($validated);

        return response()->json($level, 201);
    }

    public function show(LevelModel $level)
    {
        return response()->json($level);
    }

    public function update(Request $request, LevelModel $level)
    {
        $validated = $request->validate([
            'level_kode' => 'sometimes|required|string|max:50',
            'level_nama' => 'sometimes|required|string|max:100',
        ]);

        $level->update($validated);

        return response()->json($level);
    }

    public function destroy(LevelModel $level)
    {
        $level->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus',
        ]);
    }
}
