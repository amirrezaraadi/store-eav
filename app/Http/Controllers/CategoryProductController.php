<?php

namespace App\Http\Controllers;

use App\Models\Panel\CategoryProduct;
use App\Repository\Category\categoryProductRepo;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    /**
     * @OA\Info(
     *             title="API Clientes",
     *             version="1.0",
     *             description="Mostando la Lista de URI's de mi API"
     * )
     *
     * @OA\Server(url="127.0.0.1:8000")
     */

    public function __construct(public CategoryProductRepo $category_product)
    {
    }
    /**
     * index category-product
     * @OA\Get (
     *     path="/api/panel/category-product",
     *     tags={"category-product"},
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 type="array",
     *                 property="rows",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(
     *                         property="id",
     *                         type="number",
     *                         example="1"
     *                     ),
     *                     @OA\Property(
     *                         property="name",
     *                         type="string",
     *                         example="my name amirreza"
     *                     ),
     *                      @OA\Property(
     *                         property="slug",
     *                         type="string",
     *                          example="my-name-amirreza"
     *                     ),
     *                      @OA\Property(
     *                         property="image",
     *                         type="string",
     *                         example="httpp://localhost:8000/public/image/category_product/"
     *                     ),
     *                  @OA\Property(
     *                         property="content",
     *                         type="string",
     *                         example="Aderson Felix my name amirrezaaaa"
     *                     ),
     *                  @OA\Property(
     *                         property="status",
     *                         type="string",
     *                         example="suyccess"
     *                     ),
     *                  @OA\Property(
     *                         property="parent_id",
     *                         type="number",
     *                         example="1"
     *                     ),
     *                     @OA\Property(
     *                         property="created_at",
     *                         type="string",
     *                         example="2023-02-23T00:09:16.000000Z"
     *                     ),
     *                     @OA\Property(
     *                         property="updated_at",
     *                         type="string",
     *                         example="2023-02-23T12:33:45.000000Z"
     *                     )
     *                 )
     *             )
     *         )
     *     )
     * )
     */

    public function index()
    {
        return $category_product = $this->category_product->index();
    }
    /**
     *store category products
     *
     * @OA\Post (
     *     path="\api\panel\category-product",
     *     tags={"category_product"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="name",
     *                          type="string",
     *                          example="LG"
     *                      ),
     *                      @OA\Property(
     *                          property="content",
     *                          type="string",
     *                          example="lg gold brand"
     *                      ),
     *                      @OA\Property(
     *                          property="image",
     *                          type="string",
     *                          example="download.png"
     *                      ),
     *                       @OA\Property(
     *                          property="show_in_menu",
     *                          type="boolean",
     *                          example="1"
     *                      ),
     *                      @OA\Property(
     *                         property="parent_id",
     *                         type="number",
     *                         example="1"
     *                     ),
     *                 ),
     *
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="CREATED",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="name", type="string", example="Aderson Felix"),
     *              @OA\Property(property="slug", type="string", example="Jara Lazaro"),
     *              @OA\Property(property="content", type="string", example="Jara Lazaro"),
     *              @OA\Property(property="image", type="string", example="Jara Lazaro"),
     *              @OA\Property(property="show_in_menu", type="boolean", example="Jara Lazaro"),
     *              @OA\Property(property="parent_id", type="number", example="Jara Lazaro"),
     *              @OA\Property(property="created_at", type="string", example="2023-02-23T00:09:16.000000Z"),
     *              @OA\Property(property="updated_at", type="string", example="2023-02-23T12:33:45.000000Z")
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="UNPROCESSABLE CONTENT",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="name", type="string", example="The name field is required."),
     *              @OA\Property(property="slug", type="string", example="title uinique valid"),
     *              @OA\Property(property="content", type="string", example="The content field is required."),
     *              @OA\Property(property="image", type="string", example="The image field is required."),
     *              @OA\Property(property="message", type="string", example="The apellidos field is required."),
     *              @OA\Property(property="errors", type="string", example="Objeto de errores"),
     *          )
     *      )
     * )
     *
     */

    public function store(Request $request)
    {
        // todo image
        $this->category_product->create($request);
        return response()->json(['message' => 'success store', 'status' => 'success'], 200);
    }


    /**
     * GET category-produc
     * @OA\Get (
     *     path="/api/panel/category-product/{id}",
     *     summary="Get information",
     *     description="Get information from the API",
     *     tags={"CategoryProduct"},
     *     @OA\Parameter(
     *         name="name",
     *         in="query",
     *         example="Ali",
     *         description="Provider name",
     *         required=true,
     *        @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="name", type="string", example="show Aderson Felix"),
     *              @OA\Property(property="slug", type="string", example="show Jara Lazaro"),
     *              @OA\Property(property="content", type="string", example="show Jara Lazaro"),
     *              @OA\Property(property="image", type="string", example="show Jara Lazaro"),
     *              @OA\Property(property="show_in_menu", type="boolean", example="show Jara Lazaro"),
     *              @OA\Property(property="parent_id", type="number", example="show Jara Lazaro"),
     *              @OA\Property(property="created_at", type="string", example="2023-02-23T00:09:16.000000Z"),
     *              @OA\Property(property="updated_at", type="string", example="2023-02-23T12:33:45.000000Z")
     *         )
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="default",
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string", example="No query results for model [App\Models\Panel\CategoryProduct] #id")
     *         )
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="404",
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string", example="No query results for model [App\Models\Panel\CategoryProduct] #id")
     *         )
     *     )
     * )
     */
    public function show($categoryProduct)
    {
        return $category = $this->category_product->getFindId($categoryProduct);
    }


    public function update(Request $request, $categoryProduct)
    {
        // todo image
        $this->category_product->update($request, $categoryProduct);
        return response()->json(['message' => 'success update', 'status' => 'success'], 200);
    }


    public function destroy($categoryProduct)
    {
        $this->category_product->delete($categoryProduct);
        return response()->json(['message' => 'success delete', 'status' => 'success'], 200);
    }
}
