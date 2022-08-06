<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateBlogAPIRequest;
use App\Http\Requests\Admin\BulkUpdateBlogAPIRequest;
use App\Http\Requests\Admin\CreateBlogAPIRequest;
use App\Http\Requests\Admin\UpdateBlogAPIRequest;
use App\Http\Resources\Admin\BlogCollection;
use App\Http\Resources\Admin\BlogResource;
use App\Repositories\BlogRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class BlogController extends AppBaseController
{
    /**
     * @var BlogRepository
     */
    private BlogRepository $blogRepository;

    /**
     * @param BlogRepository $blogRepository
     */
    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    /**
     * Blog's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return BlogCollection
     */
    public function index(Request $request): BlogCollection
    {
        $blogs = $this->blogRepository->fetch($request);

        return new BlogCollection($blogs);
    }

    /**
     * Create Blog with given payload.
     *
     * @param CreateBlogAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return BlogResource
     */
    public function store(CreateBlogAPIRequest $request): BlogResource
    {
        $input = $request->all();
        $blog = $this->blogRepository->create($input);

        return new BlogResource($blog);
    }

    /**
     * Get single Blog record.
     *
     * @param int $id
     *
     * @return BlogResource
     */
    public function show(int $id): BlogResource
    {
        $blog = $this->blogRepository->findOrFail($id);

        return new BlogResource($blog);
    }

    /**
     * Update Blog with given payload.
     *
     * @param UpdateBlogAPIRequest $request
     * @param int                  $id
     *
     * @throws ValidatorException
     *
     * @return BlogResource
     */
    public function update(UpdateBlogAPIRequest $request, int $id): BlogResource
    {
        $input = $request->all();
        $blog = $this->blogRepository->update($input, $id);

        return new BlogResource($blog);
    }

    /**
     * Delete given Blog.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->blogRepository->delete($id);

        return $this->successResponse('Blog deleted successfully.');
    }

    /**
     * Bulk create Blog's.
     *
     * @param BulkCreateBlogAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return BlogCollection
     */
    public function bulkStore(BulkCreateBlogAPIRequest $request): BlogCollection
    {
        $blogs = collect();

        $input = $request->get('data');
        foreach ($input as $key => $blogInput) {
            $blogs[$key] = $this->blogRepository->create($blogInput);
        }

        return new BlogCollection($blogs);
    }

    /**
     * Bulk update Blog's data.
     *
     * @param BulkUpdateBlogAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return BlogCollection
     */
    public function bulkUpdate(BulkUpdateBlogAPIRequest $request): BlogCollection
    {
        $blogs = collect();

        $input = $request->get('data');
        foreach ($input as $key => $blogInput) {
            $blogs[$key] = $this->blogRepository->update($blogInput, $blogInput['id']);
        }

        return new BlogCollection($blogs);
    }
}
