# Perfect Money For OpenCart Extension v1.0
**If you are installing the extenion via OpenCart extension installer, please simply download PerfectMoneyExtension4OpenCart2.ocmod.zip and upload it to your opencart extension installer. **

# Table of Contents
* [Compatibility](#compatibility)
* [File Structure](#file-structure)
* [Installation](#installation)
* [Administration](#administration)
* [Testing and Troubleshooting](#test-and-troubleshooting)
* [Sources and Credits](#sources-and-credits)

# <a name="compatibility"></a>Compatibity
This extension has been tested with following versions for OpenCart:
-2.0.0.0
-2.0.1.0
-2.0.1.1

# <a name="file-structure"></a>File Structure
This extension includes model, view, controller and language files to meet OpenCart's MVCL architecture. The files included with this extension do not overwrite or change any file of default OpenCart. The extension includes only English language but you are free to add any other language by following the strings collections of language files. The extension includes files for administration and catalog. Find below the list of core files included with this extension.

- dmin/controller/payment/perfectmoney.php
- admin/language/english/payment/perfectmoney.php
- admin/view/template/payment/perfectmoney.tpl
- admin/view/image/payment/perfectmoney.png
- catalog/controller/payment/perfectmoney.php
- catalog/language/english/payment/perfectmoney.php
- catalog/model/payment/perfectmoney.php
- catalog/view/theme/default/template/payment/perfectmoney.tpl

# <a name="installation"></a>Installation
With the introduction of Extension Installer in OpenCart 2, we have two ways to install this extension. You are free to go with any one of these methods.

The first method is the classical one. Copy the files/directories in upload folder of this extension, and paste/upload it to root folder of the OpenCart, where the first index.php of OpenCart along with admin and catalog folder is available. This method is recommended for OpenCart v2.0.1.0 because of FTP issues.

The second method is the modern one. You will utilize the new OpenCart's Extension Installer. To use Extension Installer for this extension, you must set-up the FTP first. You can set-up the FTP in "Administration >> System >> Setting >> FTP", if you have not done it already. After the FTP is set-up, simply go to the Extension Installer of OpenCart and upload the file with ocmod.zip extension in this extension.

After installation, you can access this extension in "Administration >> Extensions >> Payments >> Perfect Money".

# <a name="administration"></a>administration
You can access the administration of this extension in "Administration >> Extensions >> Payments >> Perfect Money". You can install or un-install it here like other payment methods available in OpenCart. The extension will not work after installation unless you provide information about your Perfect Money account. To do so, click on blue Edit button in front of Perfect Money in payments list of OpenCart. Image below shows the administration of this extension.
![alt tag]()
Each input field of this extension's administration is explained below.

√ Your Perfect Money Account: This is a required field. It is the Perfect Money account number to which, you as a merchant, want to receive payment of sales. You can find your Perfect Money account number in your Perfect Money account. Each Perfect Money account is provided with 3 account numbers for 3 different currencies. They start with 'U' for USD, 'E' for EUR, and 'G' for Gold. You can use any one of these. One thing must be taken care of is Gold account number. Gold currency is not already available in OpenCart. If you want to use Gold account, you must add Gold currency with its code as 'OAU' in OpenCart. However, you can use EUR or USD account without any extra work. NOTE: Perfect money account number and Perfect Money member ID are not same.

√ Your Account Alternate Passphrase:This is a required field. A passphrase is a secret string. When you create an account on Perfect Money, it is not set by default. You have to choose one by logging into your Perfect Money account and then navigating to 'Settings' page. Find below the screenshot of settings page to set-up your passphrase.
![alt tag]()


#<a name="test-and-troubleshooting"></a>Testing and Troubleshooting
Once all required information are provided in administration of this extension, Perfect Money will be made available as payment method at your online shop. If you are unable to see Perfect Money as payment method during checkout process, it will be one of following reasons.

√ The extension is not installed yet. You must install it by clicking at red 'Install' button in OpenCart's payment methods' list.
√ You have not provided required information in this extension's administration.
√ The minimum amount is more than cart's total.
√ The maximum amount is less than cart's total.
√ The extension's status is 'Disabled' in administration.

To make sure that you have provided correct information, it is recommended that you make a test purchase. You can create a product with price of 0.01USD and can buy it with same Perfect Money account for merchant and customer. This was a suggested method for testing in Perfect Money SCI documentation. Of course, you will not lose any money as 0.01USD will be back to your account without deduction of any fee.

In case of wrong information, you will see an error at first step of Perfect Money's payment page that will point you to actual mistake. After a successful test purchase, you are good to go. A successful purchase is the one in which you are able to see the newly placed order in order list of administration or customer.

#<a name="sources-and-credits"></a>Sources and Credits
This extension does not include any third party library or file. The extension was written on the basis of documentation 'Perfect Money SCI 2.0' provided by Perfect Money.

