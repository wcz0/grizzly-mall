<?php

namespace Database\Seeders;

use App\Models\StoreProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StoreProductCategory::insert([
            ['id' =>1 ,'parent_id' => 0, 'name' => '手机数码', 'sort' => 99, 'icon' => '', 'is_show' => 1, 'picture'=> ''],
            ['id' =>2 ,'parent_id' => 0, 'name' => '电脑办公', 'sort' => 88, 'icon' => '', 'is_show' => 1, 'picture'=> ''],
            ['id' =>3 ,'parent_id' => 0, 'name' => '日常用品', 'sort' => 77, 'icon' => '', 'is_show' => 1, 'picture'=> ''],
            ['id' =>4 ,'parent_id' => 0, 'name' => '户外运动', 'sort' => 66, 'icon' => '', 'is_show' => 1, 'picture'=> ''],
            ['id' =>5 ,'parent_id' => 0, 'name' => '家电电器', 'sort' => 55, 'icon' => '', 'is_show' => 1, 'picture'=> ''],
            ['id' =>6 ,'parent_id' => 0, 'name' => '手表首饰', 'sort' => 44, 'icon' => '', 'is_show' => 1, 'picture'=> ''],
            ['id' =>7 ,'parent_id' => 0, 'name' => '美妆个护', 'sort' => 33, 'icon' => '', 'is_show' => 1, 'picture'=> ''],
            ['id' =>8 ,'parent_id' => 0, 'name' => '服饰鞋包', 'sort' => 22, 'icon' => '', 'is_show' => 1, 'picture'=> ''],
            ['id' =>9 ,'parent_id' => 1, 'name' => '智能手机', 'sort' => 9, 'icon' => 'http://crmeb.wcz/uploads/attach/2023/02/20230213/3e1e810aad648bd4449b3a01d738a52a.jpg', 'is_show' => 1, 'picture'=> ''],
            ['id' =>10 ,'parent_id' => 1, 'name' => '影音周边', 'sort' => 8, 'icon' => 'http://crmeb.wcz/uploads/attach/2023/02/20230213/75b6b32021bc79734ceb90f0be0b2c14.jpg', 'is_show' => 1, 'picture'=> ''],
            ['id' =>11 ,'parent_id' => 1, 'name' => '穿戴设备', 'sort' => 7, 'icon' => 'http://crmeb.wcz/uploads/attach/2023/02/20230213/faf3251353c2de5cf6b1113f9550eea6.jpg', 'is_show' => 1, 'picture'=> ''],
            ['id' =>12 ,'parent_id' => 1, 'name' => '手机配件', 'sort' => 6, 'icon' => 'http://crmeb.wcz/uploads/attach/2023/02/20230213/f9c81ca764bcccc2fc5ecde9d411824e.jpg', 'is_show' => 1, 'picture'=> ''],
            ['id' =>13 ,'parent_id' => 1, 'name' => '平板电脑', 'sort' => 5, 'icon' => 'http://crmeb.wcz/uploads/attach/2023/02/20230213/3e1e810aad648bd4449b3a01d738a52a.jpg', 'is_show' => 1, 'picture'=> ''],
            ['id' =>14 ,'parent_id' => 1, 'name' => '电脑配件', 'sort' => 4, 'icon' => 'http://crmeb.wcz/uploads/attach/2023/02/20230213/75b6b32021bc79734ceb90f0be0b2c14.jpg', 'is_show' => 1, 'picture'=> ''],
            ['id' =>15 ,'parent_id' => 2, 'name' => '笔记本', 'sort' => 3, 'icon' => 'http://crmeb.wcz/uploads/attach/2023/02/20230213/faf3251353c2de5cf6b1113f9550eea6.jpg', 'is_show' => 1, 'picture'=> ''],
            ['id' =>16 ,'parent_id' => 2, 'name' => '台式机', 'sort' => 2, 'icon' => 'http://crmeb.wcz/uploads/attach/2023/02/20230213/f9c81ca764bcccc2fc5ecde9d411824e.jpg', 'is_show' => 1, 'picture'=> ''],
            ['id' =>17 ,'parent_id' => 2, 'name' => '游戏机', 'sort' => 1, 'icon' => 'http://crmeb.wcz/uploads/attach/2023/02/20230213/3e1e810aad648bd4449b3a01d738a52a.jpg', 'is_show' => 1, 'picture'=> ''],
            ['id' =>18 ,'parent_id' => 3, 'name' => '工具', 'sort' => 9, 'icon' => 'http://crmeb.wcz/uploads/attach/2023/02/20230213/75b6b32021bc79734ceb90f0be0b2c14.jpg', 'is_show' => 1, 'picture'=> ''],
            ['id' =>19 ,'parent_id' => 3, 'name' => '清洁', 'sort' => 8, 'icon' => 'http://crmeb.wcz/uploads/attach/2023/02/20230213/faf3251353c2de5cf6b1113f9550eea6.jpg', 'is_show' => 1, 'picture'=> ''],
            ['id' =>20 ,'parent_id' => 3, 'name' => '杂货', 'sort' => 7, 'icon' => 'http://crmeb.wcz/uploads/attach/2023/02/20230213/f9c81ca764bcccc2fc5ecde9d411824e.jpg', 'is_show' => 1, 'picture'=> ''],
            ['id' =>21 ,'parent_id' => 4, 'name' => '健身器材', 'sort' => 6, 'icon' => 'http://crmeb.wcz/uploads/attach/2023/02/20230213/3e1e810aad648bd4449b3a01d738a52a.jpg', 'is_show' => 1, 'picture'=> ''],
            ['id' =>22 ,'parent_id' => 4, 'name' => '户外装备', 'sort' => 5, 'icon' => 'http://crmeb.wcz/uploads/attach/2023/02/20230213/75b6b32021bc79734ceb90f0be0b2c14.jpg', 'is_show' => 1, 'picture'=> ''],
            ['id' =>23 ,'parent_id' => 4, 'name' => '体育用品', 'sort' => 4, 'icon' => 'http://crmeb.wcz/uploads/attach/2023/02/20230213/faf3251353c2de5cf6b1113f9550eea6.jpg', 'is_show' => 1, 'picture'=> ''],
            ['id' =>24 ,'parent_id' => 5, 'name' => '大电器', 'sort' => 3, 'icon' => 'http://crmeb.wcz/uploads/attach/2023/02/20230213/f9c81ca764bcccc2fc5ecde9d411824e.jpg', 'is_show' => 1, 'picture'=> ''],
            ['id' =>25 ,'parent_id' => 5, 'name' => '小家电', 'sort' => 2, 'icon' => 'http://crmeb.wcz/uploads/attach/2023/02/20230213/3e1e810aad648bd4449b3a01d738a52a.jpg', 'is_show' => 1, 'picture'=> ''],
            ['id' =>26 ,'parent_id' => 5, 'name' => '智能家具', 'sort' => 1, 'icon' => 'http://crmeb.wcz/uploads/attach/2023/02/20230213/75b6b32021bc79734ceb90f0be0b2c14.jpg', 'is_show' => 1, 'picture'=> ''],
            ['id' =>27 ,'parent_id' => 6, 'name' => '手表', 'sort' => 9, 'icon' => 'http://crmeb.wcz/uploads/attach/2023/02/20230213/faf3251353c2de5cf6b1113f9550eea6.jpg', 'is_show' => 1, 'picture'=> ''],
            ['id' =>28 ,'parent_id' => 6, 'name' => '饰品', 'sort' => 8, 'icon' => 'http://crmeb.wcz/uploads/attach/2023/02/20230213/f9c81ca764bcccc2fc5ecde9d411824e.jpg', 'is_show' => 1, 'picture'=> ''],
            ['id' =>29 ,'parent_id' => 6, 'name' => '首饰', 'sort' => 7, 'icon' => 'http://crmeb.wcz/uploads/attach/2023/02/20230213/3e1e810aad648bd4449b3a01d738a52a.jpg', 'is_show' => 1, 'picture'=> ''],
            ['id' =>30 ,'parent_id' => 7, 'name' => '化妆品', 'sort' => 6, 'icon' => 'http://crmeb.wcz/uploads/attach/2023/02/20230213/75b6b32021bc79734ceb90f0be0b2c14.jpg', 'is_show' => 1, 'picture'=> ''],
            ['id' =>31 ,'parent_id' => 7, 'name' => '护肤品', 'sort' => 5, 'icon' => 'http://crmeb.wcz/uploads/attach/2023/02/20230213/faf3251353c2de5cf6b1113f9550eea6.jpg', 'is_show' => 1, 'picture'=> ''],
            ['id' =>32 ,'parent_id' => 7, 'name' => '清洁用品', 'sort' => 4, 'icon' => 'http://crmeb.wcz/uploads/attach/2023/02/20230213/f9c81ca764bcccc2fc5ecde9d411824e.jpg', 'is_show' => 1, 'picture'=> ''],
            ['id' =>33 ,'parent_id' => 8, 'name' => '服饰', 'sort' => 3, 'icon' => 'http://crmeb.wcz/uploads/attach/2023/02/20230213/3e1e810aad648bd4449b3a01d738a52a.jpg', 'is_show' => 1, 'picture'=> ''],
            ['id' =>34 ,'parent_id' => 8, 'name' => '箱包', 'sort' => 2, 'icon' => 'http://crmeb.wcz/uploads/attach/2023/02/20230213/75b6b32021bc79734ceb90f0be0b2c14.jpg', 'is_show' => 1, 'picture'=> ''],
            ['id' =>35 ,'parent_id' => 8, 'name' => '鞋子', 'sort' => 1, 'icon' => 'http://crmeb.wcz/uploads/attach/2023/02/20230213/faf3251353c2de5cf6b1113f9550eea6.jpg', 'is_show' => 1, 'picture'=> ''],
        ]);
    }

