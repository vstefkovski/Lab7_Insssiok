<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Repositories\PostRepository;
use App\Models\Post;

class PostController extends Controller
{
    protected $postRepo;

    public function __construct(PostRepository $postRepo)
    {
        $this->postRepo = $postRepo;
    }

    public function index()
    {
        $posts = $this->postRepo->all();
        return PostResource::collection($posts);
    }

    public function store(StorePostRequest $request)
    {
        $post = $this->postRepo->create($request->validated());
        return new PostResource($post);
    }

    public function show($id)
    {
        $post = $this->postRepo->find($id);
        return new PostResource($post);
    }

    public function update(UpdatePostRequest $request, $id)
    {
        $post = $this->postRepo->find($id);
        $post = $this->postRepo->update($post, $request->validated());
        return new PostResource($post);
    }

    public function destroy($id)
    {
        $post = $this->postRepo->find($id);
        $this->postRepo->delete($post);
        return response()->json(['message' => 'Post deleted successfully']);
    }
}

