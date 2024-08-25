<?php

namespace App\Http\Controllers;

use App\Exceptions\AuthException;
use App\Models\users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // 회원가입 시 아이디 중복 체크
    public function accountCheck(Request $request) {
        $account = $request->account;

        $accountChk = users::where('account', '=', $account)->first();
        
        if($accountChk !== null) {
            throw new AuthException('E27');
        }

        $responseData = [
            'code' => '0'
            ,'msg' => '사용가능한 ID입니다.'
        ];

        return response()->json($responseData, 200);
    }
}
