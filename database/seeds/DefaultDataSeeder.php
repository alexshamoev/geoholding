<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DefaultDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this -> call(DefaultPagesStep0 :: class);

        $this -> call([
            DefaultPagesStep0 :: class,
            DefaultBscs :: class,
            DefaultBsws :: class,
            DefaultLanguages :: class,
            DefaultMenuButtonsLinkTypes :: class,
            DefaultMenuButtonsStep0 :: class,
            DefaultMenuButtonsStep1 :: class,
            DefaultModules :: class,
            DefaultModulesIncludesValues :: class,
            DefaultModuleBlocks :: class,
            DefaultModuleSteps :: class,
            DefaultUsers :: class,
            DefaultNewsStep0 :: class,
            DefaultNewsStep1 :: class,
            DefaultNewsStep2 :: class,
            DefaultNewsStep3 :: class,
            DefaultPartnersStep0 :: class,
            DefaultPhotoGalleryStep0 :: class,
            DefaultPhotoGalleryStep1 :: class
        ]);
    }
}
