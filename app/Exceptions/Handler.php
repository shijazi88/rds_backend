<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;


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
    /**
    * Render an exception into an HTTP response.
    *
    * @param  Request  $request
    * @param  Throwable  $e
    * @return Response
    */
   public function render($request, Throwable $e): Response
   {
    if ($request->segment(1) === 'api') {   // if the first segment of the URL is "api"
        // return a json response

           return response()->json([
            'status' => false,
            'message' => 'error',
            'data' => 'An error occurred. Please try again.',
            'erorr' =>  $e->getMessage()
           ], 500);
       }

       // Default to the parent class's implementation if we're not expecting JSON
       return parent::render($request, $e);
    }

    
}
