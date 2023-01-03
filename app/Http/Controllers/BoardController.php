<?php

namespace App\Http\Controllers;

use App\Board;
use App\Board_com;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function boardPage()
    {
        $top = Board::where('gallery', 'on')->orderBy('date', 'desc')->take(5)->get();
        $bottom = Board::orderBy('date', 'desc')->get();

        return view('board.board', compact(['top', 'bottom']));
    }

    public function boardViewPage($id)
    {

        $board = Board::find($id);

        return view('board.view', compact('board'));
    }

    public function boardCom(Request $request)
    {
        if(!auth()->user()) return back()->withErrors('로그인 한 유저만 작성가능');
        if(!$request->contents) return back()->withErrors('댓글을 입력하세요');

        $input = [
            'contents' =>$request->contents,
            'user_id' => Auth()->user()->id,
            'board_id' => $request->board_id,
        ];
        Board_com::create($input);
        return back()->withErrors('작성성공');
    }
}
