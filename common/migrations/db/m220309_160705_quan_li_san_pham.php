<?php

use yii\db\Migration;

/**
 * Class m220309_160705_quan_li_san_pham
 */
class m220309_160705_quan_li_san_pham extends Migration
{
    /**
     * @return bool|void
     */
    public function safeUp()
    {
        $this->createTable('{{%san_pham}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(150)->notNull()->comment('Tên sản phẩm'),
            'slug' => $this->string(150)->comment('Slug'),
            'mo_ta_ngan_gon' => $this->string(500)->comment('Mô tả ngắn gọn sản phẩm'),
            'mo_ta_chi_tiet' => $this->text()->comment('Mô tả chi tiết'),
            'ban_chay' => $this->boolean()->notNull()->defaultValue(0)->comment('Bán chạy'),
            'noi_bat' => $this->boolean()->notNull()->defaultValue(0)->comment('Nổi bật'),
            'moi_ve' => $this->boolean()->notNull()->defaultValue(0)->comment('Mới về'),
            'gia_ban' => $this->double()->notNull()->comment('Giá bán'),
            'gia_canh_tranh' => $this->double()->notNull()->comment('Giá cạnh tranh'),
            //'anh_dai_dien' => $this->string()->notNull()->comment('Ảnh đại diện'),
            'anhdaidien_base_url' => $this->string(1024),
            'anhdaidien_path' => $this->string(1024),
            'ngay_dang' => $this->dateTime()->comment('Ngày đăng'),
            'ngay_sua' => $this->dateTime()->comment('Ngày sửa'),
            'thuong_hieu_id' => $this->integer()->notNull()->comment('Thương hiệu'),
            'nguoi_tao_id' => $this->integer()->notNull()->comment('Người tạo'),
            'nguoi_sua_id' => $this->integer()->comment('Người sửa'),
            'so_luong' => $this->integer()->notNull()->comment('Số lượng'),
            'ngay_hang_ve' => $this->dateTime()->comment('Ngày hàng về'),
            
        ]);
        // $this->addCommentOnColumn('{{%san_pham}}', 'id', 'ID');
        // $this->addCommontOnColumn('{{%san_pham}}', 'name', 'Tên sản phẩm');
        // $this->addCommontOnColumn('{{%san_pham}}', 'code', 'Slug');
        // $this->addCommontOnColumn('{{%san_pham}}', 'mo_ta_ngan_gon', 'Mô tả ngắn gọn sản phẩm');
        // $this->addCommontOnColumn('{{%san_pham}}', 'mo_ta_chi_tiet', 'Mô tả chi tiết');
        // $this->addCommontOnColumn('{{%san_pham}}', 'ban_chay', 'Bán chạy');
        // $this->addCommontOnColumn('{{%san_pham}}', 'noi_bat', 'Nổi bật');
        // $this->addCommontOnColumn('{{%san_pham}}', 'moi_ve', 'Mới về');
        // $this->addCommontOnColumn('{{%san_pham}}', 'gia_ban', 'Giá bán');
        // $this->addCommontOnColumn('{{%san_pham}}', 'gia_canh_tranh', 'Giá cạnh tranh');
        // $this->addCommontOnColumn('{{%san_pham}}', 'anh_dai_dien', 'Ảnh đại diện');
        // $this->addCommontOnColumn('{{%san_pham}}', 'ngay_dang', 'Ngày đăng');
        // $this->addCommontOnColumn('{{%san_pham}}', 'ngay_sua', 'Ngày sửa');
        // $this->addCommontOnColumn('{{%san_pham}}', 'thuong_hieu_id', 'Thương hiệu');
        // $this->addCommontOnColumn('{{%san_pham}}', 'nguoi_tao_id', 'Người tạo');
        // $this->addCommontOnColumn('{{%san_pham}}', 'nguoi_sua_id', 'Người sửa');
        // $this->addCommontOnColumn('{{%san_pham}}', 'so_luong', 'Số lượng');
        // $this->addCommontOnColumn('{{%san_pham}}', 'ngay_hang_ve', 'Ngày hàng về');
        
