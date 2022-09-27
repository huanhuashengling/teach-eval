<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $role1 = Role::findByName('writer');
        $userData = [
        ['name' => '蔡月梦', 'sex' => '0', 'is_formal' => '0', 'is_member' => '1', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '15874146453'],
        ['name' => '曹静', 'sex' => '1', 'is_formal' => '0', 'is_member' => '0', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '15973150787'],
        ['name' => '陈锋', 'sex' => '0', 'is_formal' => '1', 'is_member' => '1', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '15717504211'],
        ['name' => '陈晖', 'sex' => '0', 'is_formal' => '1', 'is_member' => '1', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '17708445051'],
        ['name' => '陈薇', 'sex' => '0', 'is_formal' => '1', 'is_member' => '1', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '13974869431'],
        ['name' => '陈喜', 'sex' => '0', 'is_formal' => '0', 'is_member' => '0', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '18508428533'],
        ['name' => '陈宇燕', 'sex' => '0', 'is_formal' => '0', 'is_member' => '0', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '18975343912'],
        ['name' => '邓上', 'sex' => '1', 'is_formal' => '1', 'is_member' => '1', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '18975863311'],
        ['name' => '邓勇', 'sex' => '0', 'is_formal' => '1', 'is_member' => '0', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '18229875158'],
        ['name' => '范烨', 'sex' => '0', 'is_formal' => '0', 'is_member' => '0', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '17773194667'],
        ['name' => '扶文达', 'sex' => '0', 'is_formal' => '0', 'is_member' => '0', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '15197398692'],
        ['name' => '高浓香', 'sex' => '0', 'is_formal' => '1', 'is_member' => '1', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '18073117821'],
        ['name' => '谷裕', 'sex' => '0', 'is_formal' => '1', 'is_member' => '1', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '13142081935'],
        ['name' => '何丰', 'sex' => '0', 'is_formal' => '1', 'is_member' => '1', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '13723853096'],
        ['name' => '黄秋爽', 'sex' => '0', 'is_formal' => '1', 'is_member' => '1', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '15116338221'],
        ['name' => '黄瑞蓉', 'sex' => '0', 'is_formal' => '1', 'is_member' => '0', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '13786125099'],
        ['name' => '胡金滔', 'sex' => '0', 'is_formal' => '0', 'is_member' => '1', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '15673148993'],
        ['name' => '刘骢', 'sex' => '0', 'is_formal' => '0', 'is_member' => '0', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '15084919369'],
        ['name' => '刘芳', 'sex' => '0', 'is_formal' => '0', 'is_member' => '0', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '18229747567'],
        ['name' => '柳威', 'sex' => '0', 'is_formal' => '1', 'is_member' => '0', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '18874198042'],
        ['name' => '李文科', 'sex' => '0', 'is_formal' => '1', 'is_member' => '1', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '15873049522'],
        ['name' => '李萱', 'sex' => '0', 'is_formal' => '0', 'is_member' => '0', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '18570745856'],
        ['name' => '罗晶莹', 'sex' => '0', 'is_formal' => '0', 'is_member' => '0', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '19973815399'],
        ['name' => '聂红', 'sex' => '0', 'is_formal' => '0', 'is_member' => '0', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '13973146063'],
        ['name' => '彭恋海', 'sex' => '0', 'is_formal' => '1', 'is_member' => '1', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '19174103993'],
        ['name' => '彭莉乔', 'sex' => '0', 'is_formal' => '1', 'is_member' => '1', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '15308498999'],
        ['name' => '彭妙', 'sex' => '0', 'is_formal' => '1', 'is_member' => '0', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '18163633927'],
        ['name' => '石素莲', 'sex' => '0', 'is_formal' => '0', 'is_member' => '0', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '18573154259'],
        ['name' => '石彰明', 'sex' => '0', 'is_formal' => '0', 'is_member' => '1', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '18073103163'],
        ['name' => '苏梦俊', 'sex' => '0', 'is_formal' => '0', 'is_member' => '0', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '18508460524'],
        ['name' => '唐剑平', 'sex' => '0', 'is_formal' => '1', 'is_member' => '0', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '13027312040'],
        ['name' => '谭旭', 'sex' => '0', 'is_formal' => '1', 'is_member' => '0', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '15084822543'],
        ['name' => '王蓉', 'sex' => '0', 'is_formal' => '1', 'is_member' => '1', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '18373116914'],
        ['name' => '万婕妤', 'sex' => '0', 'is_formal' => '0', 'is_member' => '0', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '13272409423'],
        ['name' => '吴昕蔚', 'sex' => '0', 'is_formal' => '0', 'is_member' => '1', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '13507479202'],
        ['name' => '吴沅迪', 'sex' => '0', 'is_formal' => '0', 'is_member' => '0', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '19918945740'],
        ['name' => '肖琼', 'sex' => '0', 'is_formal' => '1', 'is_member' => '1', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '15243653690'],
        ['name' => '熊思洁', 'sex' => '0', 'is_formal' => '0', 'is_member' => '1', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '15608407470'],
        ['name' => '杨艳兰', 'sex' => '0', 'is_formal' => '1', 'is_member' => '1', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '15573168557'],
        ['name' => '杨欢', 'sex' => '0', 'is_formal' => '1', 'is_member' => '0', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '18274851202'],
        ['name' => '谢祺', 'sex' => '0', 'is_formal' => '0', 'is_member' => '0', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '19173906477'],
        ['name' => '尤文杰', 'sex' => '0', 'is_formal' => '1', 'is_member' => '1', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '18073100720'],
        ['name' => '张博', 'sex' => '0', 'is_formal' => '1', 'is_member' => '0', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '18229888317'],
        ['name' => '张宏雨', 'sex' => '0', 'is_formal' => '1', 'is_member' => '0', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '18569575662'],
        ['name' => '张芸莉', 'sex' => '0', 'is_formal' => '1', 'is_member' => '1', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '15273503792'],
        ['name' => '周冰心', 'sex' => '0', 'is_formal' => '1', 'is_member' => '1', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '18163622157'],
        ['name' => '周雅昕', 'sex' => '0', 'is_formal' => '1', 'is_member' => '1', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '18674859969'],
        ['name' => '朱安妮', 'sex' => '0', 'is_formal' => '1', 'is_member' => '0', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '18874439157'],
        ['name' => '朱月平', 'sex' => '0', 'is_formal' => '1', 'is_member' => '1', 'is_working' => '1', 'order' => '1', 'schools_id' => '1', 'phone' => '15575958055'],];

        foreach ($userData as $data) {
            $user = User::factory()->create(['name' => $data['name'], 'sex' => $data['sex'], 'is_member' => $data['is_member'], 'is_working' => $data['is_working'], 'is_formal' => $data['is_formal'], 'schools_id' => $data['schools_id'], 'phone' => $data['phone'], 'order' => $data['order'], 'password' => Hash::make('password'),]);
            $user->assignRole($role1);  
        }
        
