<?php

namespace App\Exceptions;

use App\{Classes\Exceptions\RestExceptionHandlerTrait, Classes\RestfulAPI\RestTrait};
use Throwable;
use Illuminate\{Foundation\Exceptions\Handler as ExceptionHandler,
    Auth\AuthenticationException,
    Http\JsonResponse,
    Http\RedirectResponse,
    Http\Request};
use Symfony\Component\HttpFoundation\Response;

class Handler extends ExceptionHandler
{
    use RestTrait, RestExceptionHandlerTrait;

    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Render an exception into an HTTP response.
     *
     * @param Request $request
     * @param Throwable $exception
     * @return Response
     *
     * @throws Throwable
     */
    public function render($request, Throwable $exception)
    {
//        return parent::render($request, $exception);
        if (!$this->isApiCall($request) || !$request->wantsJson()) {
            return parent::render($request, $exception);
        } else {
            return $this->getJsonResponseForException($request, $exception);
        }
    }

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
