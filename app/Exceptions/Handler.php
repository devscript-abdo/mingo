<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
        });
    }

    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    public function render($request, Throwable $exception)
    {
        /*if ($exception instanceof \ErrorException) {
             return response()->json([
                 'data' => 'Resource not found'
             ], 404);
         }*/
        /* if ($exception instanceof ModelNotFoundException) {
               return response()->json([
                   'data' => 'Resource not found'
               ], 404);
           }*/

        /* if ($exception instanceof InvalidFilterQuery) {
                   return response()->json([
                       'data' => 'Resource not found'
                   ], 404);
         }*/

        if (request()->is('api/*')) {

            if ($exception instanceof MethodNotAllowedHttpException) {
                return response()->json([
                    'msg' => ['error' => 'sorry this URL is not Allowed from Browser Directly']
                ], 405);
            }

            if ($exception instanceof NotFoundHttpException) {
               /* return response()->json([

                    'msg' => ['error' => 'sorry this URL is not Found']
                ], 404);*/

                return redirect()->route('home');
            }
        }

        return parent::render($request, $exception);
    }
}
