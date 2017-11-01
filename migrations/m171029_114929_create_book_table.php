<?php

use yii\db\Migration;

/**
 * Handles the creation of table `book`.
 */
class m171029_114929_create_book_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('book', [
            'id' => $this->primaryKey(),
            'name' => $this->text(),
            'img' => $this->text(),
            'author' => $this->text(),
            'release_date' => $this->dateTime(),
            'attachment_date' => $this->dateTime(),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('book');
    }
}
