<?php

namespace App\Http\Controllers;

<<<<<<< HEAD

use Validator;
=======
use Auth;
use Session;
>>>>>>> c5849905ba63c6ea06d54ff40586a53df771ba54
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
<<<<<<< HEAD
        $this->validate($request,[
=======
        $this->validate($request, [
>>>>>>> c5849905ba63c6ea06d54ff40586a53df771ba54
            'product' => 'required|string',
            'unit' => 'required|string',
            'cost' => 'required|integer',
            'price' => 'required|integer',
<<<<<<< HEAD
            'quantity' => 'required|integer',
        ]);
=======
        ]);

        $request->session()->forget('Noitem');
>>>>>>> c5849905ba63c6ea06d54ff40586a53df771ba54
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
            $table->Product = $request   ->input('product');
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
<<<<<<< HEAD
           ->where('Product','=',$request->input('product'))
            ->where('Unit','=',$request->input('unit'))
            ->where('Cost','=',$request->input('cost'))
            ->where('Price','=',$request->input('price'))
            ->where('Category','=',$request->input('category'))
            ->increment('Quantity',$request->input('quantity'));
=======
                ->where('Product','=',$request->input('product'))
                ->where('Unit','=',$request->input('unit'))
                ->where('Cost','=',$request->input('cost'))
                ->where('Price','=',$request->input('price'))
                ->where('Category','=',$request->input('category'))
                ->increment('Quantity',$request->input('quantity'));
            
>>>>>>> c5849905ba63c6ea06d54ff40586a53df771ba54
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
<<<<<<< HEAD
    public function edit(Request $request)
    {
        \DB::table('itemkeep')
            ->where('itemID','=','5')
            ->update(['Product' => $request->input('product')]);
        \DB::table('itemkeep')
            ->where('itemID','=','5')
            ->update(['Unit' => $request->input('unit')]);
        \DB::table('itemkeep')
            ->where('itemID','=','5')
            ->update(['Cost' => $request->input('uost')]);
        \DB::table('itemkeep')
            ->where('itemID','=','5')
            ->update(['Price' => $request->input('urice')]);
        \DB::table('itemkeep')
            ->where('itemID','=','5')
            ->update(['Category' => $request->input('category')]);
        \DB::table('itemkeep')
            ->where('itemID','=','5')
            ->update(['Quantity' => $request->input('quantity')]);
        return redirect('/allItem');
    }
=======
>>>>>>> c5849905ba63c6ea06d54ff40586a53df771ba54

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
            ->where('itemID','=',$id->input('ID'))
            ->delete();
        return redirect('/allItem');
    }
