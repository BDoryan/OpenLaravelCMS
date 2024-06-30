<?php

namespace App\Exceptions;

class ModelNotFound extends \Exception
{

    private string $model;

    public function __construct(string $model) {
        $this->model = $model;
    }

    public function render(): \Illuminate\Http\JsonResponse {
        return response()->json([
            'message' => 'Model not found',
            'model' => $this->model
        ], 404);
    }

    public static function withModel(string $model): self {
        return new self($model);
    }
}
