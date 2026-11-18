<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use RuntimeException;
class DocenteSeeder extends Seeder {
 public function run():void {
  $email=env('DOCENTE_EMAIL'); $clave=env('DOCENTE_CLAVE');
  if(!$email||!$clave) throw new RuntimeException('Define DOCENTE_EMAIL y DOCENTE_CLAVE en .env local.');
  User::firstOrCreate(['email'=>$email],['name'=>'Docente','password'=>Hash::make($clave)]);
 }
}