
# Modern File Manager 
### Preview
![enter image description here](https://lh3.googleusercontent.com/fp3G7h753BwVZowR1sOZwwpT13u2k1VOD1lZqhTxnFVG4ejYT-sE-N1bd2gYxo5AjDZLlZjoezo5MkQFrpTZhAsraepgMciI0M0sjd5Oao7SYFvLveIewGSvYvZzVIuFbJqpVPinDnN7c31u6ytprgZzQ8GQHancfemlj39oQUS8HpZbjbTIRzsP3EoEkuLdj6H3xcTC5swDfZMWo_xEGGT3kJcRgp5ubjOkpuYDsOV-dD2zznewp8SLyJyV87UBNsz4af_F6uz54S4mdw2OjWLSNkAJxl50hZTtKZommpjhsgGYU1zQrbZMpCqPoAiQzotgw8vm_6sFuNujCPiB22w5CF5MkAbI-6vBkVhWxPheR_1RQnruHtGmgqKlRQ_yhYhxlpYpFqYTAUr3VnQOVlA3NFATwYicokDJUJj0dDjM0dpVPd597ZExk-Ztfh_tuYy7RRq2aiVzKCyvvZHt4yMo4vJvB51KislxtmfjjH_vnx8QB4QbTE67HqP69B-eM_2Pg-mRl0mlcukOZB3Jl-hCc7SMDqKg0JQ1eKjNQ9r7i-EXt4gHryA1eTzHrCZg5fJKJiCRWODIgiG8TgZQ6R_QjYDPnMWwZvUkuKEr17cZTQT53yCJ1CvWFKA-JeJV1VMagb1YBV-b-ASrehtOs-2tYGpQEAL3mG5cmohBeMhYxXp4q8P23dJciPm-N7k=w2520-h1339-ft) 
### Installation  
In your terminal of choice run these two commands:  
````  
composer require maze/modern-file-manager  
php artisan vendor:publish --tag=public --force  
````  
### Usage  
To use this package you have to do two things:  
  
 **1. Create the MFM Object**  
  Use the Object at the top of your controller file  
````  
 use MAZE\MFM\Models\MFM;  
````  
Add the following in your function  
````  
$path = str_replace('-', '/', 'path/to/main-directory);  
$mfm = new MFM($path);  
return view('example-view', ['mfm'=>$mfm]);  
````  
 **2. Include the blade view**  
  
Add the following in your view  
````  
@include("mfm::includable", ['mfm'=>$mfm])  
````  
  
### Features  
This package is a wip, here's what I've done so far and what I plan to add.  
- [x] Directory Tree  
- [x] Top Bar buttons (not functional)  
- [x] File box view  
- [ ] File list view  
- [ ] Create Files/Folders  
- [ ] Edit Files/Folders  
- [ ] Upload Files  
- [ ] Download Files  
- [ ] Compress Files  
- [ ] Uncompress Files  
- [ ] Copy/Paste/Cut/Delete Files/Folders  
- [ ]  Rename Files/Folders
