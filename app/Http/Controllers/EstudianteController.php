<?php
namespace App\Http\Controllers;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class EstudianteController extends Controller {
 public function index(Request $request) {
  $q=trim((string)$request->query('q',''));
  $filas=Estudiante::when($q!=='',fn($query)=>$query->where('nombre','like','%'.$q.'%'))->orderByDesc('id')->paginate(10)->withQueryString();
  return view('estudiantes',compact('filas','q')+['editar'=>null]);
 }
 public function store(Request $request) { Estudiante::create($this->datos($request)); return redirect()->route('estudiantes.index')->with('aviso','Registro guardado.'); }
 public function edit(Estudiante $estudiante) { $filas=Estudiante::orderByDesc('id')->paginate(10); return view('estudiantes',['filas'=>$filas,'q'=>'','editar'=>$estudiante]); }
 public function update(Request $request,Estudiante $estudiante) { $estudiante->update($this->datos($request,$estudiante)); return redirect()->route('estudiantes.index')->with('aviso','Registro actualizado.'); }
 public function confirmar(Estudiante $estudiante) { return view('confirmar',compact('estudiante')); }
 public function destroy(Estudiante $estudiante) { $estudiante->delete(); return redirect()->route('estudiantes.index')->with('aviso','Registro eliminado.'); }
 private function datos(Request $request,?Estudiante $estudiante=null):array {
  $unico=Rule::unique('estudiantes','correo'); if($estudiante) $unico->ignore($estudiante);
  return $request->validate(['nombre'=>['required','string','min:2','max:80'],'correo'=>['required','email','max:120',$unico],'edad'=>['required','integer','between:16,100'],'programa'=>['required','string',Rule::in(array_keys(config('programas')))]]);
 }
}