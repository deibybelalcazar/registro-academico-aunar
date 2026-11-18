<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up():void {
  Schema::create('estudiantes',function(Blueprint $table){$table->id();$table->string('nombre',80);$table->string('correo',120)->unique();$table->integer('edad');$table->string('programa',80);$table->timestamps();});
  if(DB::getDriverName()==='mysql') DB::statement('ALTER TABLE estudiantes ADD CONSTRAINT estudiantes_edad_check CHECK (edad BETWEEN 16 AND 100)');
 }
 public function down():void { Schema::dropIfExists('estudiantes'); }
};