<?php

namespace Modules\Faq\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateFaqRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }
    
    public function translationRules()
    {
        return [
            'question' => 'required',
            'answer' => 'required'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    
}
