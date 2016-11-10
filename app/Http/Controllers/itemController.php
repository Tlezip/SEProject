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
            
           return redirect('/allItem');
        }
    }

    public function edit(Request $request)
    {
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
            ->where('Product','REGEXP','.*'.$search->input('search').'.*')
            ->get();
        return view('showItem', ['item' => $temp]);
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
            return view('showItem', ['item' => $item]);
        }
        else{
            return view('showItem', ['item' => $item]);
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
        echo $item;
    }
}
