<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\profilRequest;
use Illuminate\Support\Facades\Hash;

class UserControlleur extends Controller
{
    public function afficherlesusers(){
        $users = DB::table('users')->get();
        
        return view('admin/table', ['users' => $users]);
   
       }
    public function changeretat($id){
        //echo $id;
        $user= User::find($id);
        if($user->etat == 1){
            $user->etat=0;
        }
        else{
            $user->etat=1;
            
        }
        $user->save();
        return redirect()->route('tableusers');   
        
        
    }
    public function supprimeuser($id){
        //echo $id;
        DB::table('users')->where('id',$id)->delete();
        return redirect()->route('tableusers');   
        
    }
    public function profil(){
        $id = Auth::id();
        $user= User::find($id);
        return view('admin/modifprofil', ['user' => $user]);
    
    }
    public function modifpass(Request $request){
        //dd($request);
        $id = Auth::id();
        $user= User::find($id);
        $hashedPassword = $user->password;

        if (Hash::check($request->password, $hashedPassword)) {
            //Change the password
            $user->fill([
                'password' => Hash::make($request->passwordn)
            ])->save();

            $request->session()->flash('success', 'votre mot de passe a été changé.');

            return redirect()->route('profil');
        }

        $request->session()->flash('failure', 'Votre mot de passe n\'a pas été modifié.');

        return redirect()->route('profil');

    }

    public function modifprofil(profilRequest $request){
        $id = Auth::id();

        $user= User::find($id);
        $user->name = $request->nom;
        $user->role = $request->role;
        $user->poste = $request->poste;
        $user->tel = $request->tel;
        $user->email = $request->email;
        $user->save();
        
        return redirect()->route('profil')->with('message', 'les informations modifiées avec succes');;   
        
    }
}
