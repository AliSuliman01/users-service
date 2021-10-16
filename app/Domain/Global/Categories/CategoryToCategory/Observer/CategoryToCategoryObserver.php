<?php


namespace App\Domain\Global\Categories\CategoryToCategory\Observer;

use App\Domain\Global\Categories\CategoryToCategory\Model\CategoryToCategory;
use Illuminate\Support\Facades\Auth;


class CategoryToCategoryObserver
{
	  /**
     * Handle the CategoryToCategory "created" event.
     *
     * @param  \App\Domain\Global\Categories\CategoryToCategory\Model\CategoryToCategory  $categoryToCategory
     * @return void
     */
    public function creating(CategoryToCategory $categoryToCategory)
    {
        $categoryToCategory->created_by_user_id = Auth::id();
    }

    /**
     * Handle the CategoryToCategory "updated" event.
     *
     * @param  \App\Domain\Global\Categories\CategoryToCategory\Model\CategoryToCategory  $categoryToCategory
     * @return void
     */
    public function updating(CategoryToCategory $categoryToCategory)
    {
        $categoryToCategory->updated_by_user_id = Auth::id();
    }

    /**
     * Handle the CategoryToCategory "deleted" event.
     *
     * @param  \App\Domain\Global\Categories\CategoryToCategory\Model\CategoryToCategory  $categoryToCategory
     * @return void
     */
    public function deleting(CategoryToCategory $categoryToCategory)
    {
        $categoryToCategory->deleted_by_user_id = Auth::id();
    }

    /**
     * Handle the CategoryToCategory "restored" event.
     *
     * @param  \App\Domain\Global\Categories\CategoryToCategory\Model\CategoryToCategory  $categoryToCategory
     * @return void
     */
    public function restored(CategoryToCategory $categoryToCategory)
    {
        //
    }

    /**
     * Handle the CategoryToCategory "force deleted" event.
     *
     * @param  \App\Domain\Global\Categories\CategoryToCategory\Model\CategoryToCategory  $categoryToCategory
     * @return void
     */
    public function forceDeleted(CategoryToCategory $categoryToCategory)
    {
        //
    }
}
