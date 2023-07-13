<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Assuming you have a "User" model for the "users" table
use DateTime;

class InputController extends Controller
{
    public function form_submission(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'birthday' => 'required',
            'report' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'email' => 'required',
            // Add more validation rules if needed
        ]);

        $fullname = $request->input('firstName') . " " . $request->input('lastName');

        $date_of_birth = str_replace(" ", '', $request->input('birthday'));
        $dateObj = DateTime::createFromFormat('d-m-Y', $date_of_birth);
        $dateFormatted = $dateObj->format('Y-m-d');

        $report = $request->input('report');

        $country = $request->input('country');

        $phone = '+' . preg_replace('/[^0-9]/', '', $request->input('phone'));
        $email = $request->input('email');
        $сompany = $request->input('сompany');
        $position = $request->input('position');
        $about = $request->input('about');
        $statusMsg = '';

        // File upload path
        if ($request->hasFile('file')) {
            $targetDir = 'uploads/';
            $fileName = $request->file('file')->getClientOriginalName();
            $targetFilePath = $targetDir . $fileName;
            $fileType = $request->file('file')->getClientOriginalExtension();

            $allowTypes = ['jpg', 'png', 'jpeg', 'gif'];
            if (in_array($fileType, $allowTypes)) {
                $request->file('file')->move(public_path($targetDir), $fileName);
                $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
            } else {
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF files are allowed to upload.';
            }

        } else {
            $fileName = "avatar2.png";
            $statusMsg = "No file selected. Using default photo.";
        }

        // Create a new User instance and save it in the database
        $user = new User();
        $user->fullname = $fullname;
        $user->report = $report;
        $user->date_of_birth = $dateFormatted;
        $user->country = $country;
        $user->phone = $phone;
        $user->email = $email;
        $user->сompany = $сompany;
        $user->position = $position;
        $user->about = $about;
        $user->file_name = $fileName;
        $user->uploaded_on = now();
        $user->save();

        echo "Data successfully added. " . $statusMsg;
    }
}
