<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Template Routes
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => 'panel-vertical'], function () {
    Route::get('/', function () {
        return view('templates.panel.vertical.index');
    });
    Route::get('/advanced-ui-kits-image-crop', function () {
        return view('templates.panel.vertical.advanced-ui-kits-image-crop');
    });
    Route::get('/advanced-ui-kits-jquery-confirm', function () {
        return view('templates.panel.vertical.advanced-ui-kits-jquery-confirm');
    });
    Route::get('/advanced-ui-kits-nestable', function () {
        return view('templates.panel.vertical.advanced-ui-kits-nestable');
    });
    Route::get('/advanced-ui-kits-pnotify', function () {
        return view('templates.panel.vertical.advanced-ui-kits-pnotify');
    });
    Route::get('/advanced-ui-kits-range-slider', function () {
        return view('templates.panel.vertical.advanced-ui-kits-range-slider');
    });
    Route::get('/advanced-ui-kits-ratings', function () {
        return view('templates.panel.vertical.advanced-ui-kits-ratings');
    });
    Route::get('/advanced-ui-kits-session-timeout', function () {
        return view('templates.panel.vertical.advanced-ui-kits-session-timeout');
    });
    Route::get('/advanced-ui-kits-sweet-alerts', function () {
        return view('templates.panel.vertical.advanced-ui-kits-sweet-alerts');
    });
    Route::get('/advanced-ui-kits-switchery', function () {
        return view('templates.panel.vertical.advanced-ui-kits-switchery');
    });
    Route::get('/advanced-ui-kits-toolbar', function () {
        return view('templates.panel.vertical.advanced-ui-kits-toolbar');
    });
    Route::get('/advanced-ui-kits-tour', function () {
        return view('templates.panel.vertical.advanced-ui-kits-tour');
    });
    Route::get('/advanced-ui-kits-treeview', function () {
        return view('templates.panel.vertical.advanced-ui-kits-treeview');
    });
    Route::get('/apps-calender', function () {
        return view('templates.panel.vertical.apps-calender');
    });
    Route::get('/apps-chat', function () {
        return view('templates.panel.vertical.apps-chat');
    });
    Route::get('/apps-email-compose', function () {
        return view('templates.panel.vertical.apps-email-compose');
    });
    Route::get('/apps-email-inbox', function () {
        return view('templates.panel.vertical.apps-email-inbox');
    });
    Route::get('/apps-email-open', function () {
        return view('templates.panel.vertical.apps-email-open');
    });
    Route::get('/apps-kanban-board', function () {
        return view('templates.panel.vertical.apps-kanban-board');
    });
    Route::get('/apps-onboarding-screens', function () {
        return view('templates.panel.vertical.apps-onboarding-screens');
    });
    Route::get('/basic-ui-kits-alerts', function () {
        return view('templates.panel.vertical.basic-ui-kits-alerts');
    });
    Route::get('/basic-ui-kits-badges', function () {
        return view('templates.panel.vertical.basic-ui-kits-badges');
    });
    Route::get('/basic-ui-kits-buttons', function () {
        return view('templates.panel.vertical.basic-ui-kits-buttons');
    });
    Route::get('/basic-ui-kits-cards', function () {
        return view('templates.panel.vertical.basic-ui-kits-cards');
    });
    Route::get('/basic-ui-kits-carousel', function () {
        return view('templates.panel.vertical.basic-ui-kits-carousel');
    });
    Route::get('/basic-ui-kits-collapse', function () {
        return view('templates.panel.vertical.basic-ui-kits-collapse');
    });
    Route::get('/basic-ui-kits-dropdowns', function () {
        return view('templates.panel.vertical.basic-ui-kits-dropdowns');
    });
    Route::get('/basic-ui-kits-embeds', function () {
        return view('templates.panel.vertical.basic-ui-kits-embeds');
    });
    Route::get('/basic-ui-kits-grids', function () {
        return view('templates.panel.vertical.basic-ui-kits-grids');
    });
    Route::get('/basic-ui-kits-images', function () {
        return view('templates.panel.vertical.basic-ui-kits-images');
    });
    Route::get('/basic-ui-kits-media', function () {
        return view('templates.panel.vertical.basic-ui-kits-media');
    });
    Route::get('/basic-ui-kits-modals', function () {
        return view('templates.panel.vertical.basic-ui-kits-modals');
    });
    Route::get('/basic-ui-kits-paginations', function () {
        return view('templates.panel.vertical.basic-ui-kits-paginations');
    });
    Route::get('/basic-ui-kits-popovers', function () {
        return view('templates.panel.vertical.basic-ui-kits-popovers');
    });
    Route::get('/basic-ui-kits-progressbars', function () {
        return view('templates.panel.vertical.basic-ui-kits-progressbars');
    });
    Route::get('/basic-ui-kits-spinners', function () {
        return view('templates.panel.vertical.basic-ui-kits-spinners');
    });
    Route::get('/basic-ui-kits-tabs', function () {
        return view('templates.panel.vertical.basic-ui-kits-tabs');
    });
    Route::get('/basic-ui-kits-toasts', function () {
        return view('templates.panel.vertical.basic-ui-kits-toasts');
    });
    Route::get('/basic-ui-kits-tooltips', function () {
        return view('templates.panel.vertical.basic-ui-kits-tooltips');
    });
    Route::get('/basic-ui-kits-typography', function () {
        return view('templates.panel.vertical.basic-ui-kits-typography');
    });
    Route::get('/chart-c3', function () {
        return view('templates.panel.vertical.chart-c3');
    });
    Route::get('/chart-chartistjs', function () {
        return view('templates.panel.vertical.chart-chartistjs');
    });
    Route::get('/chart-chartjs', function () {
        return view('templates.panel.vertical.chart-chartjs');
    });
    Route::get('/chart-flot', function () {
        return view('templates.panel.vertical.chart-flot');
    });
    Route::get('/chart-knob', function () {
        return view('templates.panel.vertical.chart-knob');
    });
    Route::get('/chart-morris', function () {
        return view('templates.panel.vertical.chart-morris');
    });
    Route::get('/chart-piety', function () {
        return view('templates.panel.vertical.chart-piety');
    });
    Route::get('/chart-sparkline', function () {
        return view('templates.panel.vertical.chart-sparkline');
    });
    Route::get('/dashboard-analytics', function () {
        return view('templates.panel.vertical.dashboard-analytics');
    });
    Route::get('/dashboard-ecommerce', function () {
        return view('templates.panel.vertical.dashboard-ecommerce');
    });
    Route::get('/ecommerce-cart', function () {
        return view('templates.panel.vertical.ecommerce-cart');
    });
    Route::get('/ecommerce-checkout', function () {
        return view('templates.panel.vertical.ecommerce-checkout');
    });
    Route::get('/ecommerce-myaccount', function () {
        return view('templates.panel.vertical.ecommerce-myaccount');
    });
    Route::get('/ecommerce-order-detail', function () {
        return view('templates.panel.vertical.ecommerce-order-detail');
    });
    Route::get('/ecommerce-order-list', function () {
        return view('templates.panel.vertical.ecommerce-order-list');
    });
    Route::get('/ecommerce-product-detail', function () {
        return view('templates.panel.vertical.ecommerce-product-detail');
    });
    Route::get('/ecommerce-product-list', function () {
        return view('templates.panel.vertical.ecommerce-product-list');
    });
    Route::get('/ecommerce-shop', function () {
        return view('templates.panel.vertical.ecommerce-shop');
    });
    Route::get('/ecommerce-single-product', function () {
        return view('templates.panel.vertical.ecommerce-single-product');
    });
    Route::get('/ecommerce-thankyou', function () {
        return view('templates.panel.vertical.ecommerce-thankyou');
    });
    Route::get('/error-404', function () {
        return view('templates.panel.vertical.error-404');
    });
    Route::get('/error-500', function () {
        return view('templates.panel.vertical.error-500');
    });
    Route::get('/error-comingsoon', function () {
        return view('templates.panel.vertical.error-comingsoon');
    });
    Route::get('/error-maintenance', function () {
        return view('templates.panel.vertical.error-maintenance');
    });
    Route::get('/form-colorpickers', function () {
        return view('templates.panel.vertical.form-colorpickers');
    });
    Route::get('/form-datepickers', function () {
        return view('templates.panel.vertical.form-datepickers');
    });
    Route::get('/form-editors', function () {
        return view('templates.panel.vertical.form-editors');
    });
    Route::get('/form-file-uploads', function () {
        return view('templates.panel.vertical.form-file-uploads');
    });
    Route::get('/form-groups', function () {
        return view('templates.panel.vertical.form-groups');
    });
    Route::get('/form-input-mask', function () {
        return view('templates.panel.vertical.form-input-mask');
    });
    Route::get('/form-inputs', function () {
        return view('templates.panel.vertical.form-inputs');
    });
    Route::get('/form-layouts', function () {
        return view('templates.panel.vertical.form-layouts');
    });
    Route::get('/form-maxlength', function () {
        return view('templates.panel.vertical.form-maxlength');
    });
    Route::get('/form-selects', function () {
        return view('templates.panel.vertical.form-selects');
    });
    Route::get('/form-touchspin', function () {
        return view('templates.panel.vertical.form-touchspin');
    });
    Route::get('/form-validations', function () {
        return view('templates.panel.vertical.form-validations');
    });
    Route::get('/form-wizards', function () {
        return view('templates.panel.vertical.form-wizards');
    });
    Route::get('/form-xeditable', function () {
        return view('templates.panel.vertical.form-xeditable');
    });
    Route::get('/icon-dripicons', function () {
        return view('templates.panel.vertical.icon-dripicons');
    });
    Route::get('/icon-feather', function () {
        return view('templates.panel.vertical.icon-feather');
    });
    Route::get('/icon-flag', function () {
        return view('templates.panel.vertical.icon-flag');
    });
    Route::get('/icon-font-awesome', function () {
        return view('templates.panel.vertical.icon-font-awesome');
    });
    Route::get('/icon-ionicons', function () {
        return view('templates.panel.vertical.icon-ionicons');
    });
    Route::get('/icon-line-awesome', function () {
        return view('templates.panel.vertical.icon-line-awesome');
    });
    Route::get('/icon-material-design', function () {
        return view('templates.panel.vertical.icon-material-design');
    });
    Route::get('/icon-simple-line', function () {
        return view('templates.panel.vertical.icon-simple-line');
    });
    Route::get('/icon-socicon', function () {
        return view('templates.panel.vertical.icon-socicon');
    });
    Route::get('/icon-themify', function () {
        return view('templates.panel.vertical.icon-themify');
    });
    Route::get('/icon-theta', function () {
        return view('templates.panel.vertical.icon-theta');
    });
    Route::get('/icon-typicons', function () {
        return view('templates.panel.vertical.icon-typicons');
    });
    Route::get('/map-google', function () {
        return view('templates.panel.vertical.map-google');
    });
    Route::get('/map-vector', function () {
        return view('templates.panel.vertical.map-vector');
    });
    Route::get('/page-blog', function () {
        return view('templates.panel.vertical.page-blog');
    });
    Route::get('/page-faq', function () {
        return view('templates.panel.vertical.page-faq');
    });
    Route::get('/page-gallery', function () {
        return view('templates.panel.vertical.page-gallery');
    });
    Route::get('/page-invoice', function () {
        return view('templates.panel.vertical.page-invoice');
    });
    Route::get('/page-pricing', function () {
        return view('templates.panel.vertical.page-pricing');
    });
    Route::get('/page-starter', function () {
        return view('templates.panel.vertical.page-starter');
    });
    Route::get('/page-timeline', function () {
        return view('templates.panel.vertical.page-timeline');
    });
    Route::get('/table-bootstrap', function () {
        return view('templates.panel.vertical.table-bootstrap');
    });
    Route::get('/table-datatable', function () {
        return view('templates.panel.vertical.table-datatable');
    });
    Route::get('/table-editable', function () {
        return view('templates.panel.vertical.table-editable');
    });
    Route::get('/table-footable', function () {
        return view('templates.panel.vertical.table-footable');
    });
    Route::get('/table-rwdtable', function () {
        return view('templates.panel.vertical.table-rwdtable');
    });
    Route::get('/user-forgotpsw', function () {
        return view('templates.panel.vertical.user-forgotpsw');
    });
    Route::get('/user-lock-screen', function () {
        return view('templates.panel.vertical.user-lock-screen');
    });
    Route::get('/user-login', function () {
        return view('templates.panel.vertical.user-login');
    });
    Route::get('/user-register', function () {
        return view('templates.panel.vertical.user-register');
    });
    Route::get('/widgets', function () {
        return view('templates.panel.vertical.widgets');
    });

});

