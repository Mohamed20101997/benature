<?php

namespace App\Http\Controllers\Site;
use App\Basket\Basket;
use App\Http\Controllers\Controller;


class SiteInformationController extends Controller
{

    protected $basket;
    public function __construct(Basket $basket)
    {
        $this->basket = $basket;

    }

    public function aboutUs(){
        $basket = $this->basket ;
        return view('site.information.aboutUs',compact('basket'));
    }

    public function deliveryInformation(){
        $basket = $this->basket ;
        return view('site.information.deliveryInformation',compact('basket'));
    }

    public function privacyPolicy(){
        $basket = $this->basket ;
        return view('site.information.privacyPolicy',compact('basket'));
    }

    public function termAndConditions(){
        $basket = $this->basket ;
        return view('site.information.termAndConditions',compact('basket'));
    }

}
