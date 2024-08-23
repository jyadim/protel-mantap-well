<?php


namespace App\Http\Controllers;

use App\Models\HomeProduct;
use App\Models\QuickAccess;
use App\Models\News;
use App\Models\Banner;
use App\Models\About;
use App\Models\Products;
use App\Models\Team;
use Illuminate\Http\Request;

use Illuminate\Support\Carbon;


class gaskan extends controller
{
    public function index()
    {
        $prodhome = HomeProduct::with('author')->latest()->get();
        $quickaccess = QuickAccess::with('author')->latest()->get();
        $news = News::with('author')->latest()->get();
        $banner = Banner::latest()->get();


        foreach ($news as $kontol) {
            $kontol->formattedDate = Carbon::parse($kontol->date)->format('F d, Y');
        }


        return view('homepage', compact('prodhome', 'quickaccess', 'news', 'banner'));
    }

    public function titit()
    {
        $about = About::latest()->get();
        $team = Team::latest()->get();
        return view('about', compact('about', 'team'));

    }
    public function madep()
    {
        $product = Products::get();
        return view('product', compact('product'));

    }
}
