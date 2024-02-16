<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        // Crear la tabla "alumno"
        Schema::create('alumno', function (Blueprint $table) {
            $table->unsignedBigInteger('cod_matricula')->unique();
            $table->integer('dni')->unique();
            $table->string('apellidos');
            $table->string('nombres');
            $table->date('fecha_ingreso');
            $table->string('numero_caja');
            $table->text('observaciones')->nullable();
            $table->timestamps();

            $table->primary(['cod_matricula', 'dni']);
        });

        // Crear la tabla "convalidacion"
        Schema::create('convalidacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cod_matricula');
            $table->integer('dni');
            $table->text('resolucion_convalidar')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();
            $table->foreign(['cod_matricula', 'dni'])->references(['cod_matricula', 'dni'])->on('alumno');
        });

        Schema::create('titulo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cod_matricula');
            $table->integer('dni');
            $table->text('resolucion_aprobacion')->nullable();
            $table->text('acta_de_sustentacion')->nullable();
            $table->text('diploma_titulo')->nullable();
            $table->text('acta')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();
            $table->foreign(['cod_matricula', 'dni'])->references(['cod_matricula', 'dni'])->on('alumno');
        });

        // Crear la tabla "maestria"
        Schema::create('maestria', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cod_matricula');
            $table->integer('dni');
            $table->text('resolucion_maestria')->nullable();
            $table->text('diploma_maestria')->nullable();
            $table->text('acta')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();
            $table->foreign(['cod_matricula', 'dni'])->references(['cod_matricula', 'dni'])->on('alumno');
        });

        // Crear la tabla "bachiller"
        Schema::create('bachiller', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cod_matricula');
            $table->integer('dni');
            $table->text('resolucion_bachiller')->nullable();
            $table->text('diploma_bachiller')->nullable();
            $table->text('certificado_estudios')->nullable();
            $table->text('constancia_ingreso')->nullable();
            $table->text('copia_dni')->nullable();
            $table->text('acta')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();
            $table->foreign(['cod_matricula', 'dni'])->references(['cod_matricula', 'dni'])->on('alumno');
        });

        // Crear la tabla "especialidad"
        Schema::create('especialidad', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cod_matricula');
            $table->integer('dni');
            $table->text('resolucion_bachiller')->nullable();
            $table->text('diploma_bachiller')->nullable();
            $table->text('resolucion_especialidad')->nullable();
            $table->text('acta_especialidad')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();
            $table->foreign(['cod_matricula', 'dni'])->references(['cod_matricula', 'dni'])->on('alumno');
        });

        // Crear la tabla "doctorado"
        Schema::create('doctorado', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cod_matricula');
            $table->integer('dni');
            $table->text('acta')->nullable();
            $table->text('resolucion_doctorado')->nullable();
            $table->text('titulo_doctorado')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();
            $table->foreign(['cod_matricula', 'dni'])->references(['cod_matricula', 'dni'])->on('alumno');
        });

        // ...

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
