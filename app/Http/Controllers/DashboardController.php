<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Document;
use App\Models\Event;
use App\Models\Level;
use App\Models\News;
use App\Models\Role;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $rolesCount = Role::count();
        $nivelesCount = Level::count();
        $usersCount = User::count();
        $categoriesCount = Category::count();
        $newsCount = News::count();
        $eventsCount = Event::count();
        $documentsCount = Document::count();
        $coursesCount = Course::count();

        return view('intranet.panel', compact(
            'rolesCount',
            'nivelesCount',
            'usersCount',
            'categoriesCount',
            'newsCount',
            'eventsCount',
            'documentsCount',
            'coursesCount'
        ));
    }
}
