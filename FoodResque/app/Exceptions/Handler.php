<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    public function report(Throwable $exception)
    {
        if ($exception instanceof ValidationException) {
            Log::error('Validation error: ' . $exception->getMessage());
        } elseif ($exception instanceof ModelNotFoundException) {
            Log::error('Model not found: ' . $exception->getMessage());
        } elseif ($exception instanceof AuthenticationException) {
            Log::error('Authentication error: ' . $exception->getMessage());
        } elseif ($exception instanceof NotFoundHttpException) {
            Log::error('Route not found: ' . $exception->getMessage());
        } elseif ($exception instanceof HttpException) {
            Log::error('HTTP error: ' . $exception->getMessage());
        } else {
            Log::error('Error: ' . $exception->getMessage());
        }

        parent::report($exception);
    }

    public function render($request, Throwable $exception)
    {
        return parent::render($request, $exception);
    }
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

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
