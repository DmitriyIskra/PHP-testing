<?php
declare(strict_types=1);

require_once('./src/classes/UserTableWrapper.php');
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;



class UpdateTest extends TestCase
{
    #[DataProvider('provider')]
    public function testUpdate(int $id, array $arr, array $newValue, $expected):void
    {
        $users = new UserTableWrapper();
        foreach($arr as $value) {
            $users->insert($value);
        }
        $a = $users->update($id, $newValue);

        $this->assertEquals($expected, $a);
    }

    public static function provider():array
    {
        return [
            'test 1' => [0, [['Oleg', 'Yuliya']], ['Oleg', 'Aleksandra'], [0 => ['Oleg', 'Aleksandra']]],
            'test 2' => [1, [['Oleg', 'Yuliya'], ['Oleg', 'Yuliya']], ['Tatiyana', 'Aleksandra'], [['Oleg', 'Yuliya'], ['Tatiyana', 'Aleksandra']]],
        ];
    }
}