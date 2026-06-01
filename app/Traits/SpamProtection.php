<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait SpamProtection
{
    protected function checkSpam(Request $request): ?string
    {
        if (!empty($request->website)) {
            return 'Spam detected.';
        }

        if ($request->has('_form_token')) {
            $timestamp = (int) decrypt($request->_form_token);
            if (time() - $timestamp < 2) {
                return 'Please wait a moment before submitting.';
            }
        }

        return null;
    }
}
