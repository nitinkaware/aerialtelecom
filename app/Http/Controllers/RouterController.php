<?php

namespace App\Http\Controllers;

use App\Models\Router;
use App\Rules\MacAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class RouterController extends Controller
{
    public function index()
    {
        return Inertia::render('Router/Index', [
            'routers' => Router::orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Router/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'loopback' => ['required', 'ip'],
            'hostname' => ['required', 'max:20'],
            'mac' => ['required', 'max:17', new MacAddress],
        ]);

        $validated['sap_id'] = Str::random(18);

        Router::create($validated);

        return redirect()->to('/routers')->with('message', 'The router has been created.');
    }

    public function edit(Router $router)
    {
        return Inertia::render('Router/Show', [
            'router' => $router,
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'loopback' => ['required', 'ip'],
            'hostname' => ['required', 'max:20'],
            'mac' => ['required', 'max:17', new MacAddress],
        ]);

        $request->router->update($validated);

        return redirect()->to('/routers')->with('message', 'The router has been updated.');
    }

    public function destroy(Router $router)
    {
        $router->delete();

        return redirect()->to('/routers')->with('message', 'The router has been deleted.');
    }
}
