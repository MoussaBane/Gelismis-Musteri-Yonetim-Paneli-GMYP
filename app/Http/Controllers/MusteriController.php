<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Archive;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Response;
use League\Csv\Writer;

class MusteriController extends Controller
{
    public function ekle()
    {
        return view('musteri_formu');
    }

    public function kaydet(Request $request)
    {
        //dd($request->all());
        $user = User::where('id', $request->user_id)->first();
        if (Auth::user()->role == 'admin') {
            if ($user) {
                $user_id = $request->user_id;
            } else {
                return redirect()->back()->withErrors(['error' => 'Girdiginiz user_id Kayitli Kullanicilarimizda Bulunmamaktadir !!!']);
            }
        } else {
            $user_id = Auth::user()->id;
        }

        $result = Customer::create([
            'name' => $request['name'],
            'lastname' => $request['lastname'],
            'email' => $request['email'],
            'tel' => $request['tel'],
            'about' => $request['about'],
            'user_id' => $user_id,
        ]);
        if ($result) {
            $this->addCustomerArchive($request, Auth::user(), $result, 'create');
            return redirect()->route('home');
        }
    }

    public function iptal()
    {
        return redirect()->route('home');
    }

    public function update($id)
    {
        //return $id;
        $customer = Customer::where('id', $id)->first();

        //dd($customer);
        return view('musteri_update', ['customer' => $customer]);
    }

    public function saveUpdate(Request $request, $id)
    {
        $customerId = $request->route('id');
        //dd($request->all());
        $request->validate([
            'email' => ['required', Rule::unique('customers')->ignore($customerId)],
            'tel' => ['required', Rule::unique('customers')->ignore($customerId)],
        ]);

        $customer = Customer::where('id', $id);
        if ($customer) {

            if (Auth::user()->role == 'admin') {
                $user = User::find($request->user_id); //Check if a user with that id existes in the database
                if ($user) {
                    $new_id = $request->user_id;
                } else {
                    return redirect()->back()->withErrors('Kayitli Bu user_id Olan Bir Kullanici Bulunmamatadir !!!');
                }
            } else {
                $new_id = Auth::user()->id;
            }

            $customer->update([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'tel' => $request->tel,
                'about' => $request->about,
                'user_id' => $new_id,
            ]);

            $customerAr = Customer::where('id', $id)->first();
            $this->addCustomerArchive($request, Auth::user(), $customerAr, 'update');
            return redirect()->route('home');
        } else {
            return redirect()->back()->withErrors('Musteri Guncellenemedi. Lutfen Tekrar Deneyin !!!');
        }
    }

    public function delete(Request $request, $id)
    {
        //dd($id);
        $customer = Customer::where('id', $id)->first();
        //dd($customer);

        $this->addCustomerArchive($request, Auth::user(), $customer, 'delete');
        $customer->delete();

        return back();
    }

    public function search(Request $request)
    {
        $key_word = $request->keyword;

        $loggedUser = Auth::user();
        $startDate = "2023-07-12";
        $graphicData = [];

        if (empty($key_word)) {
            $customer_user = Customer::where('user_id', $loggedUser->id)->get();
            $customer_admin = Customer::all();
        } else {
            $customer_user = Customer::where('user_id', $loggedUser->id)
                ->when($key_word, function ($query) use ($key_word) {
                    return $query->where(function ($query) use ($key_word) {
                        $query->where('name', 'LIKE', "%$key_word%")
                            ->orWhere('lastname', 'LIKE', "%$key_word%")
                            ->orWhere('email', 'LIKE', "%$key_word%");
                    });
                })
                ->get();


            $customer_admin = Customer::where('name', 'LIKE', "%$key_word%")
                ->orWhere('lastname', 'LIKE', "%$key_word%")
                ->orWhere('email', 'LIKE', "%$key_word%")
                ->get();
        }

        if ($loggedUser->role == 'admin') {
            $users = User::all();
            $customers = $customer_admin;
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
            $customers = $customer_user;
            $graphicData[] = [
                'name' => $loggedUser->name,
                'totalCustomers' => Customer::where('user_id', $loggedUser->id)->count(),
                'newCustomers' => Customer::where('user_id', $loggedUser->id)
                    ->whereBetween('created_at', [$startDate, now()])
                    ->count()
            ];
        }

        return view('home', ['customers' => $customers, 'users' => $users, 'graphicData' => json_encode($graphicData)]);
    }

