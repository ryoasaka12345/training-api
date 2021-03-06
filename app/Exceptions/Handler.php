<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;

class Handler extends ExceptionHandler
{
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

    /* 
        Sending a orrect 404 Responce
    */
    public function render($request, Throwable $exception)
    {
        // Replace our 404 response with a JSON response.
        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'data' => 'Resource not found'
            ], 404);
        } else if ($exception instanceof AuthenticationException) {
            return response()->json([
                'data' => 'Unauthenticated'
            ], 401);
        }

        return parent::render($request, $exception);
    }
}
