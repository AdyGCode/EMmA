<?php

namespace Database\Seeders;

use App\Models\FACategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Symfony\Component\Yaml\Yaml;

class FACategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        FACategory::insert([
            'id'=>1,
            'name' => "unknown",
            'description' => "Unknown Category",
            'created_at' => Carbon::now(),
        ]);

        FACategory::insert([
            'id'=>2,
            'name' => "all",
            'description' => "All Categories",
            'created_at' => Carbon::now(),
        ]);

        FACategory::insert([
            'id'=>3,
            'name' => "brands",
            'description' => "Brands",
            'created_at' => Carbon::now(),
        ]);

        $base = base_path();
        $faPath = $base.'/node_modules/@fortawesome/fontawesome-free/metadata/categories.yml';
        $fileContent = file_get_contents($faPath);
        $yamlContents = Yaml::parse($fileContent);
        foreach ($yamlContents as $key=>$category) {
            FACategory::insert([
                'description' => $category['label'],
                'name' => $key,
                'created_at' => Carbon::now(),
            ]);
        }

    }
}
