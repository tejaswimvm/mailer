<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}
use OpenApi\Annotations as OA;

/**
 * @OA\OpenApi(
 *      @OA\Info(
 *          version="1.0.0",
 *          title={SITE_NAME},
 *          description={SITE_DESCRIPTION}
 *      ),
 *      @OA\Server(
 *          description={SITE_DESCRIPTION},
 *          url={API_URL}
 *      ),
 *      @OA\ExternalDocumentation(
 *          description="API Docs",
 *          url="https://api-docs.mailwizz.com"
 *      )
 *  )
 */
class OpenApiSpec
{
}
