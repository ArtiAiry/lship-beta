<?php

namespace app\widgets;

use yii\grid\DataColumn;
use yii\helpers\Html;
use Yii;

class RoleColumn extends DataColumn
{
    public $defaultRole = 'client';
    public $adminRole = 'admin';
    public $managerRole = 'manager';
    public $teacherRole = 'teacher';

    protected function renderDataCellContent($model, $key, $index)
    {
        $value = $this->getDataCellValue($model, $key, $index);
        $label = $value ? $this->getRoleLabel($value) : $value;
        $class = $this->getColorLabel($model, $key, $index);

        $html = Html::tag('span', Html::encode($label), ['class' => 'alert alert-' . $class]);
        return $value === null ? $this->grid->emptyCell : $html;
    }

    /**
     * @param string $roleName
     * @return string
     */
    protected function getRoleLabel($roleName)
    {
        if ($role = Yii::$app->authManager->getRole($roleName)) {
            return $role->description;
        } else {
            return $roleName;
        }
    }

    protected function getColorLabel($model, $key, $index)
    {
        $value = $this->getDataCellValue($model, $key, $index);
        if ($value == $this->defaultRole){
            return 'success';
        } elseif($value == $this->teacherRole) {
            return 'info';
        } elseif($value == $this->managerRole){
            return 'primary';
        } else {
            return 'danger';
        }

    }
}