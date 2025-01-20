<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RecipesFixture
 */
class RecipesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'users_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'photo' => 'Lorem ipsum dolor sit amet',
                'photo_dir' => 'Lorem ipsum dolor sit amet',
                'photo2' => 'Lorem ipsum dolor sit amet',
                'photo2_dir' => 'Lorem ipsum dolor sit amet',
                'photo3' => 'Lorem ipsum dolor sit amet',
                'photo3_dir' => 'Lorem ipsum dolor sit amet',
                'photo4' => 'Lorem ipsum dolor sit amet',
                'photo4_dir' => 'Lorem ipsum dolor sit amet',
                'ingredient' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'step' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'category_id' => 1,
                'status' => 1,
                'created' => '2024-12-15 17:55:07',
                'modified' => '2024-12-15 17:55:07',
            ],
        ];
        parent::init();
    }
}
