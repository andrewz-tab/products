<?php

namespace Tests;

use App\Http\Requests\BaseRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

abstract class RequestTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        app()->setLocale('en');
    }

    /** @return class-string<BaseRequest>  */
    abstract protected function getRequestClass(): string;

    protected function validate(array $postData): string
    {
        $requestClass = $this->getRequestClass();
        $formRequest = new $requestClass($postData);

        $validator = Validator::make($postData, $formRequest->rules());

        try {
            $validator->validate();

            return '';
        } catch (ValidationException $exception) {
            return $exception->getMessage();
        }
    }
}
