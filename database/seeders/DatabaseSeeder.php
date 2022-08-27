<?php

namespace Database\Seeders;

use App\Domain\Categories\Categories\DTO\CategoryDTO;
use App\Domain\Categories\CategoryTranslation\DTO\CategoryTranslationDTO;
use App\Domain\Languages\Model\Language;
use App\Domain\Pages\DTO\PageDTO;
use App\Domain\Pages\Model\Page;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $defaultData = json_decode(file_get_contents(database_path('seeders/defaultData.json')), true);

        Language::query()->insert($defaultData['languages']);

        foreach ($defaultData['pages'] as $pageData) {
            $page = new Page(PageDTO::fromRequest($pageData)->toArray());
            $page->save();
            foreach ($pageData['categories'] as $categoryData) {
                $this->handleCategory($categoryData, $page);
            }
        }
    }

    private function handleCategory($categoryData, $belongsTo)
    {
        $category = $belongsTo->categories()->create(array_null_filter(CategoryDTO::fromRequest($categoryData)->toArray()));
        $category->translations()->createMany($categoryData['translations']);
        foreach ($categoryData['categories'] ?? [] as $subCategoryData)
            $this->handleCategory($subCategoryData, $category);
    }
}
