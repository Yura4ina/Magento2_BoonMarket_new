<?php
declare(strict_types=1);

namespace BoonMarket\Newsletters\Plugin;

use Exception;
use Magento\Framework\App\Request\Http;
use Magento\Newsletter\Model\ResourceModel\Subscriber as SubscriberResource;
use Magento\Newsletter\Model\Subscriber;

class SubscribeFirstName
{
    /**
     * @var Http
     */
    private Http $request;

    /**
     * @var SubscriberResource
     */
    private SubscriberResource $resource;

    /**
     * @param Http $request
     * @param SubscriberResource $resource
     */
    public function __construct(
        Http $request,
        SubscriberResource $resource
    ) {
        $this->request = $request;
        $this->resource = $resource;
    }

    /**
     * @param Subscriber $subject
     * @param callable $proceed
     * @return mixed
     * @throws Exception
     */
    public function aroundSendConfirmationSuccessEmail(Subscriber $subject, callable $proceed)
    {
        $firstname = $this->request->getParam('firstname');

        if ($this->request->isPost() && $firstname) {
            $subject->setCFirstname($firstname);

            try {
                $this->resource->save($subject);
            } catch (Exception $exception) {
                throw new Exception($exception->getMessage());
            }
        }

        return $proceed($this->request->getParam('email'));
    }
}
