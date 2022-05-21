<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExchangeRequest;
use App\Models\Exchange;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $from = $request->query('from');
//        $to = $request->query('to');
//        $amount = $request->query('amount');
        $qparam = $request->all();
        $from = $qparam['from'];
        $to = $qparam['to'];
        $amount = $qparam['amount'];

        $API_KEY = env('FIXER_API_KEY');
        $apiResponse = Http::withHeaders([
            'apikey' => $API_KEY,
        ])->get('https://api.apilayer.com/fixer/convert?to='.$to.'&from='.$from.'&amount='.$amount);

        $response = $apiResponse->json();

        if ( $response !== null && $response['success'] === true) {

            $new['from_currency'] = $response['query']['from'];
            $new['to_currency'] = $response['query']['to'];
            $new['rate'] = $response['info']['rate'];
            $new['amount'] = $response['query']['amount'];
            $new['result'] = $response['result'];
            $new['date'] = $response['date'];

            Exchange::create($new);

            return $response;
        }else{
            return $response;
        }

        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return "crete DIMA";
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
        return "store DIMA";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function show(Exchange $exchange)
    {
        //
        return "show DIMA";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function edit(Exchange $exchange)
    {
        //
        return "edit DIMA";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exchange $exchange)
    {
        //
        return "update DIMA";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exchange $exchange)
    {
        //
        return "destroy DIMA";
    }
}
