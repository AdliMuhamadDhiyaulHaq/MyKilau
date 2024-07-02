<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use DataTables;

class ProgramController extends Controller
{

    public function Dashboard()
    {
        $jumlahProgram = Program::count(); // Mendapatkan jumlah program dari tabel Program

        return view('dashboard', compact('jumlahProgram'));
    }
    public function index()
    {
        $sumberDanaOptions = Program::distinct()->orderBy('sumber_dana')->pluck('sumber_dana')->toArray();
        $keteranganOptions = Program::distinct()->orderBy('keterangan')->pluck('keterangan')->toArray();
        return view('pages.program', compact('sumberDanaOptions', 'keteranganOptions'));
    }


    public function getPrograms(Request $request)
    {
        if ($request->ajax()) {
            $query = Program::query();

            // Filter by sumber_dana if provided
            if ($request->has('sumber_dana')) {
                $query->where('sumber_dana', $request->sumber_dana);
            }

            // Filter by keterangan if provided
            if ($request->has('keterangan')) {
                $query->where('keterangan', $request->keterangan);
            }

            $data = $query->select(['id', 'sumber_dana', 'program', 'keterangan']);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm editProgram" data-id="' . $row->id . '">Edit</a>';
                    $btn .= ' <a href="javascript:void(0)" class="btn btn-danger btn-sm deleteProgram" data-id="' . $row->id . '">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        // If not an AJAX request, return all data normally
        $data = Program::select(['id', 'sumber_dana', 'program', 'keterangan'])
            ->orderBy('id', 'desc')
            ->get();

        $sumberDanaOptions = Program::orderBy('sumber_dana')->pluck('sumber_dana')->unique()->toArray();
        $keteranganOptions = Program::orderBy('keterangan')->pluck('keterangan')->unique()->toArray();

        return view('pages.program', compact('data', 'sumberDanaOptions', 'keteranganOptions'));
    }




    public function store(Request $request)
    {
        $program = Program::updateOrCreate(
            ['id' => $request->program_id],
            [
                'sumber_dana' => $request->sumber_dana,
                'program' => $request->program,
                'keterangan' => $request->keterangan
            ]
        );

        if ($program) {
            return response()->json(['success' => 'Program Berhasil Disimpan.']);
        } else {
            return response()->json(['error' => 'Gagal Membuat Program .'], 500);
        }
    }

    public function edit($id)
    {
        $program = Program::find($id);
        if (!$program) {
            return response()->json(['error' => 'Program not found'], 404);
        }
        return response()->json(['success' => 'Program loaded successfully', 'data' => $program]);
    }
    // Contoh implementasi metode update di ProgramController
    public function update(Request $request, $id)
    {
        $program = Program::findOrFail($id);
        $program->update($request->all());

        return response()->json(['success' => 'Program berhasil diperbarui']);
    }



    public function destroy($id)
    {
        $program = Program::find($id);
        if ($program) {
            $program->delete();
            return response()->json(['success' => 'Program Berhasil Dihapus.']);
        } else {
            return response()->json(['error' => 'Gagal Menghapus Program.'], 500);
        }
    }
}
