<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $loggedUser = Auth::user();
        $graphicData = [];
        $startDate = "2023-07-12";

        if ($loggedUser->role == 'admin') {
            $users = User::all();
            $customers = Customer::all();
            

            foreach ($users as $user) {
                $graphicData[] = [
                    'name' => $user->name,
                    'totalCustomers' => Customer::where('user_id', $user->id)->count(),
                    'newCustomers' => Customer::where('user_id', $user->id)
                        ->whereBetween('created_at', [$startDate, now()])
                        ->count()
                ];
            }
        } else { // $loggedUser->role == 'kullanici'
            $users = User::Where('id', $loggedUser->id)->get();
            $customers = Customer::where('user_id', $loggedUser->id)->get();
            $graphicData[] = [
                'name' => $loggedUser->name,
                'totalCustomers' => Customer::where('user_id', $loggedUser->id)->count(),
                'newCustomers' => Customer::where('user_id', $loggedUser->id)
                    ->whereBetween('created_at', [$startDate, now()])
                    ->count()
            ];
        }


        return view('home', ['users' => $users, 'customers' => $customers, 'graphicData' => json_encode($graphicData)]);
    }
}
