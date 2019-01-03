# Plugin: Getting Started

## Dependencies
* PHP 5.* up
* phpeeclib 1.0.13 up (RSA encryption is needed in client side tokenization sample)

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
	* **$username** (Your [dashboard.transactionplatform.com](https://dashboard.transactionplatform.com/) username)
	* **$password** (Your [dashboard.transactionplatform.com](https://dashboard.transactionplatform.com/) password)
	* **$tokenex_token** (Your [dashboard.transactionplatform.com](https://dashboard.transactionplatform.com/) tokenex_token)

	If you have questions about any of these variables please contact us via the [Nexio Integrations Support Slack Channel](https://nexiointegrations.slack.com).


5. Then start your Web Server and launch sample in your browser:
	> http://localhost/payment-service-example-php/payment_CreditCardTransaction.php

	* This script will run a credit card transaction. 

## Sample: Client Side Tokenization
1. Copy Nexio public key into 'payment-service-example-php' folder. 
	* in this sample, the public key file is named nexiopub.key

2. Launch the sample in your browser:
	> http://localhost/payment-service-example-php/ClientSideToken/Client-Side-Token.php
	* The sample will print out the result of the transaction.

## Sample: Payment Service iFrame
### Credit Card Transaction
	1. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/iframe_CreditCardTransaction.php
	* The sample includes sample of requesting one time token, it calls GetTokenCreditCard.php
	
	2. The iframe is now embedded in this website and can be used to process a transaction.

### Save Card 
	1. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/iframe_SaveCard.php
	* The sample includes sample of requesting one time token, it calls GetTokenSaveCard.php
	
	2. The iframe is now embedded in this website and can be used to process a transaction.

### Alipay Transaction
	1. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/iframe_AlipayTransaction.php
	* The sample includes sample of requesting one time token, it calls GetTokenAlipay.php
	
	2. The iframe is now embedded in this website and can be used to process a transaction.

### Save eCheck 
	1. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/iframe_SaveECheck.php
	* The sample includes sample of requesting one time token, it calls GetTokenSaveECheck.php
	
	2. The iframe is now embedded in this website and can be used to process a transaction.

### eCheck Transaction
	1. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/iframe_eCheckTransaction.php
	* The sample includes sample of requesting one time token, it calls GetTokenECheck.php
	
	2. The iframe is now embedded in this website and can be used to process a transaction.

## Sample: Payment Service
### Save Card
	1. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/payment_SaveCard.php
	* The sample will print out the result of the transaction.
	* The token in transaction response will be written into translist.json for Delete Token using
	
### Credit Card Transaction
	1. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/payment_CreditCardTransaction.php
	* The sample will print out the result of the transaction.
	* The token in transaction response will be written into translist.json for other API using, like Void, Refund, Capture, Get Transaction by original Id etc.

### eCheck Transaction
	1. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/payment_eCheckTransaction.php
	* The sample will print out the result of the transaction.
	* The token in transaction response will be written into translist.json or other API using, like Void, Refund, Get Transaction by transaction Id etc.

### Void Transaction
	1. A successful Credit Card transaction or eCheck transaction need be made first.
	
	2. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/payment_VoidTransaction.php
	* The sample will print out the result of the transaction.
	
### Refund Transaction
	1. A successful Credit Card transaction or eCheck transaction need be made first.
	
	2. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/payment_RefundTransaction.php
	* The sample will print out the result of the transaction.

### Capture Transaction
	1. A successful Credit Card transaction need be made first.
	
	2. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/payment_CaptureTransaction.php
	* The sample will print out the result of the transaction.

### Delete Tokens
	1. A successful Save Card transaction need be made first.
	
	2. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/payment_DeleteTokens.php
	* The sample will print out the result of the transaction.
	* This sample only delete one token, but actaully multi tokens deleting is supported.

## Sample: Transaction Service
### Transaction(Using Transaction Id)
	1. A successful Transactions need be made first.
	
	2. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/transaction_GetTransWithId.php
	* The sample will print out the result of the transaction.

### Transaction
	1. A successful Transactions need be made first.
	
	2. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/transaction_GetTrans.php
	* The sample will print out the result of the transaction.

### Matching Transaction For FDR Chargeback
	1. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/transaction_MatchTransForFDR.php
	* The sample will print out the result of the transaction.

### Transaction Count
	1. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/transaction_TransactionCount.php
	* The sample will print out the result of the transaction.	
	
### Daily Transaction Summary
	1. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/transaction_DailyTransSummary.php
	* The sample will print out the result of the transaction.	

### Transaction Total
	1. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/transaction_TransactionTotal.php
	* The sample will print out the result of the transaction.		

### Transaction Summary
	1. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/transaction_TransactionSummary.php
	* The sample will print out the result of the transaction.	

### Payment Types
	1. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/transaction_PaymentTypes.php
	* The sample will print out the result of the transaction.	

### Search Transaction
	1. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/transaction_SearchTransaction.php
	* The sample will print out the result of the transaction.		
	* This sample does not include any query parameter, but actually, user can pass their own search condition with name 'search'.

### Transactions
	1. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/transaction_Transactions.php
	* The sample will print out the result of the transaction.	
	* The first transaction record in response will be written into translist.json for later using, like Transaction, Refund, Void, Capture, Bulk Void and Bulk Capture.

### Refund Transaction
	1. A successful Transactions need be made first.
	
	2. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/transaction_RefundTransaction.php
	* The sample will print out the result of the transaction.
	* The id use in this sample is the id in response of Transactions (transaction-Transactions.php).

### Void Transaction
	1. A successful Transactions need be made first.
	
	2. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/transaction_VoidTransaction.php
	* The sample will print out the result of the transaction.
	* The id use in this sample is the id in response of Transactions (transaction-Transactions.php).

### Capture Transaction
	1. A successful Transactions need be made first.
	
	2. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/transaction_CaptureTransaction.php
	* The sample will print out the result of the transaction.
	* The id use in this sample is the id in response of Transactions (transaction-Transactions.php).

### Bulk Void Transaction
	1. A successful Transactions need be made first.
	
	2. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/transaction_BulkVoid.php
	* The sample will print out the result of the transaction.
	* The id use in this sample is the id in response of Transactions (transaction-Transactions.php).

### Bulk Capture Transaction
	1. A successful Transactions need be made first.
	
	2. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/transaction_BulkCapture.php
	* The sample will print out the result of the transaction.
	* The id use in this sample is the id in response of Transactions (transaction-Transactions.php).
=======
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

