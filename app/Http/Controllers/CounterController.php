<?php
// +----------------------------------------------------------------------
// | 文件: index.php
// +----------------------------------------------------------------------
// | 功能: 提供count api接口
// +----------------------------------------------------------------------
// | 时间: 2021-12-12 10:20
// +----------------------------------------------------------------------
// | 作者: rangangwei<gangweiran@tencent.com>
// +----------------------------------------------------------------------

namespace App\Http\Controllers;

use Error;
use Exception;
use App\Counters;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class CounterController extends Controller
{
    /**
     * 获取todo list
     * @return Json
     */
    public function getCount()
    {
        try {
            $jsonContent = request()->getContent();
            Log::info('getCount Received JSON: ' . $jsonContent);
            return response()->json($jsonContent);
        } catch (Exception $e) {
            $res = [
                "code" => -1,
                "data" => [],
                "errorMsg" => ("更新计数异常" . $e->getMessage())
            ];
            Log::info('getCount rsp: '.json_encode($res));
            return response()->json($res);
        }
    }


    /**
     * 根据id查询todo数据
     * @param $action `string` 类型，枚举值，等于 `"inc"` 时，表示计数加一；等于 `"reset"` 时，表示计数重置（清零）
     * @return Json
     */
    public function updateCount()
    {
        try {
            $jsonContent = request()->getContent();
            Log::info('updateCount Received JSON data: ' . $jsonContent);
            // {"ToUserName":"gh_e4dd0e2741ef",
            //     "FromUserName":"oa3VM5WoV3dqsKUeK69u5bRoa2LI",
            //     "CreateTime":1692785113,
            //     "MsgType":"event",
            //     "Event":"subscribe_msg_popup_event",
            //     "List":
            //     {
            //         "PopupScene":"0",
            //         "SubscribeStatusString":"reject",
            //         "TemplateId":"QPT5OgXJj7GIFI7xASwDpDa7Jvy-dMI8GstmbT3P7Sw"
            //     }
            // }
            // $json = json_encode($jsonContent)
            // $CreateTime = json.CreateTime;

            // $jsonData = [
            //     "CreateTime" => 1583202606,
            //     "MsgType" => "event",
            //     "Event" => "minigame_deliver_goods",
            //     "MiniGame" => [
            //         "OrderId" => "r_123",
            //         "IsPreview" => 1,
            //         "ToUserOpenid" => "to_user_openid",
            //         "Zone" => 1001,
            //         "GiftTypeId" => 1,
            //         "GiftId" => "gift_id_xxx",
            //         "SendTime" => 1583202600,
            //         "GoodsList" => [
            //             ["Id" => "id_100001", "Num" => 3]
            //         ]
            //     ]
            // ];

            $res = [
                "ErrCode" => 0,
                "ErrMsg" => "Success"
            ];
            return response()->json($res);
        } catch (Exception $e) {
            $res = [
                "code" => -1,
                "data" => [],
                "errorMsg" => ("更新计数异常" . $e->getMessage())
            ];
            Log::info('updateCount rsp: '.json_encode($res));
            return response()->json($res);
        }
    }
}
