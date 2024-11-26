<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class AppController extends Controller
{
    public function sobre(){
        $nome = "Laravel";
        $nomes = ["PHP", "COMPOSER", "LARAVEL"];
        return view ('sobre', ['nome'=>$nome, 'nome2'=>$nomes]);

    }
    public function exibirUsuarios(){

        $usuarios = Usuario::all();
       return view('usuarios', ['users'=>$usuarios]);
    }

    public function addUsuario(Request $request) {
        $usuario = new Usuario();
        $usuario->nome = $request->fnome;
        $usuario->email = $request->femail;
        $usuario->password = Hash::make($request->fsenha);
        $usuario->save();
    
        return redirect('/usuarios');
    }
    

    public function editUsuario($id){
        $usuario = Usuario::findOrFail($id);

        return view('editar', ['user' =>$usuario]);

    }

    public function atualizar(Request $request){
        $usuario = Usuario::findOrFail($request->id);
        $dados = [
            'nome' => $request->fnome,
            'email' => $request->femail
        ];
        $usuario->update($dados);
        return redirect('/usuarios');
    }

    public function delUsuario($id){
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return redirect('/usuarios');
    }

    public function mostrarLogin() {
        return view('login'); 
    }

    
    public function logar(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        $usuario = Usuario::where('email', $credentials['email'])->first();
    
        if ($usuario && Hash::check($credentials['password'], $usuario->password)) {

            $request->session()->regenerate();
            return view('dashboard', ['email' => $usuario->email, 'nome' => $usuario->nome ]);
        }
    
        return back()->withErrors([
            'email' => 'As credenciais não são válidas.',
        ]);
    }
    
    
}

