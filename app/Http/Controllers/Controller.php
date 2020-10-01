<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Dynamic menu
    public function menuCategories() {
        $data = Category::get();
        return $data;
    }

    // Success message
    public function responseSuccess($message, $data, $code)
    {
        return [
            'message' => $message,
            'Response' => $code,
            'data' => $data,
        ];
    }
    // Error message
    public function responseError($message, $code)
    {
        return [
            'message' => $message,
            'Response' => $code,
        ];
    }
}
