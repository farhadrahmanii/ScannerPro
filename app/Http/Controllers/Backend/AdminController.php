<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Provinces;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{


    public function AllUsers()
    {
        $users = User::with('province')->get();
        $provinces = Provinces::with('user')->get();
        return view("admin.backend.users.allUsers", compact("users", 'provinces'));
    } // End of Method

    public function AddAdminUsers()
    {
        return view("admin.backend.users.addUser");
    } // End of Method
    public function EditAdminUser($id)
    {
        $user = User::findOrFail($id);
        return view("admin.backend.users.editUser", compact("user"));
    } // End of Method
    public function UpdateAdminUser(Request $request)
    {
        $user = User::findOrFail($request->id);
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
            'province_id' => ['required'],
            'role' => ['required', 'string'],
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'province_id' => $request->province_id,
            'role' => $request->role,
        ]);
        $notification = array(
            'message' => $request->name . ' User Profile Updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('users.list')->with($notification);

    } // End of Method
    public function getChartData(Request $request)
    {
        $chartName = $request->input('name');
        $data = [];
        $categories = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

        switch ($chartName) {
            case 'Transactions':
                $data = $this->getMonthlyTransactionSums(Carbon::now()->year);
                break;
            case 'Drivers':
                $data = $this->getMonthlyDriverCounts(Carbon::now()->year);
                break;
            case 'Vehicles':
                $data = $this->getMonthlyVehicleCounts(Carbon::now()->year);
                break;
            case 'Payment Fees':
                $data = $this->getMonthlyPaymentFees(Carbon::now()->year);
                break;
            default:
                $data = array_fill(0, 12, 0); // Default empty data
        }

        return response()->json([
            'data' => $data,
            'categories' => $categories
        ]);
    }

    private function getMonthlyTransactionSums($year)
    {
        $monthlyTransactionSums = Transaction::selectRaw('MONTH(payment_time) as month, SUM(amount) as sum')
            ->whereYear('payment_time', $year)
            ->groupBy('month')
            ->pluck('sum', 'month')
            ->toArray();

        $data = [];
        for ($i = 1; $i <= 12; $i++) {
            $data[] = $monthlyTransactionSums[$i] ?? 0;
        }

        return $data;
    }
    private function getMonthlyDriverCounts($year)
    {
        $monthlyDriverCounts = Driver::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $data = [];
        for ($i = 1; $i <= 12; $i++) {
            $data[] = $monthlyDriverCounts[$i] ?? 0;
        }

        return $data;
    }

    private function getMonthlyVehicleCounts($year)
    {
        $monthlyVehicleCounts = Vehicle::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $data = [];
        for ($i = 1; $i <= 12; $i++) {
            $data[] = $monthlyVehicleCounts[$i] ?? 0;
        }

        return $data;
    }

    private function getMonthlyPaymentFees($year)
    {
        $monthlyPaymentFees = Transaction::selectRaw('MONTH(payment_time) as month, SUM(payment_fee) as sum')
            ->whereYear('payment_time', $year)
            ->groupBy('month')
            ->pluck('sum', 'month')
            ->toArray();

        $data = [];
        for ($i = 1; $i <= 12; $i++) {
            $data[] = $monthlyPaymentFees[$i] ?? 0;
        }

        return $data;
    }
    // End of Method
    public function userProfile()
    {
        return view("admin.backend.users.userProfile");
    }
}
