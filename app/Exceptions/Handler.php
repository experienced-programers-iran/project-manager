<?php

namespace App\Exceptions;

use App\Services\ResponseService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Throwable;

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

    public function render($request, Throwable $e): Response|JsonResponse|RedirectResponse|\Symfony\Component\HttpFoundation\Response
    {

        if ($e instanceof ModelNotFoundException) {
            $model = app($e->getModel());

            return ResponseService::generateResponse(
                status: false,
                message: method_exists($model,
                    'notFoundMessage') ? $model->notFoundMessage() : 'Resource not found',
                statusCode: 404
            );

        }

        return parent::render($request, $e);
    }
}
