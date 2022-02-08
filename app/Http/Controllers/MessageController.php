<?php

namespace App\Http\Controllers;

use App\Events\MessageCreated;
use App\Models\Message;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(): JsonResponse
    {
        $messages = Message::with(['user'])->latest()->take(20)->get();

        return response()->json(
            $messages
        , 200);
    }

    public function store(Request $request): JsonResponse
    {
        $message = auth()->user()->messages()->create([
            Message::BODY => $request->input(Message::BODY)
        ]);
        broadcast(new MessageCreated($message))->toOthers();
        return response()->json($message,200);
    }
}
