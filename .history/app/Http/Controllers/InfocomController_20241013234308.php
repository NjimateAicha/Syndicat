<?php

// namespace App\Http\Controllers;

// use App\Models\InfoCom;
// use App\Models\Residence;
// use App\Models\User;
// use Carbon\Carbon;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\Request;

// class InfocomController extends Controller
// {

//     public function index()
//     {
//         $users = User::where('residence_id', Auth::user()->residence_id)->get();

//         $residence = Residence::findOrFail(Auth::user()->residence_id);
//         $usersId = $users->pluck('id');

//         $infoComs = InfoCom::where('user_id', Auth::user()->id)
//             ->where('residence_id', $residence->id)
//             ->get();
//         $infoComsUser = InfoCom::where('from_id', Auth::user()->id)
//             ->where('residence_id', $residence->id)->get();

//         return view('infocom.index', compact('users','infoComsUser', 'infoComs', 'residence'));
//     }



//     public function getInfocom(Residence $residence)
//     {
//         $users = User::where('residence_id', $residence->id)->get();

//         $infoComs = InfoCom::where('user_id', Auth::user()->id)
//             ->where('residence_id', $residence->id)
//             ->get();
//         $infoComsUser = InfoCom::where('from_id', Auth::user()->id)
//             ->where('residence_id', $residence->id)->get();

//         return view("infocom.index")->with(["residence" => $residence, "infoComsUser" => $infoComsUser, "users" => $users, "infoComs" => $infoComs]);
//     }


//     public function store(Request $request)
//     {
//         // Validate the request data
//         $validatedData = $request->validate([
//             'titre' => 'required|string|max:255',
//             'description' => 'required|string|max:255',
//             'user_id' => 'required|string', // Accept 'all' or user ID as string
//             'residence_id' => 'required|exists:residences,id',
//         ]);

//         // Check if 'Send to All Users' option was selected
//         if ($validatedData['user_id'] === 'all') {
//             // Fetch all users linked to the selected residence
//             $users = User::where('residence_id', $validatedData['residence_id'])->get();

//             // Create an InfoCom for each user in the residence
//             foreach ($users as $user) {
//                 InfoCom::create([
//                     'titre' => $validatedData['titre'],
//                     'description' => $validatedData['description'],
//                     'user_id' => $user->id, // Assign the current user in the loop
//                     'residence_id' => $validatedData['residence_id'],
//                     'from_id' => null,
//                     'date_info' => now(), // Use Laravel helper for current date/time
//                 ]);
//             }

//             // Redirect back with a success message
//             return redirect()->route('infocom.index')->with('success', 'InfoCom added for all users successfully');
//         } else {
//             // Create a single InfoCom for the selected user
//             InfoCom::create([
//                 'titre' => $validatedData['titre'],
//                 'description' => $validatedData['description'],
//                 'user_id' => $validatedData['user_id'], // Only the selected user
//                 'residence_id' => $validatedData['residence_id'],
//                 'from_id' => Auth::id(),
//                 'date_info' => now(), // Use Laravel helper for current date/time
//             ]);

//             // Redirect back with a success message
//             return redirect()->route('infocom.index')->with('success', 'InfoCom added successfully');
//         }
//     }



//     public function destroy(User $user)
//     {
//         $user->delete();
//         return redirect()->route('infocom.index');
//     }
// }

















namespace App\Http\Controllers;

