<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class itemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'product' => 'required|string',
            'unit' => 'required|string',
            'cost' => 'required|integer',
            'price' => 'required|integer',
            'category' => 'required',
        ]);

        $request->session()->forget('Noitem');
        $item = \DB::table('itemkeep')
            ->where('Product','=',$request->input('product'))
            ->where('Unit','=',$request->input('unit'))
            ->where('Cost','=',$request->input('cost'))
            ->where('Price','=',$request->input('price'))
            ->where('Category','=',$request->input('category'))
            ->where('shopID','=',Auth::user()->shopid)
            ->first();
        if($item == NULL){
            $table = new \App\itemKeep;
            $table->Product = $request->input('product');
            $table->Unit = $request->input('unit');
            $table->Cost = $request->input('cost');
            $table->Price = $request->input('price');
            $table->Category = $request->input('category');
            $table->Quantity = $request->input('quantity');
            $table->shopID = Auth::user()->shopid;
            $table->CostAll = $request->input('cost')*$request->input('quantity');
            $table->save();
            return redirect('/allItem');
        }   
        else{
           \DB::table('itemkeep')
                ->where('Product','=',$request->input('product'))
                ->where('Unit','=',$request->input('unit'))
                ->where('Cost','=',$request->input('cost'))
                ->where('Price','=',$request->input('price'))
                ->where('Category','=',$request->input('category'))
                ->increment('Quantity',$request->input('quantity'));

            \DB::table('itemkeep')
                ->where('Product','=',$request->input('product'))
                ->where('Unit','=',$request->input('unit'))
                ->where('Cost','=',$request->input('cost'))
                ->where('Price','=',$request->input('price'))
                ->where('Category','=',$request->input('category'))
                ->increment('CostAll',$request->input('cost')*$request->input('quantity')); 
           return redirect('/allItem');
        }
    }

    public function edit(Request $request)
    {
        $this->validate($request, [
            'product' => 'required|string',
            'unit' => 'required|string',
            'cost' => 'required|integer',
            'price' => 'required|integer',
            'category' => 'required',
        ]);

        \DB::table('itemkeep')
            ->where('ID','=',$request->input('ID'))
            ->update(['Product' => $request->input('product')]);
        \DB::table('itemkeep')
            ->where('ID','=',$request->input('ID'))
            ->update(['Unit' => $request->input('unit')]);
        \DB::table('itemkeep')
            ->where('ID','=',$request->input('ID'))
            ->update(['Cost' => $request->input('cost')]);
        \DB::table('itemkeep')
            ->where('ID','=',$request->input('ID'))
            ->update(['Price' => $request->input('price')]);
        \DB::table('itemkeep')
            ->where('ID','=',$request->input('ID'))
            ->update(['Category' => $request->input('category')]);
        \DB::table('itemkeep')
            ->where('ID','=',$request->input('ID'))
            ->update(['Quantity' => $request->input('quantity')]);
        return redirect('/allItem');
    }

    public function search(Request $search){
        $temp = \DB::table('itemkeep')
            ->where('shopID','=',Auth::user()->shopid)
            ->where('Product','REGEXP','.*'.$search->input('search').'.*')
            ->get();
        return view('showItem', ['items' => $temp]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

         $item = \DB::table('itemkeep')
            ->where('shopID','=',Auth::user()->shopid)
            ->get();
            //Auth::user()->shopid
       if($item == '[]'){
            Session::flash('Noitem', 'No item in Stock');
            return view('showItem', ['items' => $item]);
        }
        else{
            return view('showItem', ['items' => $item]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $id)
    {
        $temp = \DB::table('itemkeep')
            ->where('ID','=',$id->input('ID'))
            ->delete();
        return redirect('/allItem');
    }
    public function check(Request $request)
    {
        $item = \DB::table('itemkeep')
            ->where('shopID','=',Auth::user()->shopid)
            ->get();
        return view('checkstock',['item' => $item]);
        
    }
    public function profit(Request $request)
    {
       $request->session()->forget('sellerror');
        $items = \DB::table('itemkeep')
            ->where('shopID','=',Auth::user()->shopid)
            ->get();
        foreach ($items as $item)
        {
            if(/*($request->input($item->ID)!= NULL) && */($request->input("sold".$item->ID) != NULL)){
                if($request->input('sold'.$item->ID) < $item->Quantity){
                    $table = new \App\profit;
                    $table->itemID = $request->input($item->ID);
                    $table->shopID = Auth::user()->shopid;
                    $table->profit = $request->input('sold'.$item->ID)*$item->Price;
                    $table->sold = $request->input('sold'.$item->ID);
                    $table->save();
                    \DB::table('itemkeep')
                        ->where('ID','=',$request->input($item->ID))
                        ->update(['Quantity' => $item->Quantity - ($request->input("sold".$item->ID))]);
                }
                else
                {   
                    Session::flash('sellerror', $item->Product.' not Enough');
                    return redirect('/check');
                }

            }
        } 
        return redirect('/allItem');       
    }
}