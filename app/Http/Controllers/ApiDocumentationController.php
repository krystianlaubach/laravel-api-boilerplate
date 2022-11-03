<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ApiDocumentationController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('scribe.index');
    }

    /**
     * @throws FileNotFoundException
     *
     * @return JsonResponse
     */
    public function postman(): JsonResponse
    {
        return response()->json(json_decode(Storage::disk('local')->get('scribe/collection.json')));
    }

    /**
     * @throws FileNotFoundException
     *
     * @return BinaryFileResponse
     */
    public function openapi(): BinaryFileResponse
    {
        return response()->file(Storage::disk('local')->path('scribe/openapi.yaml'));
    }
}
