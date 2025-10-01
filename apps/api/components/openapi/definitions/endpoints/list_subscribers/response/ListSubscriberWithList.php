<?php declare(strict_types=1);


use OpenApi\Annotations as OA;

/**
 * Class ListSegment
 *
 * @OA\Schema(
 *     schema="ListSubscriberWithList",
 *     type="object",
 *     description="List subscriber model with list details",
 *     title="List subscriber model with list details",
 *     allOf={@OA\Schema(ref="#/components/schemas/ListSubscriber")}
 * )
 */
class ListSubscriberWithList extends ListSubscriber
{
    /**
     * @OA\Property(
     *     property="list",
     *     description="The list of the subscriber",
     *     title="Subscriber list",
     *     type="object",
     *     @OA\Property(
     *         property="list_uid",
     *     ),
     *     @OA\Property(
     *          property="display_name",
     *      ),
     *     @OA\Property(
     *          property="name",
     *      )
     * )
     *
     * @var string
     */
    public $list;
}
