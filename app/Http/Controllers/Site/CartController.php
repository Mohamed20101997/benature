<?php

namespace App\Http\Controllers\Site;

use App\Models\Product;
use App\Http\Requests;
use App\Basket\Basket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exceptions\QuantityExceededException;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class CartController extends Controller
{
/**
     * Instance of Basket.
     *
     * @var Basket
     */
    protected $basket;
    protected $id;

    /**
     * Create a new CartController instance.
     *
     * @param Basket $basket
     * @param Product $product
     */
    public function __construct(Basket $basket)
    {
        $this->basket = $basket;

    }

    /**
     * Show all items in the Basket.
     *
     */

    public function getIndex()
    {
        $basket = $this -> basket ;
        return view('site.cart.index',compact('basket'));
    }

    /**
     * Add items to the Basket.
     *
     * @param $slug
     * @param $quantity
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postAdd(Request $request)
    {   $data =[] ;

         $slug =$request -> product_slug ;
         $data['product'] = Product::where('slug', $slug)->firstOrFail();
        try {
            $this->basket->add($data['product'], $request->quantity ?? 1);

        } catch (QuantityExceededException $e) {

            return 'Quantity Exceeded';  // must be trans as the site is multi languages
        }

        $data['basket']  = $this->basket->itemCount();

        return response()->json($data);
    }

    /**
     * Update the Basket item with given slug.
     *
     * @param         $slug
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \App\Exceptions\QuantityExceededException
     */
    public function postUpdate($slug, Request $request)
    {
        $_product = Product::where('slug', $slug)->firstOrFail();

        try {
            $this->basket->update($_product, $request->quantity);

        } catch (QuantityExceededException $e) {

            return trans('site.cart.msgs.exceeded');
        }

        $data['basket']  = $this->basket->itemCount();
        return response()->json($data);
    }

    public function postUpdateAll(Request $r)
    {
        if (!$r->has('quantities') || !$this->basket->itemCount()) {
            return trans('site.cart.msgs.empty');
        }

        foreach ($this->basket->all() as $index => $item) {
            try {
                $this->basket->update($item, $r->quantities[$index]);
            } catch (QuantityExceededException $e) {
                return trans('site.cart.msgs.exceeded');
            }
        }

        return trans('site.cart.msgs.updated');
    }




}
