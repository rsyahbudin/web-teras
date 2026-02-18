<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('galleries', function (Blueprint $table) {
            $table->foreignId('gallery_category_id')->nullable()->after('id')->constrained('gallery_categories')->nullOnDelete();
        });

        // Migrate existing data
        $galleries = DB::table('galleries')->whereNotNull('category')->get();
        foreach ($galleries as $gallery) {
            if ($gallery->category) {
                // Find or create category
                $categoryId = DB::table('gallery_categories')->where('name', $gallery->category)->value('id');
                
                if (!$categoryId) {
                    $slug = \Illuminate\Support\Str::slug($gallery->category);
                    $categoryId = DB::table('gallery_categories')->insertGetId([
                        'name' => $gallery->category,
                        'slug' => $slug,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }

                DB::table('galleries')->where('id', $gallery->id)->update(['gallery_category_id' => $categoryId]);
            }
        }

        Schema::table('galleries', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('galleries', function (Blueprint $table) {
            $table->string('category')->nullable()->after('title');
        });

        // Restore data
        $galleries = DB::table('galleries')->whereNotNull('gallery_category_id')->get();
        foreach ($galleries as $gallery) {
             $categoryName = DB::table('gallery_categories')->where('id', $gallery->gallery_category_id)->value('name');
             if ($categoryName) {
                 DB::table('galleries')->where('id', $gallery->id)->update(['category' => $categoryName]);
             }
        }

        Schema::table('galleries', function (Blueprint $table) {
            $table->dropForeign(['gallery_category_id']);
            $table->dropColumn('gallery_category_id');
        });
    }
};
