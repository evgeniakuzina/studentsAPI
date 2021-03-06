<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Log;

class ApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function jsonUnicode($data, $code) {

        return response()->json($data, $code, [], JSON_UNESCAPED_UNICODE);
    }

    public function jsonOK($data) {

        return $this->jsonUnicode($data, 200);
    }

    public function jsonError($message, $code) {

        //Log::info('Error'. $message . $code);

        return $this->jsonUnicode(['message' => $message], $code);
    }

    public function json404() {

        //Log::info('Error404'. $message);

        return $this->jsonUnicode(['message' => 'ID not found'], 404);
    }

}
