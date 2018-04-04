# Paytabs Laravel

## Installation
Begin by installing this package through Composer. Just run following command to terminal-

```php
composer require maq89/paytabs-laravel
```

Once this operation completes, the final step is to add the service provider. Open config/app.php, and add a new item to the providers array.
```php
'providers' => [
	...
	Damas\Paytabs\PaytabsServiceProvider::class,
],
```

Now add the alias.

```php
'aliases' => [
	...
	'Paytabs' => Damas\Paytabs\Facades\PaytabsFacade::class,
],
```


## Example:
### Create Payment Page:
```php
Route::get('/paytabs_payment', function () {
    $pt = Paytabs::getInstance("MERCHANT_EMAIL", "SECRET_KEY");
	$result = $pt->create_pay_page(array(
		"merchant_email" => "MERCHANT_EMAIL",
		'secret_key' => "SECRET_KEY",
		'title' => "John Doe",
		'cc_first_name' => "John",
		'cc_last_name' => "Doe",
		'email' => "customer@email.com",
		'cc_phone_number' => "973",
		'phone_number' => "33333333",
		'billing_address' => "Juffair, Manama, Bahrain",
		'city' => "Manama",
		'state' => "Capital",
		'postal_code' => "97300",
		'country' => "BHR",
		'address_shipping' => "Juffair, Manama, Bahrain",
		'city_shipping' => "Manama",
		'state_shipping' => "Capital",
		'postal_code_shipping' => "97300",
		'country_shipping' => "BHR",
		"products_per_title"=> "Mobile Phone",
		'currency' => "BHD",
		"unit_price"=> "10",
		'quantity' => "1",
		'other_charges' => "0",
		'amount' => "10.00",
		'discount'=>"0",
		"msg_lang" => "english",
		"reference_no" => "1231231",
		"site_url" => "https://your-site.com",
		'return_url' => "https://www.mystore.com/paytabs_api/result.php",
		"cms_with_version" => "API USING PHP"
	));
    
    	if($result->response_code == 4012){
	    return redirect($result->payment_url);
        }
        return $result->result;
});
```
### Verify Payment:
```php
Route::post('/paytabs_response', function(Request $request){
    $pt = Paytabs::getInstance("MERCHANT_EMAIL", "SECRET_KEY");
    $result = $pt->verify_payment($request->payment_reference);
    if($result->response_code == 100){
        // Payment Success
    }
    return $result->result;
});

you will need to exclude your paytabs_response route from CSRF protection

```
