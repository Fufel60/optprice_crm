<?php
use common\models\Status;

/** @var $this \yii\web\View */
/** @var $link string */
/** @var $paramExample string */

?>

<?= '<h4>Оффер №' . $offerId . '</h4>'; ?>
<p>Товар: <?= $offerProduct; ?></p>
<p>Статус оффера:
    <?php
    if ($offerStatus == Status::STATUS_NEW) {
        echo 'Новый';
    }
    else if ($offerStatus == Status::STATUS_START) {
        echo 'Запуск';
    }
    else if ($offerStatus == Status::STATUS_TESTING) {
        echo 'Тест';
    }
    else if ($offerStatus == Status::STATUS_REJECTED) {
        echo 'Отклонен';
    }
    else if ($offerStatus == Status::STATUS_SEARCH) {
        echo 'Поиск';
    }
    else if ($offerStatus == Status::STATUS_FOUNDED) {
        echo 'Товар найден';
    }
    ?>
</p>
