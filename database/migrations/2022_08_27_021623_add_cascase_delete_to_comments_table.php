<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCascaseDeleteToCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['blog_post_id']);
            $table->foreign('blog_post_id')
                   ->references('id')
                   ->on('blog_posts')
                   ->onDelete('cascade'); // Cascade - 1 bản ghi trong bảng mẹ bị xóa thì bản ghi tương ứng trong bảng con cũng bị xóa
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['blog_post_id']);
            $table->foreign('blog_post_id')
                   ->references('id')
                   ->on('blog_posts');
        });
    }
}
