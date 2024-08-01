<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Entity;
use App\Models\ApiConnector;
use App\Models\Category;

class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $conector = new ApiConnector();
        $data = $conector->fetchData();
        $filteredEntries = array_filter($data['entries'], function ($entry) {
            return in_array($entry['Category'], ['Animals', 'Security']);
        });
        foreach ($filteredEntries as $entry) {
            $category_id = Category::where('category', $entry['Category'])->first()->id;
            Entity::firstOrCreate(
                ['api' => $entry['API']],
                [
                    'description' => $entry['Description'],
                    'link' => $entry['Link'],
                    'category_id' => $category_id,
                ]
            );
        }
    }
}
