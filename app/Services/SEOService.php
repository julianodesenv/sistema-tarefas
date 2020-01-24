<?php

namespace AgenciaS3\Services;


use AgenciaS3\Entities\SeoPage;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class SEOService
{

    public function getSeoPageSession($id)
    {
        //Session::forget('seoPage');
        if (!Session::has('seoPage') || !isset(Session::get('seoPage')[$id])) {
            $seoPage = SeoPage::find($id);
            $arrayConfig[$seoPage->id] = [
                'id' => $seoPage->id,
                'name' => $seoPage->name,
                'seo_keywords' => $seoPage->seo_keywords,
                'seo_description' => $seoPage->seo_description,
                'script' => $seoPage->script,
                'script_body' => $seoPage->script_body
            ];

            //salvar na session
            session()->put('seoPage', $arrayConfig);
        }

        return session()->get('seoPage')[$id];
    }

    public function getPage($seoPage)
    {
        $SEOName = $seoPage['name'];
        $SEODescription = $seoPage['seo_description'];
        $SEOKeywords = $seoPage['seo_keywords'];

        $cover = asset('assets/site/images/logo_facebook.jpg');
        $cover2 = asset('assets/site/images/logo_facebook_2.jpg');

        $this->getSEO($SEOName, $SEODescription, $SEOKeywords, $cover, $cover2);
    }

    private function getSEO($SEOName, $SEODescription, $SEOKeywords, $cover, $cover2)
    {
        SEOMeta::setTitle($SEOName);
        SEOMeta::setDescription($SEODescription);
        SEOMeta::setCanonical(Route::getCurrentRequest()->getUri());
        SEOMeta::addKeyword([$SEOKeywords]);
        TwitterCard::setTitle($SEOName);
        TwitterCard::setDescription($SEODescription);
        TwitterCard::addImage($cover);

        $SEOName .= ' - ' . config('app.name');

        OpenGraph::setDescription($SEODescription);
        OpenGraph::setTitle($SEOName);
        OpenGraph::setUrl(Route::getCurrentRequest()->getUri());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'pt-br');
        OpenGraph::addImage($cover, ['height' => 630, 'width' => 1200]);
        OpenGraph::addImage($cover);
        OpenGraph::addImage(['url' => $cover2, 'size' => 300]);
        OpenGraph::addImage($cover2, ['height' => 300, 'width' => 300]);
    }

    public function getPageComplement($seoPage, $title = null, $cover = null, $cover2 = null)
    {
        $SEOName = $seoPage->name;
        if ($title) {
            $SEOName .= ' | ' . $title;
        }
        $SEODescription = $seoPage->seo_description;
        $SEOKeywords = $seoPage->seo_keywords;

        if (!$cover) {
            $cover = asset('assets/site/images/logo_facebook.jpg');
        }
        if (!$cover2) {
            $cover2 = asset('assets/site/images/logo_facebook_2.jpg');
        }

        $this->getSEO($SEOName, $SEODescription, $SEOKeywords, $cover, $cover2);
    }

}