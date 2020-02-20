# Modern File Manager
### Installation
In your terminal of choice run these two commands:
   

     composer require maze/modern-file-manager
     php artisan vendor:publish --tag=public --force

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
