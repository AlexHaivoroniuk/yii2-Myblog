<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\Modal;
use app\components\LoginWidget;
use app\components\MenuWidget;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE HTML>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <title><?= Html::encode($this->title) ?></title>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
        <!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
        <?php $this->head() ?>
    </head>
    <body class="left-sidebar">
    <?php $this->beginBody() ?>
        <div id="wrapper">
            <!-- Content -->
            <div id="content">

                <?php if( Yii::$app->session->hasFlash('success') ):?>

                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo Yii::$app->session->getFlash('success'); ?>
                    </div>


                <?php endif; ?>

                <?php if( Yii::$app->session->hasFlash('info') ):?>

                    <div class="alert alert-info alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo Yii::$app->session->getFlash('info'); ?>
                    </div>


                <?php endif; ?>

                <!-- вывод сообщения об ошибки-->
                <?php if( Yii::$app->session->hasFlash('error') ):?>

                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo Yii::$app->session->getFlash('error'); ?>
                    </div>

                <?php endif; ?>


                <?= $content ?>
            </div>

            <div id="sidebar">

                <!-- Logo -->
                <h1 id="logo"><a href="<?= Url::to(['/']) ?>">My Blog</a></h1>

                <!-- Nav -->
                <nav id="nav">
                    <ul>
                        <?=  MenuWidget::Widget(['views' => 'menu']) ?>
                        <li class="current"><a href="#">Latest Post</a></li>
                        <li><a href="#">About Me</a></li>
                        <li><a href="#">Contact Me</a></li>
                    </ul>
                </nav>

                <!-- Search -->
                <section class="box search">
                    <form method="post" action="#">
                        <input type="text" class="text" name="search" placeholder="Search" />
                    </form>
                </section>

                <!-- Text -->
                <section class="box text-style1">

                    <div class="inner">
                        
                    <?=  LoginWidget::Widget(['views' => 'login']) ?>

                            <?php
//                            Modal::begin([
//                                    'header' => '<h5>РЕГИСТРАЦИЯ</h5>',
//                                'toggleButton' => [
//                                        'label' => 'Регистрация',
//                                    'class' => 'btn btn-success reg',
//                                    'url' => 'site/registr',
//                                ]
//                            ]);
//                                echo '<div class="form"></div>';
//                            Modal::end();
                            ?>

                    </div>
                </section>

                <!-- Recent Posts -->
                <section class="box recent-posts">
                    <header>
                        <h2>Recent Posts</h2>
                    </header>
                    <ul>
                        <li><a href="#">Lorem ipsum dolor</a></li>
                        <li><a href="#">Feugiat nisl aliquam</a></li>
                        <li><a href="#">Sed dolore magna</a></li>
                        <li><a href="#">Malesuada commodo</a></li>
                        <li><a href="#">Ipsum metus nullam</a></li>
                    </ul>
                </section>

                <!-- Recent Comments -->
                <section class="box recent-comments">
                    <header>
                        <h2>Recent Comments</h2>
                    </header>
                    <ul>
                        <li>case on <a href="#">Lorem ipsum dolor</a></li>
                        <li>molly on <a href="#">Sed dolore magna</a></li>
                        <li>case on <a href="#">Sed dolore magna</a></li>
                    </ul>
                </section>

                <!-- Calendar -->
                <section class="box calendar">
                    <div class="inner">
                        <table>
                            <caption>July 2014</caption>
                            <thead>
                            <tr>
                                <th scope="col" title="Monday">M</th>
                                <th scope="col" title="Tuesday">T</th>
                                <th scope="col" title="Wednesday">W</th>
                                <th scope="col" title="Thursday">T</th>
                                <th scope="col" title="Friday">F</th>
                                <th scope="col" title="Saturday">S</th>
                                <th scope="col" title="Sunday">S</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td colspan="4" class="pad"><span>&nbsp;</span></td>
                                <td><span>1</span></td>
                                <td><span>2</span></td>
                                <td><span>3</span></td>
                            </tr>
                            <tr>
                                <td><span>4</span></td>
                                <td><span>5</span></td>
                                <td><a href="#">6</a></td>
                                <td><span>7</span></td>
                                <td><span>8</span></td>
                                <td><span>9</span></td>
                                <td><a href="#">10</a></td>
                            </tr>
                            <tr>
                                <td><span>11</span></td>
                                <td><span>12</span></td>
                                <td><span>13</span></td>
                                <td class="today"><a href="#">14</a></td>
                                <td><span>15</span></td>
                                <td><span>16</span></td>
                                <td><span>17</span></td>
                            </tr>
                            <tr>
                                <td><span>18</span></td>
                                <td><span>19</span></td>
                                <td><span>20</span></td>
                                <td><span>21</span></td>
                                <td><span>22</span></td>
                                <td><a href="#">23</a></td>
                                <td><span>24</span></td>
                            </tr>
                            <tr>
                                <td><a href="#">25</a></td>
                                <td><span>26</span></td>
                                <td><span>27</span></td>
                                <td><span>28</span></td>
                                <td class="pad" colspan="3"><span>&nbsp;</span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- Copyright -->
                <ul id="copyright">
                    <li>&copy; Untitled.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
                </ul>

            </div>

        </div>
    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
