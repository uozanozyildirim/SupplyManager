<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }


    public function render($request, Exception|Throwable $exception)
    {
        if ($exception instanceof UnauthorizedHttpException) {
            $preException = $exception->getPrevious();
            if ($preException instanceof
                TokenExpiredException) {
                return response()->json([
                        'data' => null,
                        'status' => false,
                        'err_' => [
                            'message' => 'Token Expired',
                            'code' =>1
                        ]
                    ]
                );
            }
            else if ($preException instanceof
                TokenInvalidException) {
                return response()->json([
                        'data' => null,
                        'status' => false,
                        'err_' => [
                            'message' => 'Token Invalid',
                            'code' => 1
                        ]
                    ]
                );
            } else if ($preException instanceof
                TokenBlacklistedException) {
                return response()->json([
                        'data' => null,
                        'status' => false,
                        'err_' => [
                            'message' => 'Token Blacklisted',
                            'code' => 1
                        ]
                    ]
                );
            }
            if ($exception->getMessage() === 'Token not provided') {
                return response()->json([
                        'data' => null,
                        'status' => false,
                        'err_' => [
                            'message' => 'Token not provided',
                            'code' => 1
                        ]
                    ]
                );
            }else if( $exception->getMessage() === 'User not found'){
                return response()->json([
                        'data' => null,
                        'status' => false,
                        'err_' => [
                            'message' => 'User Not Found',
                            'code' => 1
                        ]
                    ]
                );
            }
        }
        return parent::render($request, $exception);
    }

}