<<<<<<< HEAD

    public function search(Request $search){
        $temp = \DB::table('itemkeep')
            ->where('Product','REGEXP','.*'.$search->input('search').'.*')
            ->get();
        return view('showItem', ['item' => $temp]);
    }

    public function calcat(){
        $Assessories  = \DB::table('itemkeep')
            ->select('shopID','Quantity','shopID')
            ->where('Category','=','Assessories')
            ->where('shopID','=','0')
            ->get();
        $Beverages  = \DB::table('itemkeep')
            ->select('shopID','Quantity','shopID')
            ->where('Category','=','Beverages')
            ->where('shopID','=','0')
            ->get();
        $Book  = \DB::table('itemkeep')
            ->select('shopID','Quantity','shopID')
            ->where('Category','=','Book')
            ->where('shopID','=','0')
            ->get();
        $Cosmetic = \DB::table('itemkeep')
            ->select('shopID','Quantity','shopID')
            ->where('Category','=','Cosmetic')
            ->where('shopID','=','0')
            ->get();
        $DairyProduct  = \DB::table('itemkeep')
            ->select('shopID','Quantity','shopID')
            ->where('Category','=','DairyProduct')
            ->where('shopID','=','0')
            ->get();
        $Electronic  = \DB::table('itemkeep')
            ->select('shopID','Quantity','shopID')
            ->where('Category','=','Electronic')
            ->where('shopID','=','0')
            ->get();
        $Groceries  = \DB::table('itemkeep')
            ->select('shopID','Quantity','shopID')
            ->where('Category','=','Groceries')
            ->where('shopID','=','0')
            ->get();
        $Phamaceuticals  = \DB::table('itemkeep')
            ->select('shopID','Quantity','shopID')
            ->where('Category','=','Phamaceuticals')
            ->where('shopID','=','0')
            ->get();
        $Snack  = \DB::table('itemkeep')
            ->select('shopID','Quantity','shopID')
            ->where('Category','=','Snack')
            ->where('shopID','=','0')
            ->get();
        $Tobacco  = \DB::table('itemkeep')
            ->select('shopID','Quantity','shopID')
            ->where('Category','=','Tobacco')
            ->where('shopID','=','0')
            ->get();

        $ToyGames  = \DB::table('itemkeep')
            ->select('shopID','Quantity','shopID')
            ->where('Category','=','ToyGames')
            ->where('shopID','=','0')
            ->get();

        $n = array(
            'Assessories'  => 0,
            'Beverages' => 0,
            'Book' => 0,
            'Cosmetic' => 0,
            'DairyProduct' => 0,
            'Electronic' => 0,
            'Groceries' => 0,
            'Phamaceuticals' => 0,
            'Snack' => 0,
            'Tobacco' => 0,
            'ToyGames' => 0,
        );
          
        foreach ($Assessories as $Assessories){
            $n['$Assessories'] += $Assessories->Quantity;
        }
        foreach ($Beverages as $Beverages){
            $n['Beverages'] += $Beverages->Quantity;
        }
        foreach ($Book as $Book){
            $n['Book'] += $Book->Quantity;
        }
        foreach ($Cosmetic as $Cosmetic){
            $n['Cosmetic'] += $Cosmetic->Quantity;
        }
        foreach ($DairyProduct as $DairyProduct){
            $n['DairyProduct'] += $DairyProduct->Quantity;
        }
        foreach ($Electronic as $Electronic){
            $n['Electronic'] += $Electronic->Quantity;
        }
        foreach ($Groceries as $Groceries){
            $n['Groceries'] += $Groceries->Quantity;
        }
        foreach ($Phamaceuticals as $Phamaceuticals){
            $n['Phamaceuticals'] += $Phamaceuticals->Quantity;
        }
        foreach ($Snack as $Snack){
            $n['Snack'] += $Snack->Quantity;
        }
        foreach ($Tobacco as $Tobacco){
            $n['Tobacco'] += $Tobacco->Quantity;
        }
        foreach ($ToyGames as $ToyGames){
            $n['ToyGames'] += $ToyGames->Quantity;
        }
        $item = \DB::table('itemkeep')
            ->where('shopID','=','0')
            ->get();
        return view('showItem', ['n' => $n,'item' => $item]);
=======
    public function check(Request $request)
    {
         $item = \DB::table('itemkeep')
            ->where('shopID','=',Auth::user()->shopid)
            ->get();
        return view('checkstock',['item' => $item]);
        
    }
    public function profit(Request $request)
    {
        $items = \DB::table('itemkeep')
            ->where('shopID','=',Auth::user()->shopid)
            ->get();
        foreach ($items as $item) {
            $table = new \App\profit;
            $table->itemID = $request->input($item->ID);
            $table->shopID = Auth::user()->shopid;
            $table->profit = $request->input('sold'.$item->ID)*$item->Price;
            $table->sold = $request->input('sold'.$item->ID);
            $table->save();
            \DB::table('itemkeep')
                ->where('ID','=',$request->input($item->ID))
                ->update(['Quantity' => $item->Quantity - $request->input('sold'.$item->ID)]);
        } 
        return redirect('/allItem');
>>>>>>> c5849905ba63c6ea06d54ff40586a53df771ba54
    }
}