// 1	0	手机数码	99		1
// 2	0	电脑办公	88		1
// 3	0	日常用品	77		1
// 4	0	户外运动	66		1
// 5	0	家电电器	55		1
// 6	0	手表首饰	44		1
// 7	0	美妆个护	33		1
// 8	0	服饰鞋包	22		1
// 10	1	智能手机	9	http://crmeb.wcz/uploads/attach/2023/02/20230213/3e1e810aad648bd4449b3a01d738a52a.jpg	1
// 12	1	影音周边	8	http://crmeb.wcz/uploads/attach/2023/02/20230213/75b6b32021bc79734ceb90f0be0b2c14.jpg	1
// 13	1	穿戴设备	7	http://crmeb.wcz/uploads/attach/2023/02/20230213/faf3251353c2de5cf6b1113f9550eea6.jpg	1
// 15	1	手机配件	6	http://crmeb.wcz/uploads/attach/2023/02/20230213/f9c81ca764bcccc2fc5ecde9d411824e.jpg	1
// 16	1	平板电脑	5	http://crmeb.wcz/uploads/attach/2023/02/20230213/23fbc5512b9bc9f8b2cd22065dbe3a57.jpg	1
// 17	1	折叠手机	3	http://crmeb.wcz/uploads/attach/2023/02/20230213/01c69f26a1f0347316be619dabc8d9eb.jpg	1
// 18	2	笔记本	9	http://crmeb.wcz/uploads/attach/2023/02/20230213/adb54a4da6288f89722872d54ff4994e.jpg	1
// 19	2	台式机	7	http://crmeb.wcz/uploads/attach/2023/02/20230213/1759437a06bd9d54b3c2c09336d25f44.jpg	1
// 20	2	游戏机	5	http://crmeb.wcz/uploads/attach/2023/02/20230213/e1b434ef85145430b8bd1a93528c1e26.jpg	1
// 22	3	工具	9	http://crmeb.wcz/uploads/attach/2023/02/20230213/99f7775c5c34da1fac55cd80504ec0d8.jpg	1
// 23	3	清洁	8	http://crmeb.wcz/uploads/attach/2023/02/20230213/f661601e3828cf926275b6743e6cd815.jpg	1
// 24	3	杂货	7	http://crmeb.wcz/uploads/attach/2023/02/20230213/6884c812a8fe9ef1af4679a3831b2d51.jpg	1
// 25	4	健身器械	9	http://crmeb.wcz/uploads/attach/2023/02/20230213/b5adf91569e82e49be720f2f70238ea1.jpg	1
// 26	4	户外装备	8	http://crmeb.wcz/uploads/attach/2023/02/20230213/5aea4687e62d39793ba63161eacf6661.jpg	1
// 27	4	体育用品	7	http://crmeb.wcz/uploads/attach/2023/02/20230213/c44d24da0b728b4aaee6cd4c8aed92c0.jpg	1
// 28	5	大电器	9	http://crmeb.wcz/uploads/attach/2023/02/20230213/10801cb0049c2d8fb34754ef7c1ce54f.jpg	1
// 29	5	小家电	8	http://crmeb.wcz/uploads/attach/2023/02/20230213/542267cb5f660e19c6647a71913c5624.jpg	1
// 30	5	智能家居	6	http://crmeb.wcz/uploads/attach/2023/02/20230213/c88965f2844d7b68f3b25aa598dc7dec.jpg	1
// 31	6	手表	9	http://crmeb.wcz/uploads/attach/2023/02/20230213/a70f32ce8df0c0a73ea82a7a7da11c3b.jpg	1
// 32	6	饰品	8	http://crmeb.wcz/uploads/attach/2023/02/20230213/a7cfed80049c0d051988da434d5553b6.jpg	1
// 34	6	首饰	6	http://crmeb.wcz/uploads/attach/2023/02/20230213/895d5edf7eaf8d0f2c69fc34f30749e3.jpg	1
// 35	7	化妆品	9	http://crmeb.wcz/uploads/attach/2023/02/20230213/080bad1fc75b2c68abf8f55eb6560608.jpg	1
// 36	7	护肤品	8	http://crmeb.wcz/uploads/attach/2023/02/20230213/5a9b500b393066f1322603456f142a2a.jpg	1
// 37	7	清洁用品	0	http://crmeb.wcz/uploads/attach/2023/02/20230213/b9be2305fef6a3ce47792d624926c952.jpg	1
// 38	8	服饰	9	http://crmeb.wcz/uploads/attach/2023/02/20230213/afebd475d8c9c75ec8661504abf1c3b8.jpg	1
// 39	8	箱包	8	http://crmeb.wcz/uploads/attach/2023/02/20230213/2bccb77e23f60bd993f80895f7e278d7.jpg	1
// 40	8	鞋子	6	http://crmeb.wcz/uploads/attach/2023/02/20230213/68a662d8f1d0869337ca98ecd2befe55.jpg	1
}
