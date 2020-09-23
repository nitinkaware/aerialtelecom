<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Inertia\Inertia;

class ServersController extends Controller
{
    public function index()
    {
        return Inertia::render('Servers/Index', [
            'servers' => Server::orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function edit(Server $server)
    {
        $sshSession = $server->ssh();

        return Inertia::render('Router/Show', [
            'diskUsages' => $sshSession->diskUsages(),
            'files' => $sshSession->files('/root'),
        ]);
    }
}
