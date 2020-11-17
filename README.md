# Nexio Payment Service PHP Example
This repository contains an example integration with Nexio's 
[E-commerce](https://docs.nexiopay.com#e-commerce-header) payment service, written in PHP.

If you have any questions, please see our [documentation](https://docs.nexiopay.com)
or contact [integration support](nexiointegrations.slack.com).

## Dependencies
* PHP 5.* up
* phpseclib 1.0.13 up (RSA encryption is needed in client-side tokenization example)

## Getting Started
1. Clone this repository
	> git clone [https://github.com/nexiopay/payment-service-example-php.git](https://github.com/nexiopay/payment-service-example-php.git)

2. Go to your location of the source directory
	> cd payment-service-example-php

3. Go to location of the source directory and copy `example.config.php`. Save it as `config.php`.
	> cp example.config.php config.php

4. Update the following variables in `config.php`
	* **$apiurl**: (The Nexio API URL)
	    - Sandbox: https://api.nexiopaysandbox.com/
	    - Live: https://api.nexiopay.com/
	* **$username** (Your [dashboard.naxiopay.com](https://dashboard.naxiopay.com/) username)
	* **$password** (Your [dashboard.naxiopay.com](https://dashboard.naxiopay.com/) password)
	
5. Save a [card token](#save-card-token) and an [e-check token](#e-check-token).
Update the following variables in `config.php`
    * **$card_token** (A Nexio [card token](https://docs.nexiopay.com#save-card-token))
	* **$echeck_token** (A Nexio [e-check token](https://docs.nexiopay.com#save-e-check-token))

## Examples
Once you have completed the steps listed in [Getting Started](#getting-started), you are ready to run any of the following examples.
### Payment Service
#### API Examples
##### Save Card Token
1. Launch the example in your browser:
    > php -S localhost:8000 payment_SaveCard.php
* The example will print out the card token.
	
##### Run Card Transaction
1. [Save a card token](#save-card-token)
2. Update the `$echeck_token` in `config.php`
3. Launch the example in your browser:
    > php -S localhost:8000 payment_CreditCardTransaction.php
* The example will print out the result of the transaction.
* The payment ID and amount will be saved in `translist.json`.
You can use the payment ID to [void](#void-transaction) or [refund](#refund-transaction) the transaction.
If the transaction was an [auth-only](#authorize-transaction),
you may use the payment ID to [capture](#capture-transaction) the transaction.

##### Save E-check Token
1. Launch the example in your browser:
    > php -S localhost:8000 payment_SaveECheck.php
* The example will print out the e-check token.

##### E-check Transaction 
1. [Save an e-check token](#save-e-check-token)
2. Update the `$echeck_token` in `config.php`
3. Launch the example in your browser:
    > php -S localhost:8000 payment_eCheckTransaction.php
* The example will print out the result of the transaction.
* The payment ID and amount will be saved in `translist.json`.
You can use the payment ID to [void](#void-transaction) or [refund](#refund-transaction) the transaction.
If the transaction was an [auth-only](#authorize-transaction),
you may use the payment ID to [capture](#capture-transaction) the transaction.

##### Void Transaction
1. Run a [card transaction](#run-card-transaction)
2. Launch the example in your browser:
    > php -S localhost:8000 payment_VoidTransaction.php
* This example will void the transaction that was run in **step 1**.
(Note that if you run another example in between steps 1 and 2, the void request may fail.)
A successful response will include transaction information and a `transactionStatus` of `voided`.
	
##### Refund Transaction
1. Run a [card transaction](#run-card-transaction)
2. Launch the example in your browser:
    > php -S localhost:8000 payment_RefundTransaction.php
* This example will refund the transaction that was run in **step 1**.
(Note that if you run another example in between steps 1 and 2, the refund request may fail.)
A successful response will include transaction information and a `transactionType` of `refund`.

##### Capture Transaction
1. Run an auth-only [card transaction](#run-card-transaction)
    - To run an auth-only transaction, set the parameter `isAuthOnly` to `true`.
    (This is the default setting in the card transaction example.)
2. Launch the example in your browser:
    > php -S localhost:8000 payment_CaptureTransaction.php
* This example will capture the transaction that was run in **step 1**.
(Note that if you run another example in between steps 1 and 2, the capture request may fail.)

##### Delete Tokens
1. Save a [card token](#save-card-token)
2. Launch the example in your browser:
    > php -S localhost:8000 payment_DeleteTokens.php
* This example only deletes one token, but note that you may also delete multiple tokens simultaneously.

## Example: Client Side Tokenization
1. Copy Nexio public key into 'payment-service-example-php' folder. 
* In this example, the public key file is named nexiopub.key
2. Launch the example in your browser:
	> http://localhost/payment-service-example-php/ClientSideToken/Client-Side-Token.php
* The example will print out the result of the transaction.

## Iframe Examples
### Run Credit Card Transaction
1. Launch the example in your browser:
    > http://localhost/payment-service-example-php/iframe_CreditCardTransaction.php
* The example includes example of requesting one-time-use token, it calls GetTokenCreditCard.php

2. The iframe is now embedded in this website and can be used to process a transaction.

### Save Card Token
	1. Launch the example in your browser:
	> http://localhost/payment-service-example-php/iframe_SaveCard.php
	* The example includes example of requesting one-time-use token, it calls GetTokenSaveCard.php
	
	2. The iframe is now embedded in this website and can be used to process a transaction.

### Alipay Transaction
	1. Launch the example in your browser:
	> http://localhost/payment-service-example-php/iframe_AlipayTransaction.php
	* The example includes example of requesting one time token, it calls GetTokenAlipay.php
	
	2. The iframe is now embedded in this website and can be used to process a transaction.

### Save E-check Token
	1. Launch the example in your browser:
	> http://localhost/payment-service-example-php/iframe_SaveECheck.php
	* The example includes example of requesting one time token, it calls GetTokenSaveECheck.php
	
	2. The iframe is now embedded in this website and can be used to process a transaction.

### Run E-check Transaction
	1. Launch the example in your browser:
	> http://localhost/payment-service-example-php/iframe_eCheckTransaction.php
	* The example includes example of requesting one time token, it calls GetTokenECheck.php
	
	2. The iframe is now embedded in this website and can be used to process a transaction.

## Transaction Service Examples
The follow examples show how to request [transaction data](https://docs.nexiopay.com/#transactions-header)
using the [Reporting Service](https://docs.nexiopay.com/#reporting-api-reference).


### Get Transaction (Using Transaction Id)
	1. A successful transaction must be made first.
	
	2. Launch the example in your browser:
	> http://localhost/payment-service-example-php/transaction_GetTransWithId.php
	* The example will print out the result of the transaction.

### Transaction
	1. A successful transaction must be made first.
	
	2. Launch the example in your browser:
	> http://localhost/payment-service-example-php/transaction_GetTrans.php
	* The example will print out the result of the transaction.

### Matching Transaction For FDR Chargeback
	1. Launch the example in your browser:
	> http://localhost/payment-service-example-php/transaction_MatchTransForFDR.php
	* The example will print out the result of the transaction.

### Transaction Count
	1. Launch the example in your browser:
	> http://localhost/payment-service-example-php/transaction_TransactionCount.php
	* The example will print out the result of the transaction.	
	
### Daily Transaction Summary
	1. Launch the example in your browser:
	> http://localhost/payment-service-example-php/transaction_DailyTransSummary.php
	* The example will print out the result of the transaction.	

### Transaction Total
	1. Launch the example in your browser:
	> http://localhost/payment-service-example-php/transaction_TransactionTotal.php
	* The example will print out the result of the transaction.		

### Transaction Summary
	1. Launch the example in your browser:
	> http://localhost/payment-service-example-php/transaction_TransactionSummary.php
	* The example will print out the result of the transaction.	

### Payment Types
	1. Launch the example in your browser:
	> http://localhost/payment-service-example-php/transaction_PaymentTypes.php
	* The example will print out the result of the transaction.	

### Search Transaction
	1. Launch the example in your browser:
	> http://localhost/payment-service-example-php/transaction_SearchTransaction.php
	* The example will print out the result of the transaction.		
	* This example does not include any query parameter, but actually, user can pass their own search condition with name 'search'.

### Transactions
	1. Launch the example in your browser:
	> http://localhost/payment-service-example-php/transaction_Transactions.php
	* The example will print out the result of the transaction.	
	* The first transaction record in response will be written into translist.json for later using, like Transaction, Refund, Void, Capture, Bulk Void and Bulk Capture.

### Refund Transaction
	1. A successful transaction must be made first.
	
	2. Launch the example in your browser:
	> http://localhost/payment-service-example-php/transaction_RefundTransaction.php
	* The example will print out the result of the transaction.
	* The id use in this example is the id in response of Transactions (transaction-Transactions.php).

### Void Transaction
	1. A successful transaction must be made first.
	
	2. Launch the example in your browser:
	> http://localhost/payment-service-example-php/transaction_VoidTransaction.php
	* The example will print out the result of the transaction.
	* The id use in this example is the id in response of Transactions (transaction-Transactions.php).

### Capture Transaction
	1. A successful transaction must be made first.
	
	2. Launch the example in your browser:
	> http://localhost/payment-service-example-php/transaction_CaptureTransaction.php
	* The example will print out the result of the transaction.
	* The id use in this example is the id in response of Transactions (transaction-Transactions.php).

### Bulk Void Transaction
	1. A successful transaction must be made first.
	
	2. Launch the example in your browser:
	> http://localhost/payment-service-example-php/transaction_BulkVoid.php
	* The example will print out the result of the transaction.
	* The id use in this example is the id in response of Transactions (transaction-Transactions.php).

### Bulk Capture Transaction
	1. A successful transaction must need be made first.
	
	2. Launch the example in your browser:
	> http://localhost/payment-service-example-php/transaction_BulkCapture.php
	* The example will print out the result of the transaction.
	* The id use in this example is the id in response of Transactions (transaction-Transactions.php).
