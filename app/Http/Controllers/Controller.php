<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function confirm(string $question, string $title = 'Potwierdzenie', array $options = []): View
    {
        return view(
            'confirmation',
            array_merge([
                'title' => $title,
                'question' => $question,
            ], $options)
        );
    }

    protected function confirmDelete(string $question, string $title = 'Potwierdź usunięcie', array $options = []): View
    {
        return $this->confirm($question, $title, [
            'yesLabel' => 'Tak, usuń',
            'color' => 'danger',
            'method' => 'DELETE'
        ]);
    }
}
