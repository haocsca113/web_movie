<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Laravel\Socialite\Facades\Socialite;
// use Exception;
// use App\Models\User;
// use Illuminate\Support\Facades\Auth;

// class LoginFBController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function index()
//     {
//         //
//     }

//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function create()
//     {
//         //
//     }

//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {
//         //
//     }

//     /**
//      * Display the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function show($id)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function edit($id)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, $id)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy($id)
//     {
//         //
//     }


//     public function redirectToFacebook()
//     {
//         return Socialite::driver('facebook')->redirect();
//     }

//     public function handleFacebookCallback()
//     {
//         try {
        
//             $user = Socialite::driver('facebook')->user();
         
//             $finduser = User::where('email', $user->email)->first();
        
//             if($finduser){
         
//                 Auth::login($finduser);
        
//                 return redirect()->intended('/');
         
//             }else{
//                 $newUser = User::create([
//                     'name' => $user->name,
//                     'email' => $user->email,
//                     'facebook_id'=> $user->id,
//                     'password' => encrypt('123456789')
//                 ]);
        
//                 Auth::login($newUser);
        
//                 return redirect()->intended('/');
//             }
        
//         } catch (Exception $e) {
//             dd($e->getMessage());
//         }
//     }
// }
