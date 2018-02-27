<?php

namespace App\Http\Controllers;

use App\Events\FeedbackCreated;
use App\Events\ReplyCreated;
use App\Feedback;
use App\Reply;
use Illuminate\Http\Request;
use App\Http\Resources\Feedback as FeedbackResource;
use App\Http\Resources\Reply as ReplyResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{

    public function index()
    {
        $allFeedback = Feedback::with('replies')->latest()->paginate(10);

        return FeedbackResource::collection($allFeedback);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'body' => 'required|min:3',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        if ($user = Auth::user()) {
            $feedback = Feedback::create([
              'body' => $request->input('body'),
              'user_id' => $user->id,
              'name' => $user->name,
              'email' => $user->email,
            ]);
            event(new FeedbackCreated($feedback));
            return new FeedbackResource($feedback);
        } else return response()->json(['error' => 'user not found'], 401);


    }


    public function show(Feedback $feedback)
    {
        return new FeedbackResource($feedback);
    }


    public function edit(Feedback $feedback)
    {
        //
    }

    public function destroy(Feedback $feedback)
    {
        //
    }

    public function reply(Request $request, Feedback $feedback, $id)
    {
        $validator = Validator::make($request->all(), [
          'body' => 'required|min:3',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $reply = Reply::create([
          'body' => $request->input('body'),
          'user_id' => Auth::user()->id,
          'feedback_id' => $id
        ]);

        event(new ReplyCreated($reply));

        return new ReplyResource($reply);

    }
}
