<?php
namespace App\Http\Controllers;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;
use App\Models\Bookmark;

class IndexController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Index', ['bookmarks' => Bookmark::get()]);
    }

    public function redirectMe(): RedirectResponse
    {
        return redirect('Spandex');
    }
}
