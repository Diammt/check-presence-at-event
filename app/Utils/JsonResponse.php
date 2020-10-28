<?php
/**
 * File JsonResponse.php
 *
 * @author Tuan Duong <bacduong@gmail.com>
 * @package Laravue
 * @version 1.0
 */
namespace App\Utils;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

/**
 * Class JsonResponse
 * Simple response object for Laravue application
 * Response format:
 * {
 *   'success': true|false,
 *   'data': [],
 *   'error': ''
 * }
 *
 * @package Laravue
 */
class JsonResponse implements \JsonSerializable
{
    const STATUS_SUCCESS = true;
    const STATUS_ERROR = false;

    /**
     * Data to be returned
     * @var mixed
     */
    private $data = [];

    /**
     * Error message in case process is not success. This will be a string.
     *
     * @var string
     */
    private $error = '';

    /**
     * @var bool
     */
    private $success = false;

    private $code = 200;

    /**
     * JsonResponse constructor.
     * @param mixed $data
     * @param string $error
     */
    public function __construct($data = [], string $error = '', $code=200)
    {
        if ($this->shouldBeJson($data)) {
            $this->data = $data;
        }

        $this->error = $error;
        $this->success = !empty($data);
        $this->code = $code;
    }


    /**
     * Success with data
     *
     * @param array $data
     */
    public function success($data = [])
    {
        $this->success = true;
        $this->data = $data;
        $this->error = '';
    }

    /**
     * Fail with error message
     * @param string $error
     */
    public function fail($error = '', $code=403)
    {
        $this->success = false;
        $this->error = $error;
        $this->data = [];
        $this->code = $code;
    }

    /**
     * @inheritdoc
     */
    public function jsonSerialize()
    {
        return [
            'success' => $this->success,
            'data' => $this->data,
            'error' => $this->error,
            'code' => $this->code,
        ];
    }


    /**
     * Determine if the given content should be turned into JSON.
     *
     * @param  mixed  $content
     * @return bool
     */
    private function shouldBeJson($content): bool
    {
        return $content instanceof Arrayable ||
            $content instanceof Jsonable ||
            $content instanceof \ArrayObject ||
            $content instanceof \JsonSerializable ||
            is_array($content);
    }

    /**
     * Get the value of Data to be returned
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of Data to be returned
     *
     * @param mixed $data
     *
     * @return self
     */
    public function setData($data)
    {
        $this->data = $data;
        $this->setSuccess(true);
        return $this;
    }

    /**
     * Get the value of Error message in case process is not success. This will be a string.
     *
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Set the value of Error message in case process is not success. This will be a string.
     *
     * @param string $error
     *
     * @return self
     */
    public function setError($error)
    {
        $this->error = $error;
        $this->setSuccess(false);
        return $this;
    }

    /**
     * Get the value of Success
     *
     * @return bool
     */
    public function getSuccess()
    {
        return $this->success;
    }

    /**
     * Set the value of Success
     *
     * @param bool $success
     *
     * @return self
     */
    public function setSuccess($success)
    {
        $this->success = $success;

        return $this;
    }

    /**
     * Get the value of Code
     *
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of Code
     *
     * @param mixed $code
     *
     * @return self
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }


}
