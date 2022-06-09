<?php
   
namespace App\Http\Controllers;
   
use App\Http\Controllers\Controller;
use App\Models\User;
use Socialite;
use Auth;
use Exception;
   
class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
       
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleCallback()
    {
        try {
     
            $user = Socialite::driver('google')->user();
            $finduser = User::where('social_id', $user->id)->first();
      
            if($finduser){
                Auth::login($finduser);
     
                return redirect('/ge/cabinet');
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id'=> $user->id,
                    'social_type'=> 'google',
                    'password' => encrypt('my-google'),
                    'email_verified_at' => date("Y-m-d H:i:s", strtotime('+4 hours')),
                ]);
     
                Auth::login($newUser);
      
                return redirect('/ge/cabinet');
            }
     
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}