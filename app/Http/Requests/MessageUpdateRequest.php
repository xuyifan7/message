<?php

namespace App\Http\Requests;

class MessageUpdateRequest extends YyfRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required|max:40|string',
            'content'=>'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '请输入标题|-16',
            'title.max:40' => '标题长度过长|-17',
            'content.required' => '请输入留言内容|-18',
            'content.max:255' => '留言内容过长|-19',
        ];
    }

/*    protected function failedValidation(Validator $validator)
    {
        if(strpos($validator->getMessageBag()->first(),'|') > 0){
            list($message, $code) = explode("|", $validator->getMessageBag()->first());
            throw new HttpResponseException($this->fail($message,$code));
        }else {
            $message = $validator->getMessageBag()->first();
            throw new HttpResponseException($message);
        }
    }

    protected function fail($code,  $errors) : JsonResponse{
        return response()->json(
            [
                'code' => $code,
                'errors' => $errors
            ]
        );
    }*/
}
