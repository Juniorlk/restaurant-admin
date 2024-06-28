<?php
namespace App\Http\Controllers\Admin;

use App\Models\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TableController extends Controller
{
    public function index()
    {
        $tables = Table::paginate(10);
        return view('admin.tables.index', compact('tables'));
    }

    public function create()
    {
        return view('admin.tables.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Numero_de_table' => 'required|string',
            'Capacite' => 'required|integer',
        ]);

        Table::create($request->all());

        return redirect()->route('tables.index')->with('success', 'Table créée avec succès.');
    }

    public function show(Table $table)
    {
        return view('admin.tables.show', compact('table'));
    }

    public function edit(Table $table)
    {
        return view('admin.tables.edit', compact('table'));
    }

    public function update(Request $request, Table $table)
    {
        $request->validate([
            'Numero_de_table' => 'required|integer',
            'Capacite' => 'required|integer',
        ]);

        $table->update($request->all());

        return redirect()->route('tables.index')->with('success', 'Table mise à jour avec succès.');
    }

    public function destroy(Table $table)
    {
        $table->delete();

        return redirect()->route('tables.index')->with('success', 'Table supprimée avec succès.');
    }
}
