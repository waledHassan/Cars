<?php
namespace App\Traits;

trait GeneralTrait
{
    public function getCurrentLang()
    {
        return app()->getLocale();
    }


    public function returnError($msg = "")
    {
        return response()->json([
                'status'=>false,
                'errNum'=>"500",
                'msg'=>$msg
            ]);
    }

    public function returnSuccessMessage($msg = "", $errNum = "SOOOO")
    {
        return ['status'=>true, 'errNum'=>$errNum, 'msg'=>$msg];
    }

    public function returnData($key, $value, $msg = "")
    {
        return response()->json([
                'status'=>true,
                'msg'=>$msg,
                $key => $value
            ]);
    }

    public function returnCodeAccordingToInput($validator)
    {
        $inputs = array_keys($validator->errors()->toArray());
        $code = $this->getErrorCode($inputs[0]);
        return $code;
    }

    public function returnValidationError($code = "E001", $validator)
    {
        return $this->returnError($code, $validator->error()->first());
    }
}

?>