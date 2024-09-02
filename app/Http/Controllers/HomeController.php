<?php


namespace App\Http\Controllers;

use App\Models\HomeProduct;
use App\Models\QuickAccess;
use App\Models\News;
use App\Models\Banner;


use Illuminate\Http\Request;

use Illuminate\Support\Carbon;


class HomeController extends controller
{
    public function index()
    {
        $prodhome = HomeProduct::with('author')->latest()->get();
        $quickaccess = QuickAccess::with('author')->latest()->get();
        $news = News::with('author')->latest()->get();
        $banner = Banner::with('author')->latest()->get();
        


        foreach ($news as $rizzohiogyatt) {
            $rizzohiogyatt->formattedDate = Carbon::parse($rizzohiogyatt->date)->format('F d, Y');
        }


        return view('homepage', compact('prodhome', 'quickaccess', 'news', 'banner'));
    }
    

}
