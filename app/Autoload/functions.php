<?php 
use App\Models\Option;
use App\Models\User;
use Carbon\Carbon;

if (!function_exists('badge')) {
    /**
     *  print badge
     * @param string $status
     * @return array
     */
    function badge($status)
    {
    	return $classes = [
    		0 => ['class' => 'badge-danger', 'text' => 'Rejected'],
    		1 => ['class' => 'badge-success', 'text' => 'Accepted'],
    		2 => ['class' => 'badge-danger', 'text' => 'Pending'],
    		'pending' => ['class' => 'badge-warning'],
    		'delivered' => ['class' => 'badge-success'],
    		'rejected' => ['class' => 'badge-danger'],
    	][$status];
    }

}

if (!function_exists('amount_format')) {
    /**
     *  format amount
     * @param string $amount
     * @param string $icon_type
     * @return string
     */
    function amount_format($amount=0, $icon_type = 'name')
    {
    	$currency = get_option('base_currency',true);
    	if ($icon_type == 'name') {
    		$currency = $currency->position == 'right' ? $currency->name.' '.number_format($amount,2)  :  number_format($amount,2).' '.$currency->name;
    	}
    	elseif ($icon_type == 'both') {
    		$currency = $currency->icon.number_format($amount,2).' '.$currency->name;
    	}
    	else{
    		$currency = $currency->position == 'right' ? number_format($amount,2).$currency->icon : $currency->icon.number_format($amount,2);
    	}

    	return $currency;
    }

}

if (!function_exists('get_option')) {
    /**
     * Get Settings From Database
     * @param $key
     * @param bool $decode
     * @param $locale
     * @return mixed
     */
    function get_option($key, bool $decode = false, $locale = false, $associative = false): mixed
    {
        if ($locale == true) {
           $cacheKey = $key.$locale;
        }
        else{
            $cacheKey = $key;
        }

        $cacheKey = 
    	$option = cache_remember($cacheKey, function () use ($key, $locale) {
    		$row= Option::query();
    		if ($locale != false) {
    			$row= $row->where('lang',current_locale());
    		}	
    		return  $row = $row->where('key',$key)->first();

    	});

    	return $decode ? json_decode($option->value ?? '') : $option->value ?? null;
    }
}

if (!function_exists('cache_remember')) {
    /**
     * This function will remember the cache
     * @param string $key
     * @param callable $callback
     * @param integer $ttl
     * @return mixed
     */
    function cache_remember(string $key, callable $callback, int $ttl = 1800): mixed
    {
    	return cache()->remember($key, env('CACHE_LIFETIME', $ttl), $callback);
    }
}

if (!function_exists('current_locale')) {
    /**
     * Get Current Locale
     * Return current locale|lang
     * @return string|null
     */
    function current_locale()
    {
    	return app()->getLocale();
    }
}

if (!function_exists('filterXss')) {
    /**
     * filter script code
     * @param $string
     */
function filterXss($string=''){

    $string = str_replace('</script>', "", $string);
    $string = str_replace('<script>', "", $string);

    return $string;
}

}
