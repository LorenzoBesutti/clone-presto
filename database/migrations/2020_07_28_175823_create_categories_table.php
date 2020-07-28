<?php

use App\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

       $categories = ['Motori','Elettrodomestici','Informatica','Sport','Immobili','Arredamento','Abbigliamento','Lavoro','Libri','Giochi'];

       foreach($categories as $category){
           $c = new Category();
           $c->name=$category;
           $c->save();
       }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
