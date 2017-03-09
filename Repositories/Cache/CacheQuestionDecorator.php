<?php

namespace Modules\Faq\Repositories\Cache;

use Modules\Faq\Repositories\QuestionRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheQuestionDecorator extends BaseCacheDecorator implements QuestionRepository
{
    public function __construct(QuestionRepository $question)
    {
        parent::__construct();
        $this->entityName = 'faq.questions';
        $this->repository = $question;
    }
}
