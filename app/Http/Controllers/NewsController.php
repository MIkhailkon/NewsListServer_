<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsFormRequest;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * @OA\Get(
     *  path="/api/news",
     *  operationId="getNews",
     *  summary="get all news",
     *
     *  @OA\Response(response="200",
     * description = "success"
     *  )
     * )
     */
    public function index()
    {
        return News::orderBy('created_at','desc')->get();
    }

    /**
     * @OA\Post (
     *  path="/api/news",
     *  operationId="storeNews",
     *  summary="store one news",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="text",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="author",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="tags",
     *                     type="array",
     *                     @OA\Items(type="string")
     *                 ),
     *             )
     *         )
     *     ),
     *  @OA\Response(
     *   response="200",
     *   description = "success"
     *  ),
     *  @OA\Response(
     *   response="422",
     *   description = "Invalid data"
     *  ),
     *  @OA\Response(
     *   response="500",
     *   description = "bad request"
     *  )
     * )
     */
    public function store(NewsFormRequest $request)
    {
        $status = News::create($request->all());
        return response($status);
    }

    /**
     * @OA\Get(
     *  path="/api/news/{news}",
     *  operationId="getOneNews",
     *  summary="get all news",
     *
     * @OA\Parameter(
     *     name="news",
     *     description="News id",
     *     required=true,
     *     in="path",
     *     @OA\Schema(
     *         type="integer"
     *     )
     * ),
     *
     *  @OA\Response(response="200",
     *   description = "success"
     *  )
     * )
     */
    public function show($news)
    {
        return News::findOrFail($news);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\News $news
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(NewsFormRequest $request, News $news)
    {
        $news->update($request->all());
        return response()->json($news);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\News $news
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(News $news)
    {
        if ($news->delete()) {
            return response(null, 204);
        }
    }
}
