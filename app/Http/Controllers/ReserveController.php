<?php

namespace App\Http\Controllers;

use App\Garden;
use App\Reserve;
use App\Stop;
use Illuminate\Http\Request;
use function GuzzleHttp\Psr7\str;

class ReserveController extends Controller
{
    public function reserveSignPage($id)
    {
        if(!auth()->user()) return back()->withErrors('로그인 후 접근 가능합니다.');
        $data = Garden::find($id);

        return view('reserve.sign', compact('data'));
    }

    public function reserveChk(Request $request)
    {
        if(!$request->start_dt || !$request->person || $request->start_dt <= date('Y-m-d')) {
            return '0';
        }

        $stop = Stop::where('garden_id', $request->garden_id)->where('date', $request->start_dt)->get();
        if($stop->count() >= 1) {
            return '1';
        }

        return 2;
    }

    public function reserveSignAction(Request $request)
    {
        $stop = Stop::where('garden_id', $request->garden_id)->where('date', $request->start_dt)->get();
        if($stop->count() >= 1) {
            return back()->withErrors('예약이 불가합니다.');
        }

        $input = [
            'user_id' => Auth()->user()->id,
            'garden_id' => $request->garden_id,
            'person' => $request->person,
            'money' => $request->money,
            'start_dt' => $request->start_dt,
        ];
        Reserve::create($input);

        return redirect(route('reserveListPage'))->with('msg', '성공적으로 예약하였습니다.');
    }

    public function reserveListPage()
    {
        if(auth()->user()->type =='user') {
            $reserve = Reserve::where('user_id', Auth()->user()->id)->where('start_dt', '>', date('Y-m-d'))->where('state', 'visit')->get();

            $stop1 = Reserve::where('user_id', Auth()->user()->id)->where('start_dt', '>=', date('Y-m-d'))->where('state', 'cancel')->get();
            $stop2 = Reserve::where('user_id', Auth()->user()->id)->where('start_dt', '<', date('Y-m-d'))->get();
            $stop = [...$stop1, ...$stop2];
        }else{
            $reserve = Reserve::where('garden_id', Auth()->user()->garden_id)->get();
            $stop = Stop::where('garden_id', Auth()->user()->garden_id)->get();
        }

        return view('reserve.list', compact(['reserve', 'stop']));
    }

    public function reserveCancel(Request $request)
    {
        if(auth()->user()->type == 'user') {
            $date = Reserve::find($request->id);
            $week = date('Y-m-d', strtotime($date->start_dt. '-7 day'));
            if($week < date('Y-m-d')) return back()->withErrors('예약 취소가 불가능합니다.');

            $date->update(['state' => 'cancel']);

        }else{
            $date = Reserve::find($request->id);
            $date->update(['state' => 'cancel']);
        }

        return back()->withErrors('예약을 취소했습니다.');
    }

    public function reserveStop(Request $request)
    {
        $data = Stop::where('garden_id', Auth()->user()->garden_id)->where('date', $request->date);
        if($data->count() == 1) {
            $data->delete();
        }else{
            $input = [
                'garden_id' => Auth()->user()->garden_id,
                'date' => $request->date,
            ];
            Stop::create($input);
        }

        return back()->withErrors('성공적으로 설정하였습니다');
    }


}
