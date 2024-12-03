<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\messageMail;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'subject' => 'required',
                'message' => 'required',
            ]);

            $toEmail = "iamhafizabdullah@gmail.com";

            // Mail::to($toEmail)->send(new messageMail($data));
            return response()->json(['success' => true]);
        }
        catch (\Illuminate\Validation\ValidationException $e) {
            // Return validation errors with a 422 status code
            return response()->json(['success' => false, 'errors' => $e->errors()], 422);
        } catch (\Exception $ex) {
            // Return general errors with a 500 status code
            return response()->json(['success' => false, 'message' => $ex->getMessage()], 500);
        }
    }
}
