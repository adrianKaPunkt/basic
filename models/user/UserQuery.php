<?php
//
//
//namespace app\models\user;
//
//
//use yii\db\ActiveQuery;
//
//class UserQuery extends ActiveQuery
//{
//    /**
//     * Returns all results from user table as an array
//     *
//     * @param $db
//     * @return array | User[[]]
//     */
//    public function all($db = null)
//    {
//        return parent::all($db);
//    }
//
//    /**
//     * Returns a single row from the user table as array
//     *
//     * @param $db
//     * @return array | User[]
//     */
//    public function one($db = null)
//    {
//        return parent::one($db);
//    }
//
//    /**
//     * Query for active Users
//     *
//     * @return UserQuery
//     */
//    public function active()
//    {
//        return $this->andWhere(['status' => USER::STATUS_ACTIVE]);
//    }
//
//    /**
//     * Query for user id
//     *
//     * @param $id
//     * @return UserQuery
//     */
//    public function id($id)
//    {
//        return $this->andWhere(['id' => $id]);
//    }
//
//}