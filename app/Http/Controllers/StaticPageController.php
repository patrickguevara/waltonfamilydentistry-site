<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StaticPageController extends Controller
{
    public function __invoke(string $page): View
    {
        if (!in_array($page, ['privacy', 'terms'], true)) {
            throw new NotFoundHttpException();
        }

        return view('pages.'.$page);
    }
}
