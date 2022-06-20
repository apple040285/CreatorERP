<?php

/*
 * This file is part of the gzoran/laravel-api-response.
 *
 * (c) gzoran <zhengzhe94@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Api response trait.
 *
 * @author Mike <zhengzhe94@gmail.com>
 */
trait ApiResponse
{
    /**
     * 資訊回應 (Informational responses, 100–199),
     * 成功回應 (Successful responses, 200–299),
     * 重定向 (Redirects, 300–399),
     * 用戶端錯誤 (Client errors, 400–499),
     * 伺服器端錯誤 (Server errors, 500–599).
     */
    protected static $message = 'message';

    protected function response($data = null, int $status = 200, array $headers = [])
    {
        if (gettype($data) === 'string') {
            // 若 data 是字串的話自己帶入 message
            $data = [
                static::$message => $data,
            ];
        }
        return response()->json($data, $status, $headers, JSON_PRETTY_PRINT);
    }

    protected function success($data = null, array $headers = [])
    {
        if (!isset($data)) {
            $data = [
                static::$message => 'Success',
            ];
        }

        if ($data instanceof ResourceCollection) {
            return $data;
        }
        return $this->response($data, 200, $headers);
    }

    protected function created($data = [], array $headers = [])
    {
        if (empty($data)) {
            $data = [
                static::$message => 'Created',
            ];
        }

        return $this->response($data, 201, $headers);
    }

    protected function accepted(array $headers = [])
    {
        return $this->response(null, 202, $headers);
    }

    protected function notContent(array $headers = [])
    {
        return $this->response(null, 204, $headers);
    }

    protected function badRequest($data = [], array $headers = [])
    {
        if (empty($data)) {
            $data = [
                static::$message => 'Bad Request',
            ];
        }

        return $this->response($data, 400, $headers);
    }

    protected function unauthorized($data = [], array $headers = [])
    {
        if (empty($data)) {
            $data = [
                static::$message => 'Unauthorized',
            ];
        }

        return $this->response($data, 401, $headers);
    }

    /**
     * emailNotVerified 信箱未驗證
     *
     * @param  mixed $data
     * @param  mixed $headers
     * @return void
     */
    protected function emailNotVerified($data = [], array $headers = [])
    {
        if (empty($data)) {
            $data = [
                static::$message => 'Unauthorized',
            ];
        }

        return $this->response($data, 402, $headers);
    }

    /**
     * forbidden 禁止
     *
     * @param  mixed $data
     * @param  mixed $headers
     * @return void
     */
    protected function forbidden($data = [], array $headers = [])
    {
        if (empty($data)) {
            $data = [
                static::$message => 'Forbidden',
            ];
        }

        return $this->response($data, 403, $headers);
    }

    protected function notFound($data = [], array $headers = [])
    {
        if (empty($data)) {
            $data = [
                static::$message => 'Not Found',
            ];
        }

        return $this->response($data, 404, $headers);
    }

    protected function methodNotAllowed($data = [], array $headers = [])
    {
        if (empty($data)) {
            $data = [
                static::$message => 'Method Not Allowed',
            ];
        }

        return $this->response($data, 405, $headers);
    }

    protected function notAcceptable($data = [], array $headers = [])
    {
        if (empty($data)) {
            $data = [
                static::$message => 'Not Acceptable',
            ];
        }

        return $this->response($data, 406, $headers);
    }

    protected function requestTimeout($data = [], array $headers = [])
    {
        if (empty($data)) {
            $data = [
                static::$message => 'Request Timeout',
            ];
        }

        return $this->response($data, 408, $headers);
    }

    protected function gonfilct($data = [], array $headers = [])
    {
        if (empty($data)) {
            $data = [
                static::$message => 'Gonfilct',
            ];
        }

        return $this->response($data, 409, $headers);
    }

    protected function gone($data = [], array $headers = [])
    {
        if (empty($data)) {
            $data = [
                static::$message => 'Gone',
            ];
        }

        return $this->response($data, 410, $headers);
    }

    protected function payloadTooLarge($data = [], array $headers = [])
    {
        if (empty($data)) {
            $data = [
                static::$message => 'Payload Too Large',
            ];
        }

        return $this->response($data, 413, $headers);
    }

    protected function requestURITooLong($data = [], array $headers = [])
    {
        if (empty($data)) {
            $data = [
                static::$message => 'Request-URI Too Long',
            ];
        }

        return $this->response($data, 414, $headers);
    }

    protected function unsupportedMediaType($data = [], array $headers = [])
    {
        if (empty($data)) {
            $data = [
                static::$message => 'Unsupported Media Type',
            ];
        }

        return $this->response($data, 415, $headers);
    }

    protected function unprocessableEntity($data = [], array $headers = [])
    {
        if (empty($data)) {
            $data = [
                static::$message => 'Unprocessable Entity',
            ];
        }

        return $this->response($data, 422, $headers);
    }

    protected function tooManyRequest($data = [], array $headers = [])
    {
        if (empty($data)) {
            $data = [
                static::$message => 'Too Many Request',
            ];
        }

        return $this->response($data, 429, $headers);
    }

    protected function internalServerError($data = [], array $headers = [])
    {
        if (empty($data)) {
            $data = [
                static::$message => 'Internal Server Error',
            ];
        }

        return $this->response($data, 500, $headers);
    }

    protected function serviceUnavailable($data = [], array $headers = [])
    {
        if (empty($data)) {
            $data = [
                static::$message => 'Service Unavailable',
            ];
        }

        return $this->response($data, 503, $headers);
    }
}
