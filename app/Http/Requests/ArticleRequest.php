<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     * 确定用户是否有权做出此请求。
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * 该请求的过滤规则
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required|min:6|max:200',
            'content'=>'required|min:16',
        ];
    }

    /*
     * 该请求验证的错误提示
     *
     */
    public function messages()
    {
        return [
            'title.required'=>'标题不能为空',
            'title.min'=>'标题不能少于6个字符',
            'content.required'=>'内容不能为空',
            'content.min'=>'内容不能少于16个字符',
        ];
    }
}
