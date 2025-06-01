<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'avatar',
        'nama',
        'jenis_kelamin',
        'nomor_telepon',
        'cabang',
        'position',
        'grade',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('avatar')->nullable();
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('nomor_telepon');
            $table->string('cabang');
            $table->string('position');
            $table->string('grade');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
