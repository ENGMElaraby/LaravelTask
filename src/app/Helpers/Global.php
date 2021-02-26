<?php
if (!function_exists('assetFile')) {

    /**
     * AssetFile Function check which direction design (rtl, ltr)
     *
     * @param string $url
     * @return string
     */
    function assetFile(string $url): string
    {
        return asset(lang() . '/' . $url);
    }
}

if (!function_exists('lang')) {

    /**
     * determine which language use
     *
     * @return string
     */
    function lang(): string
    {
        if (session()->has('language')) {
            return session()->get('language');
        } else {
            return config('app.locale');
        }
    }
}
