<?php

namespace App\Http\Controllers;

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

        $item = \DB::table('itemkeep')
            ->where('Product','=',$request->input('product'))
            ->where('Unit','=',$request->input('unit'))
            ->where('Cost','=',$request->input('cost'))
            ->where('Price','=',$request->input('price'))
            ->where('Category','=',$request->input('category'))
            ->where('shopID','=','0')
            ->first();
        if($item == NULL){
            $table = new \App\itemKeep;
            $table->Product = $request->input('product');
            $table->Unit = $request->input('unit');
            $table->Cost = $request->input('cost');
            $table->Price = $request->input('price');
            $table->Category = $request->input('category');
            $table->Quantity = $request->input('quantity');
            $table->shopID = 0;
            $table->save();
            return $this->show();
        }   
        else{
           \DB::table('itemkeep')
           ->where('Product','=',$request->input('product'))
            ->where('Unit','=',$request->input('unit'))
            ->where('Cost','=',$request->input('cost'))
            ->where('Price','=',$request->input('price'))
            ->where('Category','=',$request->input('category'))
            ->increment('Quantity',$request->input('quantity'));
           return $this->show();
        }
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
            ->where('shopID','=','0')
            ->get();
        return view('showItem', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

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
        return $this->show();
    }
}