Route::group(['prefix' => 'panel-horizontal'], function () {
    Route::get('/', function () {
        return view('templates.panel.horizontal.index');
    });
    Route::get('/advanced-ui-kits-image-crop', function () {
        return view('templates.panel.horizontal.advanced-ui-kits-image-crop');
    });
    Route::get('/advanced-ui-kits-jquery-confirm', function () {
        return view('templates.panel.horizontal.advanced-ui-kits-jquery-confirm');
    });
    Route::get('/advanced-ui-kits-nestable', function () {
        return view('templates.panel.horizontal.advanced-ui-kits-nestable');
    });
    Route::get('/advanced-ui-kits-pnotify', function () {
        return view('templates.panel.horizontal.advanced-ui-kits-pnotify');
    });
    Route::get('/advanced-ui-kits-range-slider', function () {
        return view('templates.panel.horizontal.advanced-ui-kits-range-slider');
    });
    Route::get('/advanced-ui-kits-ratings', function () {
        return view('templates.panel.horizontal.advanced-ui-kits-ratings');
    });
    Route::get('/advanced-ui-kits-session-timeout', function () {
        return view('templates.panel.horizontal.advanced-ui-kits-session-timeout');
    });
    Route::get('/advanced-ui-kits-sweet-alerts', function () {
        return view('templates.panel.horizontal.advanced-ui-kits-sweet-alerts');
    });
    Route::get('/advanced-ui-kits-switchery', function () {
        return view('templates.panel.horizontal.advanced-ui-kits-switchery');
    });
    Route::get('/advanced-ui-kits-toolbar', function () {
        return view('templates.panel.horizontal.advanced-ui-kits-toolbar');
    });
    Route::get('/advanced-ui-kits-tour', function () {
        return view('templates.panel.horizontal.advanced-ui-kits-tour');
    });
    Route::get('/advanced-ui-kits-treeview', function () {
        return view('templates.panel.horizontal.advanced-ui-kits-treeview');
    });
    Route::get('/apps-calender', function () {
        return view('templates.panel.horizontal.apps-calender');
    });
    Route::get('/apps-chat', function () {
        return view('templates.panel.horizontal.apps-chat');
    });
    Route::get('/apps-email-compose', function () {
        return view('templates.panel.horizontal.apps-email-compose');
    });
    Route::get('/apps-email-inbox', function () {
        return view('templates.panel.horizontal.apps-email-inbox');
    });
    Route::get('/apps-email-open', function () {
        return view('templates.panel.horizontal.apps-email-open');
    });
    Route::get('/apps-kanban-board', function () {
        return view('templates.panel.horizontal.apps-kanban-board');
    });
    Route::get('/apps-onboarding-screens', function () {
        return view('templates.panel.horizontal.apps-onboarding-screens');
    });
    Route::get('/basic-ui-kits-alerts', function () {
        return view('templates.panel.horizontal.basic-ui-kits-alerts');
    });
    Route::get('/basic-ui-kits-badges', function () {
        return view('templates.panel.horizontal.basic-ui-kits-badges');
    });
    Route::get('/basic-ui-kits-buttons', function () {
        return view('templates.panel.horizontal.basic-ui-kits-buttons');
    });
    Route::get('/basic-ui-kits-cards', function () {
        return view('templates.panel.horizontal.basic-ui-kits-cards');
    });
    Route::get('/basic-ui-kits-carousel', function () {
        return view('templates.panel.horizontal.basic-ui-kits-carousel');
    });
    Route::get('/basic-ui-kits-collapse', function () {
        return view('templates.panel.horizontal.basic-ui-kits-collapse');
    });
    Route::get('/basic-ui-kits-dropdowns', function () {
        return view('templates.panel.horizontal.basic-ui-kits-dropdowns');
    });
    Route::get('/basic-ui-kits-embeds', function () {
        return view('templates.panel.horizontal.basic-ui-kits-embeds');
    });
    Route::get('/basic-ui-kits-grids', function () {
        return view('templates.panel.horizontal.basic-ui-kits-grids');
    });
    Route::get('/basic-ui-kits-images', function () {
        return view('templates.panel.horizontal.basic-ui-kits-images');
    });
    Route::get('/basic-ui-kits-media', function () {
        return view('templates.panel.horizontal.basic-ui-kits-media');
    });
    Route::get('/basic-ui-kits-modals', function () {
        return view('templates.panel.horizontal.basic-ui-kits-modals');
    });
    Route::get('/basic-ui-kits-paginations', function () {
        return view('templates.panel.horizontal.basic-ui-kits-paginations');
    });
    Route::get('/basic-ui-kits-popovers', function () {
        return view('templates.panel.horizontal.basic-ui-kits-popovers');
    });
    Route::get('/basic-ui-kits-progressbars', function () {
        return view('templates.panel.horizontal.basic-ui-kits-progressbars');
    });
    Route::get('/basic-ui-kits-spinners', function () {
        return view('templates.panel.horizontal.basic-ui-kits-spinners');
    });
    Route::get('/basic-ui-kits-tabs', function () {
        return view('templates.panel.horizontal.basic-ui-kits-tabs');
    });
    Route::get('/basic-ui-kits-toasts', function () {
        return view('templates.panel.horizontal.basic-ui-kits-toasts');
    });
    Route::get('/basic-ui-kits-tooltips', function () {
        return view('templates.panel.horizontal.basic-ui-kits-tooltips');
    });
    Route::get('/basic-ui-kits-typography', function () {
        return view('templates.panel.horizontal.basic-ui-kits-typography');
    });
    Route::get('/chart-c3', function () {
        return view('templates.panel.horizontal.chart-c3');
    });
    Route::get('/chart-chartistjs', function () {
        return view('templates.panel.horizontal.chart-chartistjs');
    });
    Route::get('/chart-chartjs', function () {
        return view('templates.panel.horizontal.chart-chartjs');
    });
    Route::get('/chart-flot', function () {
        return view('templates.panel.horizontal.chart-flot');
    });
    Route::get('/chart-knob', function () {
        return view('templates.panel.horizontal.chart-knob');
    });
    Route::get('/chart-morris', function () {
        return view('templates.panel.horizontal.chart-morris');
    });
    Route::get('/chart-piety', function () {
        return view('templates.panel.horizontal.chart-piety');
    });
    Route::get('/chart-sparkline', function () {
        return view('templates.panel.horizontal.chart-sparkline');
    });
    Route::get('/dashboard-analytics', function () {
        return view('templates.panel.horizontal.dashboard-analytics');
    });
    Route::get('/dashboard-ecommerce', function () {
        return view('templates.panel.horizontal.dashboard-ecommerce');
    });
    Route::get('/ecommerce-cart', function () {
        return view('templates.panel.horizontal.ecommerce-cart');
    });
    Route::get('/ecommerce-checkout', function () {
        return view('templates.panel.horizontal.ecommerce-checkout');
    });
    Route::get('/ecommerce-myaccount', function () {
        return view('templates.panel.horizontal.ecommerce-myaccount');
    });
    Route::get('/ecommerce-order-detail', function () {
        return view('templates.panel.horizontal.ecommerce-order-detail');
    });
    Route::get('/ecommerce-order-list', function () {
        return view('templates.panel.horizontal.ecommerce-order-list');
    });
    Route::get('/ecommerce-product-detail', function () {
        return view('templates.panel.horizontal.ecommerce-product-detail');
    });
    Route::get('/ecommerce-product-list', function () {
        return view('templates.panel.horizontal.ecommerce-product-list');
    });
    Route::get('/ecommerce-shop', function () {
        return view('templates.panel.horizontal.ecommerce-shop');
    });
    Route::get('/ecommerce-single-product', function () {
        return view('templates.panel.horizontal.ecommerce-single-product');
    });
    Route::get('/ecommerce-thankyou', function () {
        return view('templates.panel.horizontal.ecommerce-thankyou');
    });
    Route::get('/error-404', function () {
        return view('templates.panel.horizontal.error-404');
    });
    Route::get('/error-500', function () {
        return view('templates.panel.horizontal.error-500');
    });
    Route::get('/error-comingsoon', function () {
        return view('templates.panel.horizontal.error-comingsoon');
    });
    Route::get('/error-maintenance', function () {
        return view('templates.panel.horizontal.error-maintenance');
    });
    Route::get('/form-colorpickers', function () {
        return view('templates.panel.horizontal.form-colorpickers');
    });
    Route::get('/form-datepickers', function () {
        return view('templates.panel.horizontal.form-datepickers');
    });
    Route::get('/form-editors', function () {
        return view('templates.panel.horizontal.form-editors');
    });
    Route::get('/form-file-uploads', function () {
        return view('templates.panel.horizontal.form-file-uploads');
    });
    Route::get('/form-groups', function () {
        return view('templates.panel.horizontal.form-groups');
    });
    Route::get('/form-input-mask', function () {
        return view('templates.panel.horizontal.form-input-mask');
    });
    Route::get('/form-inputs', function () {
        return view('templates.panel.horizontal.form-inputs');
    });
    Route::get('/form-layouts', function () {
        return view('templates.panel.horizontal.form-layouts');
    });
    Route::get('/form-maxlength', function () {
        return view('templates.panel.horizontal.form-maxlength');
    });
    Route::get('/form-selects', function () {
        return view('templates.panel.horizontal.form-selects');
    });
    Route::get('/form-touchspin', function () {
        return view('templates.panel.horizontal.form-touchspin');
    });
    Route::get('/form-validations', function () {
        return view('templates.panel.horizontal.form-validations');
    });
    Route::get('/form-wizards', function () {
        return view('templates.panel.horizontal.form-wizards');
    });
    Route::get('/form-xeditable', function () {
        return view('templates.panel.horizontal.form-xeditable');
    });
    Route::get('/icon-dripicons', function () {
        return view('templates.panel.horizontal.icon-dripicons');
    });
    Route::get('/icon-feather', function () {
        return view('templates.panel.horizontal.icon-feather');
    });
    Route::get('/icon-flag', function () {
        return view('templates.panel.horizontal.icon-flag');
    });
    Route::get('/icon-font-awesome', function () {
        return view('templates.panel.horizontal.icon-font-awesome');
    });
    Route::get('/icon-ionicons', function () {
        return view('templates.panel.horizontal.icon-ionicons');
    });
    Route::get('/icon-line-awesome', function () {
        return view('templates.panel.horizontal.icon-line-awesome');
    });
    Route::get('/icon-material-design', function () {
        return view('templates.panel.horizontal.icon-material-design');
    });
    Route::get('/icon-simple-line', function () {
        return view('templates.panel.horizontal.icon-simple-line');
    });
    Route::get('/icon-socicon', function () {
        return view('templates.panel.horizontal.icon-socicon');
    });
    Route::get('/icon-themify', function () {
        return view('templates.panel.horizontal.icon-themify');
    });
    Route::get('/icon-theta', function () {
        return view('templates.panel.horizontal.icon-theta');
    });
    Route::get('/icon-typicons', function () {
        return view('templates.panel.horizontal.icon-typicons');
    });
    Route::get('/map-google', function () {
        return view('templates.panel.horizontal.map-google');
    });
    Route::get('/map-vector', function () {
        return view('templates.panel.horizontal.map-vector');
    });
    Route::get('/page-blog', function () {
        return view('templates.panel.horizontal.page-blog');
    });
    Route::get('/page-faq', function () {
        return view('templates.panel.horizontal.page-faq');
    });
    Route::get('/page-gallery', function () {
        return view('templates.panel.horizontal.page-gallery');
    });
    Route::get('/page-invoice', function () {
        return view('templates.panel.horizontal.page-invoice');
    });
    Route::get('/page-pricing', function () {
        return view('templates.panel.horizontal.page-pricing');
    });
    Route::get('/page-starter', function () {
        return view('templates.panel.horizontal.page-starter');
    });
    Route::get('/page-timeline', function () {
        return view('templates.panel.horizontal.page-timeline');
    });
    Route::get('/table-bootstrap', function () {
        return view('templates.panel.horizontal.table-bootstrap');
    });
    Route::get('/table-datatable', function () {
        return view('templates.panel.horizontal.table-datatable');
    });
    Route::get('/table-editable', function () {
        return view('templates.panel.horizontal.table-editable');
    });
    Route::get('/table-footable', function () {
        return view('templates.panel.horizontal.table-footable');
    });
    Route::get('/table-rwdtable', function () {
        return view('templates.panel.horizontal.table-rwdtable');
    });
    Route::get('/user-forgotpsw', function () {
        return view('templates.panel.horizontal.user-forgotpsw');
    });
    Route::get('/user-lock-screen', function () {
        return view('templates.panel.horizontal.user-lock-screen');
    });
    Route::get('/user-login', function () {
        return view('templates.panel.horizontal.user-login');
    });
    Route::get('/user-register', function () {
        return view('templates.panel.horizontal.user-register');
    });
    Route::get('/widgets', function () {
        return view('templates.panel.horizontal.widgets');
    });

});
