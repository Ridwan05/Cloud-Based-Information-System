<?php


if (!function_exists('carbon')) {
    /**
     * Create \Carbon\Carbon dateTime object
     * 
     * @param string $dateTime
     * @param bool $returnNullIfInvalid
     * @return \Carbon\Carbon|bool
     */
    function carbon($dateTime = null, $returnFalseIfInvalid = false, $africaLagosTimeZone = false)
    {
        try {
            $timezone = $africaLagosTimeZone ? (new DateTimeZone('Africa/Lagos')) : null;
            return new \Carbon\Carbon($dateTime, $timezone);
        } catch (\Carbon\Exceptions\InvalidFormatException $e) {
            return $returnFalseIfInvalid ? false : new \Carbon\Carbon();
        }
    }
}

if (!function_exists('carbon_ng')) {
    /**
     * Create \Carbon\Carbon dateTime object in Africa/Lagos timezone
     * 
     * @param string $dateTime
     * @return \Carbon\Carbon|bool
     */
    function carbon_ng($dateTime = null)
    {
        return carbon($dateTime, false, true);
    }
}

if (!function_exists('formatDateValue')) {

    /**
     * Check if string value is valid date
     * 
     * @param string $dateValue
     * @param string $dateFormat
     * @return string|null
     */
    function formatDateValue(string $dateValue, string $dateFormat = 'Y-m-d'): ?string
    {
        if (empty($dateValue)) {
            return null;
        }

        try {
            return carbon_ng($dateValue)->format($dateFormat);
        } catch (\Exception $e) {}

        return null;
    }
}

if (!function_exists('authUserIsAdmin')) {

    /**
     * Determine if an admin user is logged in
     * 
     * @return bool
     */
    function authUserIsAdmin(): bool
    {
        return auth()->check() && !empty(auth()->user()->is_admin);
    }
}

if (!function_exists('isAuthUser')) {

    /**
     * Determine if indicated user is the current authenticated user
     *
     * @param \App\Models\User $user
     * @return boolean
     */
    function isAuthUser($user): bool
    {
        if (
            !isset($user->id)
            || !auth()->check()
        ) {
            return false;
        }

        return auth()->id() == $user->id;
    }
}