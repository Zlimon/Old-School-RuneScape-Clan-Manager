<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Helpers\Helper;

class CreateAccountAuthStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_auth_statuses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->enum('account_type', Helper::listAccountTypes());
            $table->string('username', 13);
            $table->string('code', 8);
            $table->enum('status', ['pending', 'success', 'failed', 'expired']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_auth_statuses');
    }
}
