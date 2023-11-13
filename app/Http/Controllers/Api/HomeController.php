<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\FooterLink;
use App\Models\Landing;
use App\Models\LatestNew;
use App\Models\Martyr;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use ApiResponseTrait;
    public function landings()
    {
        $landings = Landing::latest()->take(3)->get(['id', 'title', 'imageUrl']);

        if ($landings) {
            return $this->successResponse($landings);
        } else {
            return $this->errorResponse('No landing data found', 404);
        }
    }
    public function landingReadMore(Request $request)
    {
        $id = $request->input('id');

        $landing = Landing::select('title', 'content', 'imageUrl')->find($id);

        if (!$landing) {
            return $this->errorResponse('No landing data found', 404);
        }

        return $this->successResponse($landing);
    }
    public function services()
    {
        $services = Service::latest()->take(3)->get(['id', 'title', 'iconUrl']);

        if ($services) {
            return $this->successResponse($services);
        } else {
            return $this->errorResponse('No service data found', 404);
        }
    }

    public function articles()
    {
        $articles = Article::first();

        if ($articles) {
            return $this->successResponse($articles);
        } else {
            return $this->errorResponse('No article data found', 404);
        }
    }

    public function latestNews()
    {
        $latestNews = LatestNew::latest()->take(5)->get(['id', 'title', 'content', 'created_at', 'imageUrl']);

        if ($latestNews) {
            return $this->successResponse($latestNews);
        } else {
            return $this->errorResponse('No news data found', 404);
        }
    }
    public function latestNewsReadMore(Request $request)
    {
        $id = $request->input('id');

        $latestNews = LatestNew::select('title', 'content', 'imageUrl')->find($id);

        if (!$latestNews) {
            return $this->errorResponse('No latest news data found', 404);
        }

        return $this->successResponse($latestNews);
    }

    public function martyrs()
    {
        $martyrs = Martyr::latest()->take(5)->get(['name', 'imageUrl']);

        if ($martyrs) {
            return $this->successResponse($martyrs);
        } else {
            return $this->errorResponse('No news data found', 404);
        }
    }

    public function footerLinks()
    {
        $footer = FooterLink::getFooterLinks();

        if ($footer) {
            return $this->successResponse($footer);
        } else {
            return $this->errorResponse('No news data found', 404);
        }
    }
}
