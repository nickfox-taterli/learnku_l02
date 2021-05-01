<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// 要记得引入,不然不知User为何物.
use App\Models\User;

//先有了数据工厂UserFactory.php,再有这个指导创建多少个数据(即循环多少次数据工厂),最后要在DatabaseSeeder.php引入,最后才有效.
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 生成100条数据
        User::factory()->count(100)->create();

        // 单独处理第一个用户的数据(修改里面得部分参数)
        $user = User::find(1);
        $user->name = 'TaterLi';
        $user->email = 'admin@taterli.com';
        $user->avatar = 'https://cdn.learnku.com/uploads/images/201710/14/1/ZqM7iaP4CR.png';
        $user->save();
    }
}
