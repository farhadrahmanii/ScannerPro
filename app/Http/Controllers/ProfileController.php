<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Carbon\Carbon;
use Faker\Core\Uuid;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::redirect()->with('status', 'profile-updated');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;

        if ($request->hasFile('photo')) {
            // Delete the previous profile image and its directory if they exist
            if ($user->photo && file_exists(storage_path('app/public') . $user->photo)) {
                $previousDirectory = dirname(storage_path('app/public') . $user->photo);
                unlink(storage_path('app/public') . $user->photo);

                // Remove the directory if it's empty
                if (is_dir($previousDirectory) && count(scandir($previousDirectory)) == 2) {
                    rmdir($previousDirectory);
                }
            }

            $imageName = time() . '.' . $request->photo->extension();
            $uploadPath = storage_path('app/public/uploads/images/' . rand(1000000000, 9999999999));

            // Create directory if it doesn't exist
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $request->photo->move($uploadPath, Carbon::now()->format('Y-m-d-H-i-s') . '-' . $imageName);
            $user->photo = str_replace(storage_path('app/public'), '', $uploadPath) . '/' . Carbon::now()->format('Y-m-d-H-i-s') . '-' . $imageName;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Delete the user's profile image if it exists
        if ($user->photo && file_exists(storage_path('app/public') . $user->photo)) {
            $previousDirectory = dirname(storage_path('app/public') . $user->photo);
            unlink(storage_path('app/public') . $user->photo);

            // Remove the directory if it's empty
            if (is_dir($previousDirectory) && count(scandir($previousDirectory)) == 2) {
                rmdir($previousDirectory);
            }
        }

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
