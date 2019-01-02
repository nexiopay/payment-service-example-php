# Plugin: Getting Started

## Dependencies
* PHP 5.* up
* phpeeclib 1.0.13 up (RSA encryption is needed in client side tokenization sample)

## Getting Started
1. Clone this repository
	> git clone [https://github.com/transactionplatform/payment-service-example-php.git](https://github.com/transactionplatform/payment-service-example-php.git)

2. Go to your location of the source directory
	> cd payment-service-example-php

3. Go to location of the source directory and compy example.config.php and save it as config.php.
	> cp example.config.php config.php

4. Update the following variables in config.php
	* **$apiurl** (The Transaction Platform Api https://api.transactionplatform.com/)
	* **$merchantID** (The merchant id assigned to you from CMS)
	* **$username** (Your [dashboard.transactionplatform.com](https://dashboard.transactionplatform.com/) username)
	* **$password** (Your [dashboard.transactionplatform.com](https://dashboard.transactionplatform.com/) password)
	* **$tokenex_token** (Your [dashboard.transactionplatform.com](https://dashboard.transactionplatform.com/) tokenex_token)

	If you have questions about any of these variables please contact us via the [Transaction Platform Support Slack Channel](https://transactionplatform.slack.com).

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
	1. A successful Credit Card transaction or eCheck transaction need be made first.
	
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
