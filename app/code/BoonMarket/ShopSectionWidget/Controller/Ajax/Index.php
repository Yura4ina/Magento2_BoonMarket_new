<?php
declare(strict_types=1);

namespace BoonMarket\ShopSectionWidget\Controller\Ajax;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\CsrfAwareActionInterface;
use Magento\Framework\App\Request\InvalidRequestException;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Data\Form\FormKey\Validator;

class Index implements HttpPostActionInterface, CsrfAwareActionInterface
{
    /**
     * @var JsonFactory
     */
    private JsonFactory $resultJsonFactory;

    /**
     * @var Validator
     */
    private Validator $formKeyValidator;

    /**
     * Index constructor.
     * @param JsonFactory $resultJsonFactory
     * @param Validator $formKeyValidator
     */
    public function __construct(
        JsonFactory $resultJsonFactory,
        Validator $formKeyValidator
    ) {
        $this->formKeyValidator = $formKeyValidator;
        $this->resultJsonFactory = $resultJsonFactory;
    }

    /**
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
        $result = $this->resultJsonFactory->create();

//        if ($this->getRequest()->isAjax()) {
//            $catId = $this->getRequest()->getParam('catId', []);
//            $newProducts = $this->ajaxProductGenerator->getAjaxProductsById($catId);
//            $result->setData(['output' => $newProducts]);
//        }
        $result->setData(['output' => 'Hello ajax']);

        return $result;

    }

    /**
     * @inheritDoc
     */
    public function createCsrfValidationException(RequestInterface $request): ?InvalidRequestException
    {
        $resultJson = $this->resultJsonFactory->create();
        $resultJson->setData(
            [
                'success' => false,
                'message' => (string)__('Invalid Form Key. Please refresh the page.')
            ]
        );

        return new InvalidRequestException(
            $resultJson,
            [__('Invalid Form Key. Please refresh the page.')]
        );
    }

    /**
     * @inheritDoc
     */
    public function validateForCsrf(RequestInterface $request): ?bool
    {
        return $this->formKeyValidator->validate($request);
    }
}
