<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'Food' => 'Comida y gastronomía',  
            'Sports' => 'Eventos y actividades deportivas',  
            'Hardware' => 'Componentes y dispositivos físicos',  
            'Software' => 'Programas y aplicaciones',  
            'Films' => 'Películas y cine'  
        ];
        
        foreach($tags as $name=>$description){
            Tag::create(compact('name', 'description'));
        }
    }
}
