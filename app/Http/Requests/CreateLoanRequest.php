<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class CreateLoanRequest extends FormRequest
{
    /**@return bool */
    public function authorize(): bool
    {
        //todo temp allow for the test
        return true;
    }

    /** @return array<string, mixed> */
    public function rules(): array
    {
        return [
            'book_id' => ['required', 'integer', 'exists:books,id'],
            'member_id' => ['required', 'integer', 'exists:members,id'],
        ];
    }
}
