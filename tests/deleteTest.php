<?php
declare(strict_types=1);

require_once('./src/classes/UserTableWrapper.php');
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;



class DeleteTest extends TestCase
{
    #[DataProvider('provider')]
    public function testDelete(int $id, array $arr, $expected):void
    {
        $users = new UserTableWrapper();
        foreach($arr as $value) {
            $users->insert($value);
        };
        $users->delete($id);
        $a = $users->get();

        $this->assertEquals($expected, $a);
    }

    public static function provider():array
    {
        return [
            'test 1' => [1, [['Oleg', 'Yuliya'], ['Sergey', 'Nataliya']], [['Oleg', 'Yuliya']]],
            'test 2' => [0, [['Oleg', 'Yuliya'], ['Sergey', 'Nataliya']], [1 => ['Sergey', 'Nataliya']]],
        ];
    }
}