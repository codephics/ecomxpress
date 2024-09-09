<?php

namespace App\Http\Global\Controllers;

use App\Models\Global\Installation;
use Illuminate\Http\Request;

class InstallationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function showInstallForm()
    {
        return view('install.db');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function install(Request $request)
    {
        // Validate the form data
        $request->validate([
            'db_name' => 'required|string',
            'db_username' => 'required|string',
            'db_password' => 'required|string',
        ]);

        // Update the .env file with the provided database credentials
        $envPath = base_path('.env');
        $envContent = File::get($envPath);

        $envContent = preg_replace('/DB_DATABASE=.*/', 'DB_DATABASE=' . $request->db_name, $envContent);
        $envContent = preg_replace('/DB_USERNAME=.*/', 'DB_USERNAME=' . $request->db_username, $envContent);
        $envContent = preg_replace('/DB_PASSWORD=.*/', 'DB_PASSWORD=' . $request->db_password, $envContent);

        File::put($envPath, $envContent);

        // Run necessary Artisan commands
        Artisan::call('key:generate');
        Artisan::call('migrate', ["--force" => true]);
        Artisan::call('db:seed', ["--force" => true]);

        // Run Composer and NPM commands if needed
        exec('composer install');
        exec('npm install');
        exec('npm run dev');

        // Redirect to the application or show a success message
        return redirect('/')->with('success', 'Installation completed successfully!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 
    }

    /**
     * Display the specified resource.
     */
    public function show(Installation $installation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Installation $installation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Installation $installation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Installation $installation)
    {
        //
    }
}
