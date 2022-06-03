<?php
namespace Database\Seeders;

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
        $this -> call([
            DefaultAdmins::class,
            DefaultPagesStep0::class,
            DefaultPagesStep1::class,
            DefaultBscs::class,
            DefaultBsws::class,
            DefaultLanguages::class,
            DefaultMenuButtonsLinkTypes::class,
            DefaultMenuButtonsStep0::class,
            DefaultMenuButtonsStep1::class,
            DefaultModules::class,
            DefaultModulesIncludesValues::class,
            DefaultModuleBlocks::class,
            DefaultModuleSteps::class,
            DefaultUsers::class,
            DefaultNewsStep0::class,
            DefaultNewsStep1::class,
            DefaultNewsStep2::class,
            DefaultNewsStep3::class,
            DefaultPartnersStep0::class,
            DefaultPhotoGalleryStep0::class,
            DefaultPhotoGalleryStep1::class,
            DefaultProductsStep0::class,
            DefaultProductsStep1::class,
            DefaultProductsStep2::class,
            DefaultProductsStep3::class,
            DefaultProductsStep4::class,
        ]);
    }
}
