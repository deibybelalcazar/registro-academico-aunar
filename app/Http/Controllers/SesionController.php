<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SesionController extends Controller {
 public function entrar(Request $request) {
  $data=$request->validate(['email'=>['required','email'],'password'=>['required','string']]);
  if(!Auth::attempt($data)) return back()->withErrors(['email'=>'Credenciales incorrectas.'])->onlyInput('email');
  $request->session()->regenerate(); return redirect()->intended(route('estudiantes.index'));
 }
 public function salir(Request $request) { Auth::logout(); $request->session()->invalidate(); $request->session()->regenerateToken(); return redirect()->route('login'); }
}