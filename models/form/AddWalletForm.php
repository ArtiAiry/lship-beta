<?php
/**
 * Created by PhpStorm.
 * User: Diwork
 * Date: 15.03.2018
 * Time: 16:19
 */

namespace app\models\form;


use app\modules\wallet\models\Wallet;

use Yii;
use yii\base\Model;

class AddWalletForm extends Model
{

    public $description;
    public $payout_type_id;
    public $currency_id;
    public $bank_id;
    public $user_id;



    public function rules()
    {
        return [
            ['description', 'string', 'max' => 255],
            [['payout_type', 'currency'],'required'],
            [['user_id'], 'integer'],
        ];
    }


    public function add_wallet()
    {

        if($this->validate())
        {
            $wallet = new Wallet();

            $wallet->description = $this->description;
            $wallet->payout_type_id = $this->payout_type_id;
            $wallet->currency_id = $this->currency_id;
            $wallet->bank_id = $this->bank_id;
            $wallet->user_id = Yii::$app->user->identity->id;

            return $wallet->save() ? $wallet : null;
        }
    }




}