<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BoxStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'recipe_ids' => ['required', 'array', 'min:1', 'max:4'],
            'recipe_ids.*' => ['required', 'integer', 'exists:recipes,id'],
            'delivery_date' => ['required', 'date_format:Y-m-d', 'after:' . $this->getDateFormat('Y-m-d'), 'before:' . $this->getDateFormat('Y-m-d', date('Y-m-d'))],
        ];
    }

    /**
     * @param string $format
     * @param null $date
     * @return string
     */
    private function getDateFormat(string $format, $date = null): string
    {
        if (!$date) {
            return date($format);
        }

        return date($format, strtotime("+3 day", strtotime($date)));
    }
}
