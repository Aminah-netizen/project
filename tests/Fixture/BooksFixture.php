<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BooksFixture
 */
class BooksFixture extends TestFixture
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
                'title' => 'Lorem ipsum dolor sit amet',
                'author' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'created' => '2024-12-02 09:05:13',
                'modified' => '2024-12-02 09:05:13',
            ],
        ];
        parent::init();
    }
}
