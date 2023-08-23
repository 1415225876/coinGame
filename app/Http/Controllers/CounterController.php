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
        // try {
        //     $data = (new Counters)->find(1);
        //     if ($data == null) {
        //         $count = 0;
        //     }else {
        //         $count = $data["count"];
        //     }
        //     $res = [
        //         "code" => 0,
        //         "data" =>  $count
        //     ];
        //     Log::info('getCount rsp: '.json_encode($res));
        //     return response()->json($res);
        // } catch (Error $e) {
        //     $res = [
        //         "code" => -1,
        //         "data" => [],
        //         "errorMsg" => ("查询计数异常" . $e->getMessage())
        //     ];
        //     Log::info('getCount rsp: '.json_encode($res));
        //     return response()->json($res);
        // }
        try {
            $jsonContent = request()->getContent();
            Log::info('updateCount Received JSON data: ' . $jsonContent);
            return response()->json($jsonContent);
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
            return response()->json($jsonContent);
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
