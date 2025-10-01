<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *      name="campaign_bounces",
 *      description="Campaigns bounces endpoint",
 *      @OA\ExternalDocumentation(
 *          description="Find out more",
 *          url="https://api-docs.mailwizz.com/#campaign-bounces"
 *      )
 *  )
 * @OA\Tag(
 *       name="campaign_delivery_logs",
 *       description="Campaigns delivery logs endpoint",
 *       @OA\ExternalDocumentation(
 *           description="Find out more",
 *           url="https://api-docs.mailwizz.com/#campaign-delivery-logs"
 *       )
 *   )
 * @OA\Tag(
 *        name="campaign_unsubscribes",
 *        description="Campaigns unsubscribes endpoint",
 *        @OA\ExternalDocumentation(
 *            description="Find out more",
 *            url="https://api-docs.mailwizz.com/#campaign-unsubscribes"
 *        )
 * )
 * @OA\Tag(
 *         name="campaigns_tracking",
 *         description="Campaigns tracking endpoint",
 *         @OA\ExternalDocumentation(
 *             description="Find out more",
 *             url="https://api-docs.mailwizz.com/#campaigns-tracking"
 *         )
 * )
 * @OA\Tag(
 *          name="campaigns",
 *          description="Campaigns endpoint",
 *          @OA\ExternalDocumentation(
 *              description="Find out more",
 *              url="https://api-docs.mailwizz.com/#campaigns"
 *          )
 *  )
 * @OA\Tag(
 *          name="countries",
 *          description="Countries endpoint",
 *          @OA\ExternalDocumentation(
 *              description="Find out more",
 *              url="https://api-docs.mailwizz.com/#countries"
 *          )
 *  )
 * @OA\Tag(
 *          name="customers",
 *          description="Customers endpoint",
 *          @OA\ExternalDocumentation(
 *              description="Find out more",
 *              url="https://api-docs.mailwizz.com/#customers"
 *          )
 *  )
 * @OA\Tag(
 *          name="delivery_servers",
 *          description="Delivery servers endpoint",
 *          @OA\ExternalDocumentation(
 *              description="Find out more",
 *              url="https://api-docs.mailwizz.com/#delivery-servers"
 *          )
 *  )
 * @OA\Tag(
 *          name="list_fields",
 *          description="List fields endpoint",
 *          @OA\ExternalDocumentation(
 *              description="Find out more",
 *              url="https://api-docs.mailwizz.com/#fields"
 *          )
 *  )
 * @OA\Tag(
 *          name="list_segments",
 *          description="List segments endpoint",
 *          @OA\ExternalDocumentation(
 *              description="Find out more",
 *              url="https://api-docs.mailwizz.com/#segments"
 *          )
 * )
 * @OA\Tag(
 *           name="list_subscribers",
 *           description="List subscribers endpoint",
 *           @OA\ExternalDocumentation(
 *               description="Find out more",
 *               url="https://api-docs.mailwizz.com/#subscribers"
 *           )
 * )
 *
 * @OA\Tag(
 *           name="lists",
 *           description="Lists endpoint",
 *           @OA\ExternalDocumentation(
 *               description="Find out more",
 *               url="https://api-docs.mailwizz.com/#lists"
 *           )
 *   )
 * @OA\Tag(
 *           name="templates",
 *           description="Email templates endpoint",
 *           @OA\ExternalDocumentation(
 *               description="Find out more",
 *               url="https://api-docs.mailwizz.com/#templates"
 *           )
 *   )
 * @OA\Tag(
 *           name="transactional_emails",
 *           description="Transactional emails endpoint",
 *           @OA\ExternalDocumentation(
 *               description="Find out more",
 *               url="https://api-docs.mailwizz.com/#transactional-emails"
 *           )
 *   )
 */
class OpenApiTags
{
}
