<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // بررسی احراز هویت بر مبنای نقش
        if (!auth()->check()) {
            return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }

        if (auth()->user()->is_admin) {
            // اگر کاربر ادمین باشد، تمام یادآورها را برگردانید
            $reminders = Reminder::all();
        } else {
            // در غیر این صورت، فقط یادآورهای مرتبط با کاربر جاری را برگردانید
            $userId = auth()->id();
            $reminders = Reminder::where('user_id', $userId)->get();
        }

        // ارسال پاسخ به کلاینت
        return response()->json([
            'reminders' => $reminders
        ], Response::HTTP_OK);
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
    public function store(Request $request)
    {
//        $user_id = auth()->id();
        $reminder = new Reminder();
        $reminder->insurance_menu = $request->input('insurance_menu');
        $reminder->description = $request->input('description');
        $reminder->due_date = $request->input('due_date');
        $reminder->payment_period = $request->input('payment_period');
        $reminder->user_id = auth()->id();
        $reminder->save();

        return response()->json($reminder, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reminder = Reminder::find($id);
        return response()->json($reminder, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $reminder = Reminder::find($id);
        $reminder->insurance_menu = $request->input('insurance_menu');
        $reminder->description = $request->input('description');
        $reminder->due_date = $request->input('due_date');
        $reminder->payment_period = $request->input('payment_period');
        $reminder->update();

        return response()->json($reminder, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reminder = Reminder::find($id);
        if (!$reminder) {
            return response()->json(['message' => 'Reminder not found'], Response::HTTP_NOT_FOUND);
        }

        $reminder->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
