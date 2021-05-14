<?php


namespace app\models\plan;

use Cassandra\Time;
use yii\db\ActiveRecord;

/**
 * Class Day
 * @package app\models\plan
 *
 * @property integer $id
 * @property integer $userid
 * @property \DateTime $date
 * @property Time $early_from
 * @property Time $early_until
 * @property Time $late_from
 * @property Time $late_until
 * @property integer $status
 * @property integer $type
 */
class Day extends ActiveRecord
{
    const STATUS_PAST = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_REQUEST = 2;

    const TYPE_FREE = 0;
    const TYPE_WORK = 1;
    const TYPE_SICK = 2;

    public static function tableName()
    {
        return '{{%day}}';
    }
}