<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 24.10.17
 * Time: 17:12
 */

use yii\helpers\Url;
use yii\helpers\Html;

?>

<?php foreach ($model as $category): ?>
    <li><a href="<?= Url::to(['/category/view/', 'id' => $category->id]) ?>"><?=$category->title?></a></li>
<?php endforeach; ?>
