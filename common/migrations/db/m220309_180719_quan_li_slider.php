<?php

use yii\db\Migration;

/**
 * Class m220309_180719_quan_li_slider
 */
class m220309_180719_quan_li_slider extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%slider}}', [
            'id' => $this->primaryKey(),
            'tieu_de' => $this->string(100)->comment('Tiêu đề giảm giá'),
            'mo_ta' => $this->text()->comment('Mô tả'),
            'link' => $this->string(150)->comment('Đường dẫn (Link)'),          
        ]);

        $this->createTable('{{%anh_slider}}', [
            'id' => $this->primaryKey(),
            'file' => $this->string()->comment('Tên file'),
            'slider_id' => $this->integer()->notNull()->comment('Slider'),
        ]);

        $this->addForeignKey('fk_slider', '{{%anh_slider}}', 'slider_id', '{{%slider}}', 'id', 'cascade', 'cascade');
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_slider', '{{%anh_slider}}');

        $this->dropTable('{{%slider}}');
        $this->dropTable('{{%anh_slider}}');
    }
}
