# Nexio Payment Service PHP Example
This repository contains an example integration with Nexio's 
[E-commerce](https://docs.nexiopay.com#e-commerce-header) payment service, written in PHP.

If you have any questions, please see our [documentation](https://docs.nexiopay.com)
or contact [integration support](nexiointegrations.slack.com).

## Dependencies
* PHP 5.* up
* phpseclib 1.0.13 up (RSA encryption is needed in client-side tokenization sample)
-- We're missing a dependency. these commands don't work http://localhost/payment-service-example-php/ClientSideToken/Client-Side-Token.php

## Getting Started
1. Clone this repository
	> git clone [https://github.com/nexiopay/payment-service-example-php.git](https://github.com/nexiopay/payment-service-example-php.git)

2. Go to your location of the source directory
	> cd payment-service-example-php

3. Go to location of the source directory and copy example.config.php. Save it as config.php.
	> cp example.config.php config.php

4. Update the following variables in config.php
	* **$apiurl**: (The Nexio API URL)
	    - Sandbox: https://api.nexiopaysandbox.com/
	    - Live: https://api.nexiopay.com/
	* **$username** (Your [dashboard.naxiopay.com](https://dashboard.naxiopay.com/) username)
	* **$password** (Your [dashboard.naxiopay.com](https://dashboard.naxiopay.com/) password)
	* **$tokenex_token** (A Nexio [card token](https://docs.nexiopay.com#save-card-token). You may leave this variable blank for now.)

TODO: -- Reorder examples. They won't have a tokenex token yet, so they should save a card before running transaction. 
- Redo the examples: to use php -S http://localhost:8000 router.php https://stackoverflow.com/questions/1678010/php-server-on-local-machine
- Create a simple router as shown in the link above ^
- try and organize the filenames into folders better.. Maybe save that for later.

## Run Examples

5. Start your web server and launch sample in your browser:
	> http://localhost/payment-service-example-php/payment_CreditCardTransaction.php

	* This script will run a credit card transaction. 

## Example: Client Side Tokenization
1. Copy Nexio public key into 'payment-service-example-php' folder. 
	* in this sample, the public key file is named nexiopub.key

2. Launch the sample in your browser:
	> http://localhost/payment-service-example-php/ClientSideToken/Client-Side-Token.php
	* The sample will print out the result of the transaction.

## Iframe Examples
### Run Credit Card Transaction
	1. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/iframe_CreditCardTransaction.php
	* The sample includes sample of requesting one-time-use token, it calls GetTokenCreditCard.php
	
	2. The iframe is now embedded in this website and can be used to process a transaction.

### Save Card Token
	1. Launch the sample in your browser:
	> http://localhost/payment-service-example-php/iframe_SaveCard.php
	* The sample includes sample of requesting one-time-use token, it calls GetTokenSaveCard.php
	
	2. The iframe is now embedded in this website and can be used to process a transaction.

### Alipay Transaction
	1. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/iframe_AlipayTransaction.php
	* The sample includes sample of requesting one time token, it calls GetTokenAlipay.php
	
	2. The iframe is now embedded in this website and can be used to process a transaction.

### Save E-check Token
	1. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/iframe_SaveECheck.php
	* The sample includes sample of requesting one time token, it calls GetTokenSaveECheck.php
	
	2. The iframe is now embedded in this website and can be used to process a transaction.

### Run E-check Transaction
	1. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/iframe_eCheckTransaction.php
	* The sample includes sample of requesting one time token, it calls GetTokenECheck.php
	
	2. The iframe is now embedded in this website and can be used to process a transaction.

## API Examples
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
	
### Check Kount
1. Follow the steps in the [Getting Started](#getting-started) section.

2. Since our config.php file is now completely setup then open:
	> payment-service-example-php\check_kount.php

3. Check or review the following data required in the data query parameters:  
	* merchantId (string)
	* card.cardHolderName (string)
	* card.lastFour (string)
	* tokenex.token (string)
	* data.amount (string)
	* or refer here [https://docs.naxiopay.com/#17dfc88f-6b6e-9de6-02f9-549bab5337b9](https://docs.naxiopay.com/#17dfc88f-6b6e-9de6-02f9-549bab5337b9) for complete details

4. Then launch in your browser:
	> http://localhost/payment-service-example-php/check_kount.php



## Transaction Service Examples
The follow examples show how to request [transaction data](https://docs.nexiopay.com/#transactions-header)
using the [Reporting Service](https://docs.nexiopay.com/#reporting-api-reference).


### Get Transaction (Using Transaction Id)
	1. A successful transaction must be made first.
	
	2. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/transaction_GetTransWithId.php
	* The sample will print out the result of the transaction.

### Transaction
	1. A successful transaction must be made first.
	
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
	1. A successful transaction must be made first.
	
	2. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/transaction_RefundTransaction.php
	* The sample will print out the result of the transaction.
	* The id use in this sample is the id in response of Transactions (transaction-Transactions.php).

### Void Transaction
	1. A successful transaction must be made first.
	
	2. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/transaction_VoidTransaction.php
	* The sample will print out the result of the transaction.
	* The id use in this sample is the id in response of Transactions (transaction-Transactions.php).

### Capture Transaction
	1. A successful transaction must be made first.
	
	2. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/transaction_CaptureTransaction.php
	* The sample will print out the result of the transaction.
	* The id use in this sample is the id in response of Transactions (transaction-Transactions.php).

### Bulk Void Transaction
	1. A successful transaction must be made first.
	
	2. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/transaction_BulkVoid.php
	* The sample will print out the result of the transaction.
	* The id use in this sample is the id in response of Transactions (transaction-Transactions.php).

### Bulk Capture Transaction
	1. A successful transaction must need be made first.
	
	2. Launch the sample in your brower:
	> http://localhost/payment-service-example-php/transaction_BulkCapture.php
	* The sample will print out the result of the transaction.
	* The id use in this sample is the id in response of Transactions (transaction-Transactions.php).
