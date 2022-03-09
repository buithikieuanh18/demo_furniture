<?php

use yii\db\Migration;

/**
 * Class m220309_175818_quan_li_don_hang
 */
class m220309_175818_quan_li_don_hang extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%don_hang}}', [
            'id' => $this->primaryKey(),
            'ho_ten' => $this->string(60)->notNull()->comment('Họ và tên'),
            'dien_thoai' => $this->string(20)->notNull()->comment('Số điện thoại'),
            'email' => $this->string(150)->comment('Địa chỉ email'),
            'dia_chi' => $this->string(200)->notNull()->comment('Địa chỉ'),
            'ngay_dat' => $this->dateTime()->notNull()->comment('Ngày đặt hàng'),
            'tong_tien' => $this->double()->notNull()->comment('Tổng số tiền'),
            'note' => $this->text()->comment('Ghi chú'),
            'ship' => $this->double()->notNull()->defaultValue(0)->comment('Phí vận chuyển'),
            'vat' => $this->double()->notNull()->defaultValue(0)->comment('VAT'),
            'thanh_tien' => $this->double()->notNull()->defaultValue(0)->comment('Thành tiền'),
            'chiet_khau' => $this->string()->notNull()->defaultValue(0)->comment('Chiết khấu'),
            'kieu_chiet_khau' => "ENUM('Tiền mặt', 'Phần trăm')",
            'hinh_thuc_thanh_toan' => "ENUM('Tiền mặt', 'Chuyển khoản')",
            'tinh_trang' => "ENUM('Đang chờ xử lý', 'Đang xử lý', 'Đang giao hàng', 'Hủy')",
            'ly_do_huy' => $this->text()->comment('Lý do hủy hàng'),
            'tong_so_luong_san_pham' => $this->integer()->notNull()->defaultValue(0)->comment('Tổng số lượng sản phẩm'),            
        ]);

        $this->createTable('{{%don_hang_chi_tiet}}', [
            'id' => $this->primaryKey(),
            'so_luong' => $this->integer()->notNull()->comment('Số lượng'),
            'don_gia' => $this->double()->notNull()->comment('Đơn giá'),
            'don_hang_id' => $this->integer()->notNull()->comment('Đơn hàng'),
            'san_pham_id' => $this->integer()->notNull()->comment('Sản phẩm'),
        ]);

        $this->addForeignKey('fk_don_hang', '{{%don_hang_chi_tiet}}', 'don_hang_id', '{{%don_hang}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_san_pham', '{{%don_hang_chi_tiet}}', 'san_pham_id', '{{%san_pham}}', 'id', 'cascade', 'cascade');
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_don_hang', '{{%don_hang_chi_tiet}}');
        $this->dropForeignKey('fk_san_pham', '{{%don_hang_chi_tiet}}');

        $this->dropTable('{{%don_hang}}');
        $this->dropTable('{{%don_hang_chi_tiet}}');
    }
}
