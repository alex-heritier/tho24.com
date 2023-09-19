<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $blogs = [];

        $index = 0;
        if ($handle = opendir(resource_path().'/blogs/')) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != '.' && $entry != '..' && str_ends_with($entry, '.php')) {
                    $stripped_entry = str_replace('.blade.php', '', $entry);
                    $data = [
                        'index' => ++$index,
                        'title' => Str::title(str_replace('-', ' ', $stripped_entry)),
                        'path' => resource_path().'/blogs/'.$entry,
                        'slug' => $stripped_entry,
                    ];
                    array_push($blogs, $data);
                }
            }
            closedir($handle);
        }

        return view('blog.index')->with(['blogs' => $blogs]);
    }

    public function show(Request $request, string $slug)
    {
        try {
            $file_contents = file_get_contents(resource_path().'/blogs/'.$slug.'.blade.php');
        } catch (Exception $e) {
            return redirect('/blog')->withErrors('blog', 'Blog not found');
        }

        return Blade::render($file_contents);
    }
}
