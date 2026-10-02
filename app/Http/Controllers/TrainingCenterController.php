<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TrainingCenterController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index()
    {
        $url = env('URL_SERVER_API');

        $trainingCenters = $this->fetchDataFromApi($url . '/training-center');

        return view('trainingCenter.index', compact('trainingCenters'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $trainingCenter = $this->fetchDataFromApi($url . '/training-center/' . $id);

        return view('trainingCenter.show', compact('trainingCenter'));
    }
}