<?php

use App\Http\Controllers\api\admin\AttributeController;
use App\Http\Controllers\api\admin\Auth\LoginController;
use App\Http\Controllers\api\admin\BannerController;
use App\Http\Controllers\api\admin\BusinessSettingsController;
use App\Http\Controllers\api\admin\CategoryController;
use App\Http\Controllers\api\admin\ContactController;
use App\Http\Controllers\api\admin\CouponController;
use App\Http\Controllers\api\admin\CurrencyController;
use App\Http\Controllers\api\admin\CustomerController;
use App\Http\Controllers\api\admin\CustomRoleController;
use App\Http\Controllers\api\admin\DashboardController;
use App\Http\Controllers\api\admin\DealController;
use App\Http\Controllers\api\admin\EmployeeController;
use App\Http\Controllers\api\admin\HelpTopicController;
use App\Http\Controllers\api\admin\InhouseProductSaleController;
use App\Http\Controllers\api\admin\LanguageController;
use App\Http\Controllers\api\admin\MailController;
use App\Http\Controllers\api\admin\NotificationController;
use App\Http\Controllers\api\admin\OrderController;
use App\Http\Controllers\api\admin\PaymentMethodController;
use App\Http\Controllers\api\admin\ProductController;
use App\Http\Controllers\api\admin\ProductStockReportController;
use App\Http\Controllers\api\admin\ProductWishlistReportController;
use App\Http\Controllers\api\admin\ProfileController;
use App\Http\Controllers\api\admin\ReportController;
use App\Http\Controllers\api\admin\ReviewsController;
use App\Http\Controllers\api\admin\SellerController;
use App\Http\Controllers\api\admin\SellerProductSaleReportController;
use App\Http\Controllers\api\admin\ShippingMethodController;
use App\Http\Controllers\api\admin\SMSModuleController;
use App\Http\Controllers\api\admin\SubCategoryController;
use App\Http\Controllers\api\admin\SubSubCategoryController;
use App\Http\Controllers\api\admin\SupportTicketController;
use App\Http\Controllers\api\admin\SystemController;
use App\Http\Controllers\api\admin\TransactionController;
use App\Http\Controllers\api\admin\WithdrawController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::group(['as' => 'auth.'], function () {
        Route::post('login', [LoginController::class, 'login'])->name('login');
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    });

    // Route::group(['middleware' => ['admin']], function () {

        //dashboard routes
        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard'); //previous dashboard route
        Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
            Route::get('/', [DashboardController::class, 'dashboard'])->name('index');
            Route::post('order-stats', [DashboardController::class, 'order_stats'])->name('order-stats');
            Route::post('business-overview', [DashboardController::class, 'business_overview'])->name('business-overview');
        });
        //system routes
        Route::get('search-function', [SystemController::class, 'search_function'])->name('search-function');
        Route::get('maintenance-mode', [SystemController::class, 'maintenance_mode'])->name('maintenance-mode');

        Route::group(['prefix' => 'custom-role', 'as' => 'custom-role.', 'middleware' => ['module:employee_section']], function () {
            Route::get('create', [CustomRoleController::class, 'create'])->name('create');
            Route::post('create', [CustomRoleController::class, 'store']);
            Route::get('update/{id}', [CustomRoleController::class, 'edit'])->name('update');
            Route::post('update/{id}', [CustomRoleController::class, 'update']);
        });

        Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
            Route::get('view', [ProfileController::class, 'view'])->name('view');
            Route::get('update/{id}', [ProfileController::class, 'edit'])->name('update');
            Route::post('update/{id}', [ProfileController::class, 'update']);
            Route::post('settings-password', [ProfileController::class, 'settings_password_update'])->name('settings-password');
        });

        Route::group(['prefix' => 'withdraw', 'as' => 'withdraw.', 'middleware' => ['module:user_section']], function () {
            Route::post('update/{id}', [WithdrawController::class, 'update'])->name('update');
            Route::post('request', [WithdrawController::class, 'w_request'])->name('request');
            Route::post('status-filter', [WithdrawController::class, 'status_filter'])->name('status-filter');
        });

        Route::group(['prefix' => 'deal', 'as' => 'deal.', 'middleware' => ['module:marketing_section']], function () {
            Route::get('flash', [DealController::class, 'flash_index'])->name('flash');
            Route::post('flash', [DealController::class, 'flash_submit']);

            // feature deal
            Route::get('feature', [DealController::class, 'feature_index'])->name('feature');

            Route::get('day', [DealController::class, 'deal_of_day'])->name('day');
            Route::post('day', [DealController::class, 'deal_of_day_submit']);
            Route::post('day-status-update', [DealController::class, 'day_status_update'])->name('day-status-update');

            Route::get('day-update/{id}', [DealController::class, 'day_edit'])->name('day-update');
            Route::post('day-update/{id}', [DealController::class, 'day_update']);
            Route::get('day-delete/{id}', [DealController::class, 'day_delete'])->name('day-delete');

            Route::get('update/{id}', [DealController::class, 'edit'])->name('update');
            Route::get('edit/{id}', [DealController::class, 'feature_edit'])->name('edit');

            Route::post('update/{id}', [DealController::class, 'update'])->name('update');
            Route::post('status-update', [DealController::class, 'status_update'])->name('status-update');
            Route::post('feature-status', [DealController::class, 'feature_status'])->name('feature-status');

            Route::post('featured-update', [DealController::class, 'featured_update'])->name('featured-update');
            Route::get('add-product/{deal_id}', [DealController::class, 'add_product'])->name('add-product');
            Route::post('add-product/{deal_id}', [DealController::class, 'add_product_submit']);
            Route::get('delete-product/{deal_product_id}', [DealController::class, 'delete_product'])->name('delete-product');
        });

        Route::group(['prefix' => 'employee', 'as' => 'employee.', 'middleware' => ['module:employee_section']], function () {
            Route::get('add-new', [EmployeeController::class, 'add_new'])->name('add-new');
            Route::post('add-new', [EmployeeController::class, 'store']);
            Route::get('list', [EmployeeController::class, 'list'])->name('list');
            Route::get('update/{id}', [EmployeeController::class, 'edit'])->name('update');
            Route::post('update/{id}', [EmployeeController::class, 'update']);
        });

        Route::group(['prefix' => 'category', 'as' => 'category.', 'middleware' => ['module:product_management']], function () {
            Route::get('view', [CategoryController::class, 'index'])->name('view');
            Route::get('fetch', [CategoryController::class, 'fetch'])->name('fetch');
            Route::post('store', [CategoryController::class, 'store'])->name('store');
            Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [CategoryController::class, 'update'])->name('update');
            Route::post('delete', [CategoryController::class, 'delete'])->name('delete');
            Route::get('status/{id}/{home_status}', [CategoryController::class, 'status'])->name('status');
        });

        Route::group(['prefix' => 'sub-category', 'as' => 'sub-category.', 'middleware' => ['module:product_management']], function () {
            Route::get('view', [SubCategoryController::class, 'index'])->name('view');
            Route::get('fetch', [SubCategoryController::class, 'fetch'])->name('fetch');
            Route::post('store', [SubCategoryController::class, 'store'])->name('store');
            Route::post('edit', [SubCategoryController::class, 'edit'])->name('edit');
            Route::post('update', [SubCategoryController::class, 'update'])->name('update');
            Route::post('delete', [SubCategoryController::class, 'delete'])->name('delete');
        });

        Route::group(['prefix' => 'sub-sub-category', 'as' => 'sub-sub-category.', 'middleware' => ['module:product_management']], function () {
            Route::get('view', [SubSubCategoryController::class, 'index'])->name('view');
            Route::get('fetch', [SubSubCategoryController::class, 'fetch'])->name('fetch');
            Route::post('store', [SubSubCategoryController::class, 'store'])->name('store');
            Route::post('edit', [SubSubCategoryController::class, 'edit'])->name('edit');
            Route::post('update', [SubSubCategoryController::class, 'update'])->name('update');
            Route::post('delete', [SubSubCategoryController::class, 'delete'])->name('delete');
            Route::post('get-sub-category', [SubSubCategoryController::class, 'getSubCategory'])->name('getSubCategory');
            Route::post('get-category-id', [SubSubCategoryController::class, 'getCategoryId'])->name('getCategoryId');
        });

        Route::group(['prefix' => 'brand', 'as' => 'brand.', 'middleware' => ['module:product_management']], function () {
            Route::get('add-new', [BrandController::class, 'add_new'])->name('add-new');
            Route::post('add-new', [BrandController::class, 'store']);
            Route::get('list', [BrandController::class, 'list'])->name('list');
            Route::get('update/{id}', [BrandController::class, 'edit'])->name('update');
            Route::post('update/{id}', [BrandController::class, 'update']);
            Route::post('delete', [BrandController::class, 'delete'])->name('delete');
        });

        Route::group(['prefix' => 'banner', 'as' => 'banner.', 'middleware' => ['module:marketing_section']], function () {
            Route::post('add-new', [BannerController::class, 'store'])->name('store');
            Route::get('list', [BannerController::class, 'list'])->name('list');
            Route::post('delete', [BannerController::class, 'delete'])->name('delete');
            Route::post('status', [BannerController::class, 'status'])->name('status');
            Route::post('edit', [BannerController::class, 'edit'])->name('edit');
            Route::post('update', [BannerController::class, 'update'])->name('update');
        });

        Route::group(['prefix' => 'attribute', 'as' => 'attribute.', 'middleware' => ['module:product_management']], function () {
            Route::get('view', [AttributeController::class, 'index'])->name('view');
            Route::get('fetch', [AttributeController::class, 'fetch'])->name('fetch');
            Route::post('store', [AttributeController::class, 'store'])->name('store');
            Route::get('edit/{id}', [AttributeController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [AttributeController::class, 'update'])->name('update');
            Route::post('delete', [AttributeController::class, 'delete'])->name('delete');
        });

        Route::group(['prefix' => 'coupon', 'as' => 'coupon.', 'middleware' => ['module:marketing_section']], function () {
            Route::get('add-new', [CouponController::class, 'add_new'])->name('add-new')->middleware('actch');;
            Route::post('add-new', [CouponController::class, 'store']);
            Route::get('update/{id}', [CouponController::class, 'edit'])->name('update')->middleware('actch');;
            Route::post('update/{id}', [CouponController::class, 'update']);
            Route::get('status/{id}/{status}', [CouponController::class, 'status'])->name('status');
        });
        Route::group(['prefix' => 'social-login', 'as' => 'social-login.', 'middleware' => ['module:business_settings']], function () {
            Route::get('view', [BusinessSettingsController::class, 'viewSocialLogin'])->name('view');
            Route::post('update/{service}', [BusinessSettingsController::class, 'updateSocialLogin'])->name('update');
        });

        Route::group(['prefix' => 'currency', 'as' => 'currency.', 'middleware' => ['module:business_settings']], function () {
            Route::get('view', [CurrencyController::class, 'index'])->name('view')->middleware('actch');;
            Route::get('fetch', [CurrencyController::class, 'fetch'])->name('fetch');
            Route::post('store', [CurrencyController::class, 'store'])->name('store');
            Route::get('edit/{id}', [CurrencyController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [CurrencyController::class, 'update'])->name('update');
            Route::get('delete/{id}', [CurrencyController::class, 'delete'])->name('delete');
            Route::post('status', [CurrencyController::class, 'status'])->name('status');
            Route::post('system-currency-update', [CurrencyController::class, 'systemCurrencyUpdate'])->name('system-currency-update');
        });

        Route::group(['prefix' => 'support-ticket', 'as' => 'support-ticket.', 'middleware' => ['module:support_section']], function () {
            Route::get('view', [SupportTicketController::class, 'index'])->name('view');
            Route::post('status', [SupportTicketController::class, 'status'])->name('status');
            Route::get('single-ticket/{id}', [SupportTicketController::class, 'single_ticket'])->name('singleTicket');
            Route::post('single-ticket/{id}', [SupportTicketController::class, 'replay_submit'])->name('replay');
        });
        Route::group(['prefix' => 'notification', 'as' => 'notification.', 'middleware' => ['module:marketing_section']], function () {
            Route::get('add-new', [NotificationController::class, 'index'])->name('add-new');
            Route::post('store', [NotificationController::class, 'store'])->name('store');
            Route::get('edit/{id}', [NotificationController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [NotificationController::class, 'update'])->name('update');
            Route::post('status', [NotificationController::class, 'status'])->name('status');
            Route::post('delete', [NotificationController::class, 'delete'])->name('delete');
        });
        Route::group(['prefix' => 'reviews', 'as' => 'reviews.', 'middleware' => ['module:business_section']], function () {
            Route::get('list', [ReviewsController::class, 'list'])->name('list')->middleware('actch');;
        });

        Route::group(['prefix' => 'customer', 'as' => 'customer.', 'middleware' => ['module:user_section']], function () {
            Route::get('list', [CustomerController::class, 'customer_list'])->name('list');
            Route::post('status-update', [CustomerController::class, 'status_update'])->name('status-update');
            Route::get('view/{user_id}', [CustomerController::class, 'view'])->name('view');
        });
        ///Report
        Route::group(['prefix' => 'report', 'as' => 'report.', 'middleware' => ['module:report']], function () {
            Route::get('order', [ReportController::class, 'order_index'])->name('order');
            Route::get('earning', [ReportController::class, 'earning_index'])->name('earning');
            Route::post('set-date', [ReportController::class, 'set_date'])->name('set-date');
            //sale report inhouse
            Route::get('inhoue-product-sale', [InhouseProductSaleController::class, 'index'])->name('inhoue-product-sale');
            Route::get('seller-product-sale', [SellerProductSaleReportController::class, 'index'])->name('seller-product-sale');
        });
        Route::group(['prefix' => 'stock', 'as' => 'stock.', 'middleware' => ['module:business_section']], function () {
            //product stock report
            Route::get('product-stock', [ProductStockReportController::class, 'index'])->name('product-stock');
            Route::post('ps-filter', [ProductStockReportController::class, 'filter'])->name('ps-filter');
            //product in wishlist report
            Route::get('product-in-wishlist', [ProductWishlistReportController::class, 'index'])->name('product-in-wishlist');
            Route::post('piw-filter', [ProductWishlistReportController::class, 'filter'])->name('piw-filter');
        });
        Route::group(['prefix' => 'sellers', 'as' => 'sellers.', 'middleware' => ['module:user_section']], function () {
            Route::get('seller-list', [SellerController::class, 'index'])->name('seller-list');
            Route::get('order-list/{seller_id}', [SellerController::class, 'order_list'])->name('order-list');
            Route::get('product-list/{seller_id}', [SellerController::class, 'product_list'])->name('product-list');

            Route::get('order-details/{order_id}/{seller_id}', [SellerController::class, 'order_details'])->name('order-details');
            Route::get('verification/{id}', [SellerController::class, 'view'])->name('verification');
            Route::get('view/{id}/{tab?}', [SellerController::class, 'view'])->name('view');
            Route::post('update-status', [SellerController::class, 'updateStatus'])->name('updateStatus');
            Route::post('withdraw-status/{id}', [SellerController::class, 'withdrawStatus'])->name('withdraw_status');
            Route::get('withdraw_list', [SellerController::class, 'withdraw'])->name('withdraw_list');
            Route::get('withdraw-view/{withdraw_id}/{seller_id}', [SellerController::class, 'withdraw_view'])->name('withdraw_view');

            Route::post('sales-commission-update/{id}', [SellerController::class, 'sales_commission_update'])->name('sales-commission-update');
        });
        Route::group(['prefix' => 'product', 'as' => 'product.', 'middleware' => ['module:product_management']], function () {
            Route::get('add-new', [ProductController::class, 'add_new'])->name('add-new');
            Route::post('store', [ProductController::class, 'store'])->name('store');
            Route::get('remove-image', [ProductController::class, 'remove_image'])->name('remove-image');
            Route::post('status-update', [ProductController::class, 'status_update'])->name('status-update');
            Route::get('list/{type}', [ProductController::class, 'list'])->name('list');
            //Route::get('list/{type}/{slug}', [ProductController::class,'list'])->name('list');
            Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [ProductController::class, 'update'])->name('update');
            Route::post('featured-status', [ProductController::class, 'featured_status'])->name('featured-status');
            Route::get('approve-status', [ProductController::class, 'approve_status'])->name('approve-status');
            Route::post('deny', [ProductController::class, 'deny'])->name('deny');
            Route::post('sku-combination', [ProductController::class, 'sku_combination'])->name('sku-combination');
            Route::get('get-categories', [ProductController::class, 'get_categories'])->name('get-categories');
            Route::delete('delete/{id}', [ProductController::class, 'delete'])->name('delete');

            Route::get('view/{id}', [ProductController::class, 'view'])->name('view');
            Route::get('bulk-import', [ProductController::class, 'bulk_import_index'])->name('bulk-import');
            Route::post('bulk-import', [ProductController::class, 'bulk_import_data']);
            Route::get('bulk-export', [ProductController::class, 'bulk_export_data'])->name('bulk-export');
        });

        Route::group(['prefix' => 'transaction', 'as' => 'transaction.', 'middleware' => ['module:business_section']], function () {
            Route::get('list', [TransactionController::class, 'list'])->name('list');
        });

        Route::group(['prefix' => 'business-settings', 'as' => 'business-settings.', 'middleware' => ['module:business_settings']], function () {
            Route::get('general-settings', [BusinessSettingsController::class, 'index'])->name('general-settings')->middleware('actch');;
            Route::get('update-language', [BusinessSettingsController::class, 'update_language'])->name('update-language');
            Route::get('about-us', [BusinessSettingsController::class, 'about_us'])->name('about-us');
            Route::post('about-us', [BusinessSettingsController::class, 'about_usUpdate'])->name('about-update');
            Route::post('update-info', [BusinessSettingsController::class, 'updateInfo'])->name('update-info');
            //Social Icon
            Route::get('social-media', [BusinessSettingsController::class, 'social_media'])->name('social-media');
            Route::get('fetch', [BusinessSettingsController::class, 'fetch'])->name('fetch');
            Route::post('social-media-store', [BusinessSettingsController::class, 'social_media_store'])->name('social-media-store');
            Route::post('social-media-edit', [BusinessSettingsController::class, 'social_media_edit'])->name('social-media-edit');
            Route::post('social-media-update', [BusinessSettingsController::class, 'social_media_update'])->name('social-media-update');
            Route::post('social-media-delete', [BusinessSettingsController::class, 'social_media_delete'])->name('social-media-delete');
            Route::post('social-media-status-update', [BusinessSettingsController::class, 'social_media_status_update'])->name('social-media-status-update');

            Route::get('terms-condition', [BusinessSettingsController::class, 'terms_condition'])->name('terms-condition');
            Route::post('terms-condition', [BusinessSettingsController::class, 'updateTermsCondition'])->name('update-terms');
            Route::get('privacy-policy', [BusinessSettingsController::class, 'privacy_policy'])->name('privacy-policy');
            Route::post('privacy-policy', [BusinessSettingsController::class, 'privacy_policy_update'])->name('privacy-policy');

            Route::get('fcm-index', [BusinessSettingsController::class, 'fcm_index'])->name('fcm-index');
            Route::post('update-fcm', [BusinessSettingsController::class, 'update_fcm'])->name('update-fcm');

            Route::post('update-fcm-messages', [BusinessSettingsController::class, 'update_fcm_messages'])->name('update-fcm-messages');

            Route::group(['prefix' => 'shipping-method', 'as' => 'shipping-method.', 'middleware' => ['module:business_settings']], function () {
                Route::get('by/admin', [ShippingMethodController::class, 'index_admin'])->name('by.admin');
                //Route::get('by/seller', [ShippingMethodController::class,'index_seller')->name('by.seller');
                Route::post('add', [ShippingMethodController::class, 'store'])->name('add');
                Route::get('edit/{id}', [ShippingMethodController::class, 'edit'])->name('edit');
                Route::put('update/{id}', [ShippingMethodController::class, 'update'])->name('update');
                Route::post('delete', [ShippingMethodController::class, 'delete'])->name('delete');
                Route::post('status-update', [ShippingMethodController::class, 'status_update'])->name('status-update');
                Route::get('setting', [ShippingMethodController::class, 'setting'])->name('setting');
                Route::post('shipping-store', [ShippingMethodController::class, 'shippingStore'])->name('shipping-store');
            });

            Route::group(['prefix' => 'language', 'as' => 'language.', 'middleware' => ['module:business_settings']], function () {
                Route::get('', [LanguageController::class, 'index'])->name('index');
                //                Route::get('app', [LanguageController::class,'index_app')->name('index-app');
                Route::post('add-new', [LanguageController::class, 'store'])->name('add-new');
                Route::get('update-status', [LanguageController::class, 'update_status'])->name('update-status');
                Route::get('update-default-status', [LanguageController::class, 'update_default_status'])->name('update-default-status');
                Route::post('update', [LanguageController::class, 'update'])->name('update');
                Route::get('translate/{lang}', [LanguageController::class, 'translate'])->name('translate');
                Route::post('translate-submit/{lang}', [LanguageController::class, 'translate_submit'])->name('translate-submit');
                Route::post('remove-key/{lang}', [LanguageController::class, 'translate_key_remove'])->name('remove-key');
                Route::get('delete/{lang}', [LanguageController::class, 'delete'])->name('delete');
            });

            Route::group(['prefix' => 'mail', 'as' => 'mail.', 'middleware' => ['module:web_&_app_settings']], function () {
                Route::get('', [MailController::class, 'index'])->name('index')->middleware('actch');
                Route::post('update', [MailController::class, 'update'])->name('update');
            });

            Route::group(['prefix' => 'web-config', 'as' => 'web-config.', 'middleware' => ['module:web_&_app_settings']], function () {
                Route::get('/', [BusinessSettingsController::class, 'companyInfo'])->name('index')->middleware('actch');;
                Route::post('update-colors', [BusinessSettingsController::class, 'update_colors'])->name('update-colors');
                Route::post('update-language', [BusinessSettingsController::class, 'update_language'])->name('update-language');
                Route::post('update-company', [BusinessSettingsController::class, 'updateCompany'])->name('company-update');
                Route::post('update-company-email', [BusinessSettingsController::class, 'updateCompanyEmail'])->name('company-email-update');
                Route::post('update-company-phone', [BusinessSettingsController::class, 'updateCompanyPhone'])->name('company-phone-update');
                Route::post('upload-web-logo', [BusinessSettingsController::class, 'uploadWebLogo'])->name('company-web-logo-upload');
                Route::post('upload-mobile-logo', [BusinessSettingsController::class, 'uploadMobileLogo'])->name('company-mobile-logo-upload');
                Route::post('upload-footer-log', [BusinessSettingsController::class, 'uploadFooterLog'])->name('company-footer-logo-upload');
                Route::post('upload-fav-icon', [BusinessSettingsController::class, 'uploadFavIcon'])->name('company-fav-icon');
                Route::post('update-company-copyRight-text', [BusinessSettingsController::class, 'updateCompanyCopyRight'])->name('company-copy-right-update');
                Route::post('app-store/{name}', [BusinessSettingsController::class, 'update'])->name('app-store-update');
                Route::get('currency-symbol-position/{side}', [BusinessSettingsController::class, 'currency_symbol_position'])->name('currency-symbol-position');
                Route::post('shop-banner', [BusinessSettingsController::class, 'shop_banner'])->name('shop-banner');
            });
            Route::group(['prefix' => 'seller-settings', 'as' => 'seller-settings.', 'middleware' => ['module:business_settings']], function () {
                Route::get('/', [BusinessSettingsController::class, 'seller_settings'])->name('index')->middleware('actch');;
                Route::post('update-seller-settings', [BusinessSettingsController::class, 'sales_commission'])->name('update-seller-settings');
                Route::post('update-seller-registration', [BusinessSettingsController::class, 'seller_registration'])->name('update-seller-registration');
            });

            Route::group(['prefix' => 'payment-method', 'as' => 'payment-method.', 'middleware' => ['module:business_settings']], function () {
                Route::get('/', [PaymentMethodController::class, 'index'])->name('index')->middleware('actch');;
                Route::post('{name}', [PaymentMethodController::class, 'update'])->name('update');
            });

            Route::get('sms-module', [SMSModuleController::class, 'sms_index'])->name('sms-module');
            Route::post('sms-module-update/{sms_module}', [SMSModuleController::class, 'sms_update'])->name('sms-module-update');
        });
        //order management
        Route::group(['prefix' => 'orders', 'as' => 'orders.', 'middleware' => ['module:order_management']], function () {
            Route::get('list/{status}', [OrderController::class, 'list'])->name('list');
            Route::get('details/{id}', [OrderController::class, 'details'])->name('details');
            Route::post('status', [OrderController::class, 'status'])->name('status');
            Route::post('payment-status', [OrderController::class, 'payment_status'])->name('payment-status');
            Route::post('productStatus', [OrderController::class, 'productStatus'])->name('productStatus');
            Route::get('generate-invoice/{id}', [OrderController::class, 'generate_invoice'])->name('generate-invoice');
            Route::get('inhouse-order-filter', [OrderController::class, 'inhouse_order_filter'])->name('inhouse-order-filter');
        });

        Route::group(['prefix' => 'helpTopic', 'as' => 'helpTopic.', 'middleware' => ['module:web_&_app_settings']], function () {
            Route::get('list', [HelpTopicController::class, 'list'])->name('list');
            Route::post('add-new', [HelpTopicController::class, 'store'])->name('add-new');
            Route::get('status/{id}', [HelpTopicController::class, 'status']);
            Route::get('edit/{id}', [HelpTopicController::class, 'edit']);
            Route::post('update/{id}', [HelpTopicController::class, 'update']);
            Route::post('delete', [HelpTopicController::class, 'destroy'])->name('delete');
        });

        Route::group(['prefix' => 'contact', 'as' => 'contact.', 'middleware' => ['module:support_section']], function () {
            Route::post('contact-store', [ContactController::class, 'store'])->name('store');
            Route::get('list', [ContactController::class, 'list'])->name('list');
            Route::post('delete', [ContactController::class, 'destroy'])->name('delete');
            Route::get('view/{id}', [ContactController::class, 'view'])->name('view');
            Route::post('update/{id}', [ContactController::class, 'update'])->name('update');
            Route::post('send-mail/{id}', [ContactController::class, 'send_mail'])->name('send-mail');
        });
    // });

});