use App\Models\InfoCom;
use App\Models\Residence;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfocomController extends Controller
{

    // public function index()
    // {
    //     $users = User::where('residence_id', Auth::user()->residence_id)->get();

    //     $residence = Residence::findOrFail(Auth::user()->residence_id);
    //     $usersId = $users->pluck('id');

    //     $infoComs = InfoCom::where('user_id', Auth::user()->id)
    //         ->where('residence_id', $residence->id)
    //         ->get();
    //     $infoComsUser = InfoCom::where('from_id', Auth::user()->id)
    //         ->where('residence_id', $residence->id)->get();

    //     return view('infocom.index', compact('users','infoComsUser', 'infoComs', 'residence'));
    // }



    // public function getInfocom(Residence $residence)
    // {
    //     $users = User::where('residence_id', $residence->id)->get();

    //     $infoComs = InfoCom::where('user_id', Auth::user()->id)
    //         ->where('residence_id', $residence->id)
    //         ->get();
    //     $infoComsUser = InfoCom::where('from_id', Auth::user()->id)
    //         ->where('residence_id', $residence->id)->get();

    //     return view("infocom.index")->with(["residence" => $residence, "infoComsUser" => $infoComsUser, "users" => $users, "infoComs" => $infoComs]);
    // }

    public int $pageNumber = 3;

    /**
     * Filter the query based on request inputs.
     */
    private function filter(Request $request, $query, $titleField = 'titre', $dateField = 'created_at')
    {
        if ($request->has('titre')) {
            $title = $request->input('titre');
            $query->where($titleField, 'LIKE', '%' . $title . '%');
        }

        if ($request->has('order')) {
            $order = $request->input('order');

            switch ($order) {
                case 'alphabetical_asc':
                    $query->orderBy($titleField);
                    break;
                case 'alphabetical_desc':
                    $query->orderByDesc($titleField);
                    break;
                case 'numeric_asc':
                    $query->orderBy($dateField);
                    break;
                case 'numeric_desc':
                    $query->orderByDesc($dateField);
                    break;
                default:
                    break;
            }
        } else {
            $query->orderByDesc($dateField);
        }

        return $query;
    }

    /**
     * Display the InfoCom index page.
     */
    public function index()
    {
        $residenceId = Auth::user()->residence_id;

        $users = User::where('residence_id', $residenceId)
            ->whereNot('id', Auth::user()->id)
            ->get();
        $residence = Residence::findOrFail($residenceId);

        $infoComs = InfoCom::where('user_id', Auth::user()->id)
            ->where('residence_id', $residenceId)
            ->orderByDesc('created_at')
            ->get();

        $infoComsUser = InfoCom::where('from_id', Auth::user()->id)
        ->where('residence_id', $residenceId)
        ->distinct()
        ->orderByDesc('created_at')
        ->get(['titre', 'description', 'created_at']); // تحديد الأعمدة المطلوبة فقط


        return view('infocom.index', compact('users', 'infoComsUser', 'infoComs', 'residence'));
    }

    /**
     * Get and filter InfoCom data with pagination.
     */
    public function getInfocom(Residence $residence, Request $request)
    {
        $users = User::where('residence_id', $residence->id)->get();

        
        $infoComQuery = InfoCom::where('user_id', Auth::user()->id)
            ->where('residence_id', $residence->id);

        // استعلام لمعلومات المستخدمين
        $infoComsUserQuery = InfoCom::where('from_id', Auth::user()->id)
            ->where('residence_id', $residence->id)
            ->select('titre', 'description', DB::raw('MAX(created_at) as created_at')) // استخدم MAX للحصول على أحدث تاريخ
            ->groupBy('titre', 'description'); // استخدم groupBy بدلاً من distinct
  
        $infoComs = $this->filter($request, $infoComQuery, 'titre', 'created_at')
            ->get()
            ->appends($request->all());
       
        $infoComsUser = $this->filter($request, $infoComsUserQuery, 'titre', 'created_at')
            ->get()// استخدام paginate مباشرة هنا
            ->appends($request->all());
       


        return view('infocom.index', compact('residence', 'infoComs', 'infoComsUser', 'users'));
    }


    // public function store(Request $request)
    // {
    //     // Validate the request data
    //     $validatedData = $request->validate([
    //         'titre' => 'required|string|max:255',
    //         'description' => 'required|string|max:255',
    //         'user_id' => 'required|string', // Accept 'all' or user ID as string
    //         'residence_id' => 'required|exists:residences,id',
    //     ]);

    //     $selectedUsers = $validatedData['user_id'];

    //     // Check if 'Send to All Users' option was selected
    //     if ($validatedData['user_id'] === 'all') {
    //         // Fetch all users linked to the selected residence
    //         $users = User::where('residence_id', $validatedData['residence_id'])->get();

    //         // Create an InfoCom for each user in the residence
    //         foreach ($users as $user) {
    //             InfoCom::create([
    //                 'titre' => $validatedData['titre'],
    //                 'description' => $validatedData['description'],
    //                 'user_id' => $user->id, // Assign the current user in the loop
    //                 'residence_id' => $validatedData['residence_id'],
    //                 'from_id' => null,
    //                 'date_info' => now(), // Use Laravel helper for current date/time
    //             ]);
    //         }

    //         // Redirect back with a success message
    //         return redirect()->route('infocom.index')->with('success', 'InfoCom added for all users successfully');
    //     } else {
    //         // Create a single InfoCom for the selected user
    //         InfoCom::create([
    //             'titre' => $validatedData['titre'],
    //             'description' => $validatedData['description'],
    //             'user_id' => $validatedData['user_id'], // Only the selected user
    //             'residence_id' => $validatedData['residence_id'],
    //             'from_id' => Auth::id(),
    //             'date_info' => now(), // Use Laravel helper for current date/time
    //         ]);

    //         // Redirect back with a success message
    //         return redirect()->route('infocom.index')->with('success', 'InfoCom added successfully');
    //     }
    // }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'user_ids' => 'required|array', // Accept an array of user IDs
            'user_ids.*' => 'string', // Accept each user ID as a string
            'residence_id' => 'required|exists:residences,id', // Validate residence ID
        ]);

        $selectedUsers = $validatedData['user_ids'];

        // Check if the 'Send to All Users' option was selected
        if (in_array('all', $selectedUsers)) {
            // Fetch all users linked to the selected residence
            $users = User::where('residence_id', $validatedData['residence_id'])->get();

            // Create an InfoCom for each user in the residence
            foreach ($users as $user) {
                InfoCom::create([
                    'titre' => $validatedData['titre'],
                    'description' => $validatedData['description'],
                    'user_id' => $user->id, // Assign the current user in the loop
                    'residence_id' => $validatedData['residence_id'],
                    'from_id' => Auth::id(), // Use the authenticated user ID
                    'date_info' => now(), // Use Laravel helper for current date/time
                ]);
            }

            // Redirect back with a success message
            return redirect()->back()->with('success', 'InfoCom added for all users successfully');
        } else {
            // Create InfoCom entries for each selected user
            foreach ($selectedUsers as $userId) {
                InfoCom::create([
                    'titre' => $validatedData['titre'],
                    'description' => $validatedData['description'],
                    'user_id' => $userId, // Use the ID from the checkbox selection
                    'residence_id' => $validatedData['residence_id'],
                    'from_id' => Auth::id(), // Use the authenticated user ID
                    'date_info' => now(), // Use Laravel helper for current date/time
                ]);
            }

            // Redirect back with a success message
            return redirect()->back()->with('success', 'InfoCom added successfully');
        }
    }




    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('infocom.index');
    }
}