/**
        $user = User::factory()->create(['name' => '蔡月梦', sex => '0', 'is_member' => '0', is_working => '1', phone' => '15874146453', 'password' => Hash::make('password'),];
        User::factory()->create(['name' => '陈锋', sex => '0', is_member => '0', is_working => '1', phone' => '15717504211', 'password' => Hash::make('password'),]);
        User::factory()->create(['name' => '陈晖', sex => '0', is_member => '0', is_working => '1', phone' => '17708445051', 'password' => Hash::make('password'),]);
        User::factory()->create(['name' => '陈薇', sex => '0', is_member => '0', is_working => '1', phone' => '13974869431', 'password' => Hash::make('password'),]);
        User::factory()->create(['name' => '陈喜', sex => '0', is_member => '0', is_working => '1', phone' => '18508428533', 'password' => Hash::make('password'),]);
        User::factory()->create(['name' => '陈宇燕', sex => '0', is_member => '0', is_working => '1', phone' => '18975343912', 'password' => Hash::make('password'),]);
        User::factory()->create(['name' => '邓上', sex => '0', is_member => '0', is_working => '1', phone' => '18975863311', 'password' => Hash::make('password'),]);
        User::factory()->create(['name' => '范烨', sex => '0', is_member => '0', is_working => '1', phone' => '17773194667', 'password' => Hash::make('password'),]);
        User::factory()->create(['name' => '扶文达', sex => '0', is_member => '0', is_working => '1', phone' => '15197398692', 'password' => Hash::make('password'),]);
        User::factory()->create(['name' => '高浓香', sex => '0', is_member => '0', is_working => '1', phone' => '18073117821', 'password' => Hash::make('password'),]);
        User::factory()->create(['name' => '谷裕', sex => '0', is_member => '0', is_working => '1', phone' => '13142081935', 'password' => Hash::make('password'),]);
        User::factory()->create(['name' => '何丰', sex => '0', is_member => '0', is_working => '1', phone' => '13723853096', 'password' => Hash::make('password'),]);
        User::factory()->create(['name' => '胡金滔', sex => '0', is_member => '0', is_working => '1', phone' => '15673148993', 'password' => Hash::make('password'),]);
        User::factory()->create(['name' => '刘郴', sex => '0', is_member => '0', is_working => '1', phone' => '16670116025', 'password' => Hash::make('password'),]);
        User::factory()->create(['name' => '柳威', sex => '0', is_member => '0', is_working => '1', phone' => '18874198042', 'password' => Hash::make('password'),]);
        User::factory()->create(['name' => '李文科', sex => '0', is_member => '0', is_working => '1', phone' => '15873049522', 'password' => Hash::make('password'),]);
        User::factory()->create(['name' => '李萱', sex => '0', is_member => '0', is_working => '1', phone' => '18570745856', 'password' => Hash::make('password'),]);
        User::factory()->create(['name' => '聂红', sex => '0', is_member => '0', is_working => '1', phone' => '13973146063', 'password' => Hash::make('password'),]);
        User::factory()->create(['name' => '彭莉乔', sex => '0', is_member => '0', is_working => '1', phone' => '15308498999', 'password' => Hash::make('password'),]);
        User::factory()->create(['name' => '彭妙', sex => '0', is_member => '0', is_working => '1', phone' => '18163633927', 'password' => Hash::make('password'),]);
        User::factory()->create(['name' => '石素莲', sex => '0', is_member => '0', is_working => '1', phone' => '18573154259', 'password' => Hash::make('password'),]);
        User::factory()->create(['name' => '唐剑平', sex => '0', is_member => '0', is_working => '1', phone' => '13027312040', 'password' => Hash::make('password'),]);
        User::factory()->create(['name' => '王蓉', sex => '0', is_member => '0', is_working => '1', phone' => '18373116914', 'password' => Hash::make('password'),]);
        User::factory()->create(['name' => '万婕妤', sex => '0', is_member => '0', is_working => '1', phone' => '13272409423', 'password' => Hash::make('password'),]);
        User::factory()->create(['name' => '吴沅迪', sex => '0', is_member => '0', is_working => '1', phone' => '19918945740', 'password' => Hash::make('password'),]);
        User::factory()->create(['name' => '肖琼', sex => '0', is_member => '0', is_working => '1', phone' => '15243653690', 'password' => Hash::make('password'),]);
        User::factory()->create(['name' => '熊思洁', sex => '0', is_member => '0', is_working => '1', phone' => '15608407470', 'password' => Hash::make('password'),]);
        User::factory()->create(['name' => '杨艳兰', sex => '0', is_member => '0', is_working => '1', phone' => '15573168557', 'password' => Hash::make('password'),]);
        User::factory()->create(['name' => '尹思婕', sex => '0', is_member => '0', is_working => '1', phone' => '19173906477', 'password' => Hash::make('password'),]);
        User::factory()->create(['name' => '尤文杰', sex => '0', is_member => '0', is_working => '1', phone' => '18073100720', 'password' => Hash::make('password'),]);
        User::factory()->create(['name' => '张博', sex => '0', is_member => '0', is_working => '1', phone' => '18229888317', 'password' => Hash::make('password'),]);
        User::factory()->create(['name' => '张芸莉', sex => '0', is_member => '0', is_working => '1', phone' => '15273503792', 'password' => Hash::make('password'),]);
        User::factory()->create(['name' => '周冰心', sex => '0', is_member => '0', is_working => '1', phone' => '18163622157', 'password' => Hash::make('password'),]);
        User::factory()->create(['name' => '周雅昕', sex => '0', is_member => '0', is_working => '1', phone' => '18674859969', 'password' => Hash::make('password'),]);
        User::factory()->create(['name' => '朱月平', sex => '0', is_member => '0', is_working => '1', phone' => '15575958055', 'password' => Hash::make('password'),]);
        */
    }
}
