<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'ck_settings_id',
        'first_name',
        'last_name',
        'gender',
        'address',
        'position',
        'avatar', // Jika kolom avatar sudah ditambahkan
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
            $table->string('jabatan');
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
