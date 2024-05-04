<?php
declare(strict_types=1);

require_once('./src/classes/UserTableWrapper.php');
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;



class InsertTest extends TestCase
{
    #[DataProvider('provider')]
    public function testInsert(array $arr, $expected):void
    {
        $users = new UserTableWrapper();
        foreach($arr as $value) {
            $users->insert($value);
        }

        $a = $users->get();
        $this->assertEquals($expected, $a);
    }

    public static function provider():array
    {
        return [
            'test 1' => [[['Oleg', 'Dmtriy']], [['Oleg', 'Dmtriy']]],
            'test 2' => [[['Oleg', 'Dmtriy'], ['Mihail', 'Dmtriy']], [['Oleg', 'Dmtriy'], ['Mihail', 'Dmtriy']]],
        ];
    }
}