        $this->createTable('{{%phan_loai}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->comment('Tên danh mục sản phẩm'),
            'slug' => $this->string()->comment('Slug'),
        ]);
        // $this->addCommontOnColumn('{{%phan_loai}}', 'id', 'ID');
        // $this->addCommontOnColumn('{{%phan_loai}}', 'name', 'Tên danh mục sản phẩm');
        // $this->addCommontOnColumn('{{%phan_loai}}', 'code', 'Slug');

        $this->createTable('{{%phan_loai_san_pham}}', [
            'id' => $this->primaryKey(),
            'phan_loai_id' => $this->integer()->notNull(),
            'san_pham_id' => $this->integer()->notNull(),
        ]);

        $this->createTable('{{%tu_khoa}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(45)->notNull()->comment('Từ khóa'),
            'slug' => $this->string(45)->comment('Slug'),
        ]);
        // $this->addCommontOnColumn('{{%tu_khoa}}', 'id', 'ID');
        // $this->addCommontOnColumn('{{%tu_khoa}}', 'name', 'Từ khóa');
        // $this->addCommontOnColumn('{{%tu_khoa}}', 'code', 'Slug');

        $this->createTable('{{%tu_khoa_san_pham}}', [
            'id' => $this->primaryKey(),
            'tu_khoa_id' => $this->integer()->notNull(),
            'san_pham_id' => $this->integer()->notNull(),
        ]);

        $this->createTable('{{%thuong_hieu}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(45)->notNull()->comment('Tên thương hiệu'),
            'slug' => $this->string()->comment('Slug'),
            'logo_base_url' => $this->string(1024),
            'logo_path' => $this->string(1024),
        ]);
        // $this->addCommontOnColumn('{{%thuong_hieu}}', 'id', 'ID');
        // $this->addCommontOnColumn('{{%thuong_hieu}}', 'name', 'Tên thương hiệu');
        // $this->addCommontOnColumn('{{%thuong_hieu}}', 'code', 'Slug');
        // $this->addCommontOnColumn('{{%thuong_hieu}}', 'logo', 'Logo');

        $this->createTable('{{%anh_san_pham}}', [
            'id' => $this->primaryKey(),
            //'file' => $this->string(100)->notNull()->comment('Tên file ảnh'),
            'path' => $this->string()->notNull(),
            'base_url' => $this->string(),
            'type' => $this->string(),
            'size' => $this->integer(),
            'name' => $this->string(),
            'san_pham_id' => $this->integer()->notNull()->comment('Sản phẩm'),
        ]);
        // $this->addCommontOnColumn('{{%anh_san_pham}}', 'id', 'ID');
        // $this->addCommontOnColumn('{{%anh_san_pham}}', 'file', 'Đường dẫn file');
        // $this->addCommontOnColumn('{{%anh_san_pham}}', 'san_pham_id', 'Sản phẩm');

        $this->createTable('{{%vai_tro_san_pham}}', [
            'id' => $this->primaryKey(),
            'vai_tro' => $this->string(100)->notNull()->comment('Vai trò'),
            'user_id' => $this->integer()->notNull()->comment('User'),
        ]);
        // $this->addCommontOnColumn('{{%vai_tro_san_pham}}', 'id', 'ID');
        // $this->addCommontOnColumn('{{%vai_tro_san_pham}}', 'vai_tro', 'Vai trò');
        // $this->addCommontOnColumn('{{%vai_tro_san_pham}}', 'user_id', 'User');

        //'fk_furniture', <tên bảng có khóa phụ>, <tên khóa phụ>, <tên bảng có khóa chính cần nối đến>, <tên khóa chính>
        $this->addForeignKey('fk_nguoi_tao_san_pham', '{{%san_pham}}', 'nguoi_tao_id', '{{%user}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_nguoi_sua_san_pham', '{{%san_pham}}', 'nguoi_sua_id', '{{%user}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_thuong_hieu_san_pham', '{{%san_pham}}', 'thuong_hieu_id', '{{%thuong_hieu}}', 'id', 'cascade', 'cascade');
        
        $this->addForeignKey('fk_phan_loai_phan_loai_san_pham', '{{%phan_loai_san_pham}}', 'phan_loai_id', '{{%phan_loai}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_san_pham_phan_loai_san_pham', '{{%phan_loai_san_pham}}', 'san_pham_id', '{{%san_pham}}', 'id', 'cascade', 'cascade');
        
        $this->addForeignKey('fk_tu_khoa_tu_khoa_san_pham', '{{%tu_khoa_san_pham}}', 'tu_khoa_id', '{{%tu_khoa}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_san_pham_tu_khoa_san_pham', '{{%tu_khoa_san_pham}}', 'san_pham_id', '{{%san_pham}}', 'id', 'cascade', 'cascade');
        
        $this->addForeignKey('fk_san_pham_anh_san_pham', '{{%anh_san_pham}}', 'san_pham_id', '{{%san_pham}}', 'id', 'cascade', 'cascade');
        
        $this->addForeignKey('fk_user_vai_tro_san_pham', '{{%vai_tro_san_pham}}', 'user_id', '{{%user}}', 'id', 'cascade', 'cascade');
    }

    /**
     * @return bool|void
     */
    public function safeDown()
    {

        $this->dropForeignKey('fk_nguoi_tao_san_pham', '{{%san_pham}}');
        $this->dropForeignKey('fk_nguoi_sua_san_pham', '{{%san_pham}}');
        $this->dropForeignKey('fk_thuong_hieu_san_pham', '{{%san_pham}}');
        $this->dropForeignKey('fk_phan_loai_phan_loai_san_pham', '{{%phan_loai_san_pham}}');
        $this->dropForeignKey('fk_san_pham_phan_loai_san_pham', '{{%phan_loai_san_pham}}');
        $this->dropForeignKey('fk_tu_khoa_tu_khoa_san_pham', '{{%tu_khoa_san_pham}}');
        $this->dropForeignKey('fk_san_pham_tu_khoa_san_pham', '{{%tu_khoa_san_pham}}');
        $this->dropForeignKey('fk_san_pham_anh_san_pham', '{{%anh_san_pham}}');
        $this->dropForeignKey('fk_user_vai_tro_san_pham', '{{%vai_tro_san_pham}}');

        $this->dropTable('{{%san_pham}}');
        $this->dropTable('{{%phan_loai}}');
        $this->dropTable('{{%phan_loai_san_pham}}');
        $this->dropTable('{{%tu_khoa}}');
        $this->dropTable('{{%tu_khoa_san_pham}}');
        $this->dropTable('{{%anh_san_pham}}');
        $this->dropTable('{{%vai_tro_san_pham}}');
        $this->dropTable('{{%thuong_hieu}}');

    }
}
