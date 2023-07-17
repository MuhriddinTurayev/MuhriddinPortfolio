<?php

namespace Database\Seeders;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
      // qo'lda yaratish
        // Post::create([
        //   'user_id'=>1,
        //   'title'=>'sarlovha',
        //     'short_content'=> 'Qisqa mazmun',
        //     'content'=>'misol content',
        //     'photos' =>  null,
        // ]);

        // Post::create([
        //   'user_id'=>1,
        //   'title'=>'sarlovha',
        //     'short_content'=> 'Qisqa mazmun',
        //     'content'=>'misol content',
        //     'photos' =>  null,
        // ]);


            // malumotlar bazasidagi malumotlarni Qoshadi
        Post::factory()->count(20)->create();
        // malumotlar bazasidagi malumotlarni o'chiradi
        // Post::factory()->count(20)->create();
    }
}
