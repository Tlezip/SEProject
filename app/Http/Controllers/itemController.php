<?php

namespace App\Http\Controllers;


use Validator;
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
        $this->validate($request,[
            'product' => 'required|string',
            'unit' => 'required|string',
            'cost' => 'required|integer',
            'price' => 'required|integer',
        ]);
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
            $table->Product = $request   ->input('product');
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
    public function edit(Request $request)
    {
        \DB::table('itemkeep')
            ->where('ID','=','5')
            ->update(['Product' => $request->input('product')]);
        \DB::table('itemkeep')
            ->where('ID','=','5')
            ->update(['Unit' => $request->input('unit')]);
        \DB::table('itemkeep')
            ->where('ID','=','5')
            ->update(['Cost' => $request->input('uost')]);
        \DB::table('itemkeep')
            ->where('ID','=','5')
            ->update(['Price' => $request->input('urice')]);
        \DB::table('itemkeep')
            ->where('ID','=','5')
            ->update(['Category' => $request->input('category')]);
        \DB::table('itemkeep')
            ->where('ID','=','5')
            ->update(['Quantity' => $request->input('quantity')]);
        return $this->show();
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

        //echo "$n['Assessories']$n['Beverages']$n['Book']$n['Cosmetic']$n['DairyProduct']$n['Electronic']$n['Groceries']['Phamaceuticals']$n['Snack']$n['Tobacco']$n['ToyGames']";   
        //echo $n['Assessories']."\n".$n['Beverages'];
        $item = \DB::table('itemkeep')
            ->where('shopID','=','0')
            ->get();
        return view('showItem', ['n' => $n,'item' => $item]);
    }
   // public function test(){
    //    $t = $this->calcat();
    //    echo $t['Book'];
   // }
}
