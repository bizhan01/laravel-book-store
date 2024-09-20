<?php
Route::get('/', 'WebController@index');

Auth::routes();
// Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

// CRUD Users Routes
Route::get('/delete/{id}','UserOperationController@destroy');
Route::get('/addUser','UserOperationController@index');
Route::get('/userList','UserOperationController@userList')->name('userList');
Route::get('/blockList','UserOperationController@blockList')->name('blockList');
Route::get('/blockUser/{id}','UserOperationController@show');
Route::get('/unBlockUser/{id}','UserOperationController@unBlock');
Route::post('/updateUserStatus/{id}', 'UserOperationController@edit')->name('updateUserStatus/{id}');
Route::get('profile', 'UserProfileController@profile')->name('profile');
Route::post('updateNameUser', 'UserProfileController@updateNameUser')->name('updateNameUser');
Route::post('updateUserImage', 'UserProfileController@updateUserImage')->name('updateUserImage');
Route::post('updateUserPass', 'UserProfileController@updateUserPass')->name('updateUserPass');

// Advertisement Section Routes
Route::get('/adv', 'AdvertisementController@index')->name('adv');
Route::get('/advertisementList','AdvertisementController@advertisementList')->name('advertisementList');
Route::post('/addAdvertisement', 'AdvertisementController@store')->name('addAdvertisement');
Route::get('/editAdvertisement/{id}','AdvertisementController@show')->name('editAdvertisement/{id}');
Route::post('/updatedAdvertisement/{id}','AdvertisementController@edit')->name('updatedAdvertisement/{id}');
Route::get('/deleteAdvertisement/{id}','AdvertisementController@destroy')->name('deleteAdvertisement/{id}');

// Product category Routes
Route::get('/category', 'CategoryController@index')->name('category');
Route::post('/addCategory', 'CategoryController@store')->name('addCategory');
Route::get('/deleteCategory/{id}','CategoryController@destroy')->name('deleteCategory/{id}');
Route::get('/editCategory/{id}','CategoryController@show')->name('editCategory/{id}');
Route::post('/editCategory/{id}','CategoryController@edit')->name('editCategory/{id}');


// Books Section Routes
Route::get('/book', 'BookController@index')->name('book');
Route::get('/addUsedBook', 'BookController@addUsedBook')->name('addUsedBook');
Route::post('/addBook', 'BookController@store')->name('addBook');
Route::get('/deleteBook/{id}','BookController@destroy')->name('deleteBook/{id}');
Route::get('/editBook/{id}','BookController@show')->name('editBook/{id}');
Route::post('/updateBook/{id}','BookController@edit')->name('updateBook/{id}');
Route::get('/details/{id}','BookController@details')->name('details/{id}');
Route::get('publicProfile/details/{id}','BookController@details')->name('details/{id}');
Route::get('/newBooks', 'BookController@newBooks')->name('newBooks');
Route::get('/usedBooks', 'BookController@usedBooks')->name('usedBooks');
Route::get('/inventory', 'BookController@inventory')->name('inventory');

// Product Section Routes
Route::get('/productList', 'ProductController@index')->name('productList');
Route::get('/newProduct', 'ProductController@newProduct')->name('newProduct');
Route::post('/addProduct', 'ProductController@store')->name('addProduct');
Route::get('/productDetails/{id}','ProductController@details')->name('productDetails/{id}');
Route::get('/deleteProduct/{id}','ProductController@destroy')->name('deleteProduct/{id}');
Route::get('/editProduct/{id}','ProductController@show')->name('editProduct/{id}');
Route::post('/updateProduct/{id}','ProductController@edit')->name('updateProduct/{id}');



// Search Section Routes
Route::post('/search', 'SearchController@search')->name('search');
Route::get('/publicProfile/{id}', 'SearchController@publicProfile')->name('publicProfile/{id}');


// Public Search Section Routes
Route::post('/publicSearch', 'PublichSearchController@search')->name('publicSearch');



// Expense section Routes
Route::get('/expense', 'ExpenseController@index')->name('expense');
Route::post('/addExpense', 'ExpenseController@store')->name('addExpense');
Route::get('/deleteExpense/{id}','ExpenseController@destroy')->name('deleteExpense/{id}');
Route::get('/editExpense/{id}','ExpenseController@show')->name('editExpense/{id}');
Route::post('/editExpense/{id}','ExpenseController@edit')->name('editExpense/{id}');
Route::get('/printExpense/{id}','ExpenseController@printExpense')->name('printExpense/{id}');
Route::get('expenses/{from?}/{to?}', 'ExpenseController@expenses')->name('expenses');



// Sales section Routes
Route::get('/sales', 'SellController@index')->name('sales');
Route::post('/newSell', 'SellController@store')->name('newSell');
Route::get('/salesList', 'SellController@salesList')->name('salesList');
Route::get('/revenues', 'SellController@revenues')->name('revenues');
Route::get('/salesDetails', 'SellItemsController@index')->name('salesDetails');
Route::post('/saveSell', 'SellItemsController@store')->name('saveSell');
Route::get('/editItems/sellItemShow/{id}','SellItemsController@show')->name('sellItemShow{id}');
Route::post('/editItems/sellItemUpdate/{id}','SellItemsController@edit')->name('edit/sellItemUpdate{id}');
Route::get('/editItems/deleteSellItem/{id}','SellItemsController@destroy')->name('editItems/deleteSellItem/{id}');
Route::get('/editItems/deleteSell/{id}','SellController@destroy')->name('deleteSell/{id}');
Route::get('/edit/deleteSell/{id}','SellController@destroy')->name('deleteSell/{id}');
Route::get('/edit/deleteSell/{id}','SellController@destroy')->name('deleteSell/{id}');
Route::get('/deleteSell/{id}','SellController@destroy')->name('deleteSell/{id}');
Route::get('/editItems/{id}','SellOperationController@show')->name('editItems/{id}');
Route::post('/updateItems/{id}','SellOperationController@edit')->name('updateItems/{id}');
Route::get('/edit/printMyInvioce/{id}','SellOperationController@printInvioce')->name('/edit/printMyInvioce/{id}');
Route::get('/printMyInvioce/{id}','SellOperationController@printInvioce')->name('/printMyInvioce/{id}');
Route::get('customerDetails/printMyInvioce/{id}','SellOperationController@printInvioce')->name('/printMyInvioce/{id}');
Route::get('/debtors', 'SellController@debtor')->name('debtors');

// Balance Route
Route::get('blancess/{from?}/{to?}', 'BalanceController@blancess')->name('blancess');


// Message Section Routes
Route::post('/sendMessage', 'MessageController@store')->name('sendMessage');
Route::get('/message', 'MessageController@index')->name('message');
Route::get('/deleteContact/{id}','MessageController@destroy')->name('deleteMessage/{id}');