    public function showCustomer($id)
    {
        $customer = Customer::where('id', $id)->first();
        return view('musteri_goster', ['customer' => $customer]);
    }

    public function addCustomerArchive(Request $request, $user, $customer, $action)
    {
        Archive::create([
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_email' => $user->email,
            'customer_id' => $customer->id,
            'customer_name' => $customer->name,
            'customer_lastname' => $customer->lastname,
            'customer_email' => $customer->email,
            'customer_telephone' => $customer->tel,
            'customer_about' => $customer->about,
            'action' => $action
        ]);
    }

    public function showArchive()
    {

        if (Auth::user()->role == 'admin') {
            $archives = Archive::all();
        } else { // kullanici ise 
            $archives = Archive::where('user_id', Auth::user()->id)->get();
        }

        if (!$archives) {
            return redirect('home')->withErrors(['error' => 'Henüz Arsiv Bulunmamaktadir']);
        }

        return view('musteri_arsivleri', ['archives' => $archives]);
    }

    public function downloadCustomer()
    {
        if (Auth::user()->role == 'admin') {
            $customers = Customer::all();
        } else {
            $customers = Customer::where('user_id', Auth::user()->id)->get();
        }


        // Définir les en-têtes pour le téléchargement (optionnel)
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="myp_customers_list.csv"',
        ];

        // Définir le délimiteur pour les valeurs du CSV (optionnel)
        $delimiter = ';';

        $callback = function () use ($customers, $delimiter) {
            $file = fopen('php://output', 'w');

            // Écrire les en-têtes du CSV
            fputcsv($file, ['Id', 'Name', 'Lastname', 'Email', 'Telephone', 'About', 'User_Id'], $delimiter);

            // Écrire les données du CSV
            foreach ($customers as $customer) {
                fputcsv($file, [
                    $customer->id,
                    $customer->name,
                    $customer->lastname,
                    $customer->email,
                    $customer->tel,
                    $customer->about,
                    $customer->user_id
                ], $delimiter);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);












        /**
        
        // Créez une nouvelle instance de la classe Writer pour créer le fichier CSV
        $csv = Writer::createFromFileObject(new \SplTempFileObject());

        // Entête du CSV (facultatif)
        $csv->insertOne(['Id', 'Name', 'Lastname', 'Email', 'Telephone', 'About', 'User_Id']);

        // Ajoutez les données au CSV
        $csvData = [];
        foreach ($customers as $customer) {
            //$csvData[] = [$customer->id, $customer->name, $customer->lastname, $customer->email, $customer->tel, $customer->about, $customer->user_id];
            //$csv->insertOne([$customer->id . ',' . $customer->name . ',' . $customer->lastname . ',' . $customer->email . ',' . $customer->tel . ',' . $customer->about . ',' . $customer->user_id]);
            $csv->insertOne([$customer->id, $customer->name, $customer->lastname, $customer->email, $customer->tel, $customer->about, $customer->user_id]);
        }
        //$csv->insertAll($csvData);

        // Définir les en-têtes pour le téléchargement (optionnel)
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="myp_customers_list.csv"',
        ];

        // Renvoyer le fichier CSV en tant que téléchargement
        return response()->streamDownload(function () use ($csv) {
            $csv->output();
        }, 'myp_customer_list.csv', $headers);
         */


        //Implementation problem in app/Exports/CustomerExport.php because of the version of php and maatwebsite/excel:^3.1
        //return Excell::download(new CustomerExport($customers),'customers.csv');
    }
}
