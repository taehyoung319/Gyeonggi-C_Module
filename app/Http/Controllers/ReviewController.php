<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function reviewAction(Request $request)
    {

        if(!$request->tag) return back()->withErrors('태그는 반드시 하나 이상 선택되어야 합니다 =,');
        $input = $request->validate([
            'contents' => 'required',
            'score' => 'required',
        ],
        [
            'contents.required'=> '필수 값입니다.',
            'score.required'=> '필수 값입니다.',
        ]);


        $input['user_id'] = Auth()->user()->id;
        $input['garden_id'] = $request->garden_id;
        $input['reserve_id'] = $request->reserve_id;
        $input['file_name'] = base_path('images/review') . '/' . time() . '.' . $request->file->extension();
        Review::create($input);

        return redirect(url()->previous())->withErrors('리뷰 작성 성공');
    }
}
