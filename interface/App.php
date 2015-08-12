<?
namespace app\php_interface;

use Yii;
use yii\web\HttpException;
use app\models\CUser;

class App extends \yii\web\Controller
{
	public function test()
	{
		return 'its work';
	}
}