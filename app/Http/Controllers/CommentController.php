<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\CommentRepository;
use App\Contracts\Repositories\RatingRepository;
use App\Http\Requests\Users\CommentRequest;
use App\Models\Comment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    public $commentRepository;
    public $ratingRepository;

    public function __construct(
        CommentRepository $commentRepository,
        RatingRepository $ratingRepository
    ) {
        $this->commentRepository = $commentRepository;
        $this->ratingRepository = $ratingRepository;
    }

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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        try {
            DB::beginTransaction();

            $this->commentRepository->create(
                [
                    'user_id' => Auth::user()->id,
                    'product_id' => $request->product_id,
                    'content' => $request->content,
                ]
            );

            $this->ratingRepository->create(
                [
                    'user_id' => Auth::user()->id,
                    'product_id' => $request->product_id,
                    'vote' => $request->vote,
                ]
            );

            DB::commit();

            return redirect()->back();
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Comment      $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
