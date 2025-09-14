<?php

namespace Database\Seeders;

use App\Models\Category\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Tecnología',
            'Marketing',
            'Ventas',
            'Administración',
            'Recursos Humanos',
            'Finanzas',
            'Diseño',
            'Educación',
            'Salud',
            'Ingeniería',
            'Servicio al Cliente',
            'Logística',
            'Producción',
            'Consultoría',
            'Legal'
        ];

        foreach ($categories as $category) {
            Category::create([
                'nombre' => $category
            ]);
        }
    }
}
