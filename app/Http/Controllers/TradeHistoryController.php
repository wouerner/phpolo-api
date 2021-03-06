<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TradeHistory;
use Illuminate\Support\Facades\DB;

class TradeHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return TradeHistory::all();
    }

    public function currencies()
    {
        $return = [];
        $currencies = DB::table('tradeHistory')->select('pair')->groupBy('pair')->get();
        foreach($currencies as $c) {
            $return[] = $c->pair;
        }
        return $return;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $pair
     * @return \Illuminate\Http\Response
     */
    public function show($pair, $category,$type,$from,$to )
    {
        /* var_dump($pair, $category,$type,$from,$to);die; */
        $tradeHistory = DB::table('tradeHistory')
            ->where('pair', $pair)
            ->where('category', $category)
            ->where('type', $type)
            ->where('date', '>=', $from)
            ->where('date', '<=', $to)
            ->get();
        /* foreach($currencies as $c) { */
        /*     $return[] = $c->pair; */
        /* } */
        /* return ['teste']; */
        return $tradeHistory;
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
    public function destroy($id)
    {
        //
    }
}
