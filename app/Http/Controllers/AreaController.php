<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AreaController extends Controller
{

    // Método privado para manejar llamadas HTTP repetitivas
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index()
    {
        $url = env('URL_SERVER_API');

        $areas = $this->fetchDataFromApi($url . '/area');

        return view('area.index', compact('areas'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $area = $this->fetchDataFromApi($url . '/area/' . $id);

        return view('area.show', compact('area'));
    }
}