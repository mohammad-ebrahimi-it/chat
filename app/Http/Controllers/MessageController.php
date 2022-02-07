<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(): JsonResponse
    {
        $messages = Message::with(['user'])->latest()->take(20)->get();

        return response()->json([
            $messages
        ], 200);
    }
}
