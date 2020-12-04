<?php

namespace App\Helpers;

use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\Validation\Validator;
use phpDocumentor\Reflection\Types\Boolean;
use Stringable;

class ResHelper implements Stringable, Jsonable, Responsable
{
    private int $statusCode;
    private string $message, $error;
    private $data;
    private bool $applyStatusCode  = true;



    public function __construct()
    {
        $this->statusCode(200);
        $this->message("success");
        $this->error("");
        $this->data(null);
    }


    /**
     * Get the value of statusCode
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Set the value of statusCode
     *
     * @return  self
     */
    public function statusCode(int $statusCode): ResHelper
    {
        $this->statusCode = $statusCode;

        return $this;
    }




    /**
     * Set the value of statusCode
     *
     * @return  self
     */
    public function code(int $statusCode): ResHelper
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * Get the value of message
     */
    public function getMessage()
    {
        return $this->message;
    }



    /**
     * Set the value of message
     *
     * @return  self
     */
    public function message(String $message): ResHelper
    {
        if ($this->getStatusCode() != 200) {
            $this->statusCode(200);
        }
        $this->message = $message;

        return $this;
    }

    /**
     * Get the value of error
     */
    public function getError()
    {
        return $this->error;
    }



    /**
     * Set the value of error
     *
     * @return  self
     */
    public function error(String $error): ResHelper
    {
        if ($this->getStatusCode() == 200) {
            $this->statusCode = 422;
        }
        $this->error = $error;

        return $this;
    }

    public function errorValidator(Validator $validator)
    {
        if ($this->getStatusCode() == 200) {
            $this->statusCode = 422;
        }
        $this->error = $validator->errors()->first();
        return $this;
    }

    public function __toString()
    {
        return json_encode($this->toArray());
    }


    public function toArray(): array
    {
        $rslt = [];
        $rslt["status"] = $this->getStatusCode();
        if ($this->getStatusCode() == 200) {
            $rslt["message"] = $this->getMessage();
            if ($this->getData() != null) {
                $rslt["data"] = $this->getData();
            }
        } else {
            $rslt["error"] = $this->getError();
        }
        return $rslt;
    }


    public function toJson($option = 0)
    {
        return json_encode($this->toArray(), $option);
    }

    /**
     * Get the value of data
     */
    public function getData()
    {
        return $this->data;
    }



    /**
     * Set the value of data
     *
     * @return  self
     */
    public function data($data): ResHelper
    {
        if ($this->getStatusCode() != 200) {
            $this->statusCode(200);
        }
        $this->data = $data;

        return $this;
    }


    public function setAll($data, string $message = null, string $error = null, int $statusCode): ResHelper
    {
        $this->data($data);
        $this->message($message);
        $this->error($error);
        $this->statusCode($statusCode);
        return $this;
    }


    public function toResponse($request)
    {
        return response($this->toArray(), $this->applyStatusCode ? $this->getStatusCode() : 200);
    }

    /**
     * Get the value of applyStatusCode
     */
    public function getApplyStatusCode(): bool
    {
        return $this->applyStatusCode;
    }


    /**
     * Set the value of applyStatusCode
     *
     * @return  self
     */
    public function applyStatusCode(Boolean $applyStatusCode)
    {
        $this->applyStatusCode = $applyStatusCode;

        return $this;
    }
}
