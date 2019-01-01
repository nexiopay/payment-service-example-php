# Plugin: Getting Started

## Dependencies
* PHP 5.* up

## Getting Started
1. Clone this repository
	> git clone [https://github.com/nexiopay/payment-service-example-php.git](https://github.com/nexiopay/payment-service-example-php.git)

2. Go to your location of the source directory
	> cd payment-service-example-php

3. Go to location of the source directory and copy example.config.php. Save it as config.php.
	> cp example.config.php config.php

4. Update the following variables in config.php
	* **$apiurl** (The Nexio Api https://api.nexiopay.com/)
	* **$merchantID** (The merchant id assigned to you from CMS)
	* **$username** (Your [dashboard.nexiopay.com](https://dashboard.nexiopay.com/) username)
	* **$password** (Your [dashboard.nexiopay.com](https://dashboard.nexiopay.com/) password)

	If you have questions about any of these variables please contact us via the [Nexio Integrations Support Slack Channel](https://nexiointegrations.slack.com).

5. Then launch in your browser:
	> http://localhost/payment-service-example-php/get_jwt.php

	* This script will output the authorization tokens. One of these is idToken or the JWT which will be used in the next step to create a one time use token. The other is called refreshToken and will be use to refresh the JWT.
	* Note in our example this script will automatically save values to $JWT and $refreshToken variables in the config.php file which will be used in the next steps.

6. Also note that idToken or the JWT expires after an hour. We provided a way to refresh your JWT. To do so, launch in your browser:
	> http://localhost/payment-service-example-php/refresh_jwt.php

	* Note that in our example this script will automatically replace the $JWT and $refreshToken in the config.php file.

## Use the JWT to Get a One Time Use Token
1. Now that our config.php file is completely set up we are ready to open:
	> payment-service-example-php\token_request.php

2. See our [docs](https://docs.nexiopay.com/#0da80520-6ae5-4473-8051-02905c5c3d24) for more information on the data that can be sent in this request.

3. Then launch in your browser this file:
	> http://localhost/payment-service-example-php/token_request.php

4. This file will print out your one time use token. This token can be used for retrieving any of the Nexio iframes.

### Iframe Forms: Run Transaction
1. Follow the steps in the [Getting Started](#getting-started) section.

2. To load the example Run Credit Card Transaction iframe visit:  
 	> [http://localhost/payment-service-example-php/get_iframe.php](http://localhost/payment-service-example-php/get_iframe.php)

3. The iframe is now embedded in this website and can be used to process a transaction.

### Iframe Forms: Save Card
1. Follow the steps in the [Getting Started](#getting-started) section.

2. To load the example Save Card iframe visit:  
 	> [http://localhost/payment-service-example-php/save_card.php](http://localhost/payment-service-example-php/save_card.php)

3. The iframe is now embedded in this website and can be used to save a card and customer information.

### Payment Service: Run Transaction
1. Follow the steps in the [Getting Started](#getting-started) section.

2. Since our config.php file is now completely set up, open:
	> payment-service-example-php\run_transaction.php

3. See our [docs](https://docs.nexiopay.com/#86d6850f-775d-45a6-bd7b-39d5dfbd8458) for information on the required body parameters.

4. Then launch in your browser:
	> http://localhost/payment-service-example-php/run_transaction.php

### Payment Service: Refund/Void
1. Follow the steps in the [Getting Started](#getting-started) section.

2. Since our config.php file is now completely set up, open:
	> payment-service-example-php\void_transaction.php or 
	> payment-service-example-php\refund_transaction.php

3. Update the transaction reference number provided in the url: 
	* or refer here [https://docs.transactionplatform.com/#0526a0af-b129-811d-1994-7c104bbad43e](https://https://docs.transactionplatform.com/#0526a0af-b129-811d-1994-7c104bbad43e) for complete details

4. Then launch in your browser:
	> http://localhost/payment-service-example-php/void_transaction.php or
	> http://localhost/payment-service-example-php/refun_transaction.php

### Payment Service: Check Kount
1. Follow the steps in the [Getting Started](#getting-started) section.

2. Since our config.php file is now completely setup then open:
	> payment-service-example-php\check_kount.php

3. Check or review the following data required in the data query parameters:  
	* merchantId (string)
	* card.cardHolderName (string)
	* card.lastFour (string)
	* tokenex.token (string)
	* data.amount (string)
	* or refer here [https://docs.transactionplatform.com/#17dfc88f-6b6e-9de6-02f9-549bab5337b9](https://docs.transactionplatform.com/#17dfc88f-6b6e-9de6-02f9-549bab5337b9) for complete details

4. Then launch in your browser:
	> http://localhost/payment-service-example-php/check_kount.php
