<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditBookmarkRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Bookmark;
use App\Models\BookmarkGroup;
use Inertia\Response;
use Inertia\Inertia;
use Number;

class BookmarkController extends Controller
{
    public function create(array $attrs): RedirectResponse
    {
        Bookmark::create($attrs);
        return redirect('/');
    }

    public function update(Request $request): RedirectResponse
    {
        $bookmark = Bookmark::find($request->input('id'));

        $bookmark->update($request->all());

        return redirect(route('index'));
    }

    public function edit(int $id): Response
    {
        $bookmark = Bookmark::where(
            'id',
            '=',
            $id
        )->get();

        $currentGroups = BookmarkGroup::pluck('name');

        return Inertia::render('Edit', [
            'bookmark' => $bookmark[0],
            'groups' => $currentGroups
        ]);
    }
    public function destroy(Bookmark $bookmark): RedirectResponse
    {
        $bookmark->delete();

        return redirect('/');
    }
}
