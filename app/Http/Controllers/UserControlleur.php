<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Http\Request;

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
}
