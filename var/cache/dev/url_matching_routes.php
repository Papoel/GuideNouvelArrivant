<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/admin' => [[['_route' => 'admin', '_controller' => 'App\\Controller\\Admin\\DashboardController::index', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => null, 'crudAction' => null], null, null, null, false, false, null]],
        '/admin/action' => [[['_route' => 'admin_action_index', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Action\\ActionCrudController::index', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Action\\ActionCrudController', 'crudAction' => 'index'], null, ['GET' => 0], null, false, false, null]],
        '/admin/action/new' => [[['_route' => 'admin_action_new', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Action\\ActionCrudController::new', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Action\\ActionCrudController', 'crudAction' => 'new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/action/batch-delete' => [[['_route' => 'admin_action_batch_delete', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Action\\ActionCrudController::batchDelete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Action\\ActionCrudController', 'crudAction' => 'batchDelete'], null, ['POST' => 0], null, false, false, null]],
        '/admin/action/autocomplete' => [[['_route' => 'admin_action_autocomplete', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Action\\ActionCrudController::autocomplete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Action\\ActionCrudController', 'crudAction' => 'autocomplete'], null, ['GET' => 0], null, false, false, null]],
        '/admin/action/render-filters' => [[['_route' => 'admin_action_render_filters', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Action\\ActionCrudController::renderFilters', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Action\\ActionCrudController', 'crudAction' => 'renderFilters'], null, ['GET' => 0], null, false, false, null]],
        '/admin/job' => [[['_route' => 'admin_job_index', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Job\\JobCrudController::index', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Job\\JobCrudController', 'crudAction' => 'index'], null, ['GET' => 0], null, false, false, null]],
        '/admin/job/new' => [[['_route' => 'admin_job_new', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Job\\JobCrudController::new', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Job\\JobCrudController', 'crudAction' => 'new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/job/batch-delete' => [[['_route' => 'admin_job_batch_delete', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Job\\JobCrudController::batchDelete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Job\\JobCrudController', 'crudAction' => 'batchDelete'], null, ['POST' => 0], null, false, false, null]],
        '/admin/job/autocomplete' => [[['_route' => 'admin_job_autocomplete', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Job\\JobCrudController::autocomplete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Job\\JobCrudController', 'crudAction' => 'autocomplete'], null, ['GET' => 0], null, false, false, null]],
        '/admin/job/render-filters' => [[['_route' => 'admin_job_render_filters', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Job\\JobCrudController::renderFilters', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Job\\JobCrudController', 'crudAction' => 'renderFilters'], null, ['GET' => 0], null, false, false, null]],
        '/admin/logbook' => [[['_route' => 'admin_logbook_index', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Logbook\\LogbookCrudController::index', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Logbook\\LogbookCrudController', 'crudAction' => 'index'], null, ['GET' => 0], null, false, false, null]],
        '/admin/logbook/new' => [[['_route' => 'admin_logbook_new', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Logbook\\LogbookCrudController::new', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Logbook\\LogbookCrudController', 'crudAction' => 'new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/logbook/batch-delete' => [[['_route' => 'admin_logbook_batch_delete', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Logbook\\LogbookCrudController::batchDelete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Logbook\\LogbookCrudController', 'crudAction' => 'batchDelete'], null, ['POST' => 0], null, false, false, null]],
        '/admin/logbook/autocomplete' => [[['_route' => 'admin_logbook_autocomplete', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Logbook\\LogbookCrudController::autocomplete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Logbook\\LogbookCrudController', 'crudAction' => 'autocomplete'], null, ['GET' => 0], null, false, false, null]],
        '/admin/logbook/render-filters' => [[['_route' => 'admin_logbook_render_filters', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Logbook\\LogbookCrudController::renderFilters', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Logbook\\LogbookCrudController', 'crudAction' => 'renderFilters'], null, ['GET' => 0], null, false, false, null]],
        '/admin/logbook-template' => [[['_route' => 'admin_logbook_template_index', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Logbook_Models\\LogbookTemplateCrudController::index', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Logbook_Models\\LogbookTemplateCrudController', 'crudAction' => 'index'], null, ['GET' => 0], null, false, false, null]],
        '/admin/logbook-template/new' => [[['_route' => 'admin_logbook_template_new', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Logbook_Models\\LogbookTemplateCrudController::new', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Logbook_Models\\LogbookTemplateCrudController', 'crudAction' => 'new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/logbook-template/batch-delete' => [[['_route' => 'admin_logbook_template_batch_delete', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Logbook_Models\\LogbookTemplateCrudController::batchDelete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Logbook_Models\\LogbookTemplateCrudController', 'crudAction' => 'batchDelete'], null, ['POST' => 0], null, false, false, null]],
        '/admin/logbook-template/autocomplete' => [[['_route' => 'admin_logbook_template_autocomplete', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Logbook_Models\\LogbookTemplateCrudController::autocomplete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Logbook_Models\\LogbookTemplateCrudController', 'crudAction' => 'autocomplete'], null, ['GET' => 0], null, false, false, null]],
        '/admin/logbook-template/render-filters' => [[['_route' => 'admin_logbook_template_render_filters', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Logbook_Models\\LogbookTemplateCrudController::renderFilters', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Logbook_Models\\LogbookTemplateCrudController', 'crudAction' => 'renderFilters'], null, ['GET' => 0], null, false, false, null]],
        '/admin/module' => [[['_route' => 'admin_module_index', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Module\\ModuleCrudController::index', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Module\\ModuleCrudController', 'crudAction' => 'index'], null, ['GET' => 0], null, false, false, null]],
        '/admin/module/new' => [[['_route' => 'admin_module_new', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Module\\ModuleCrudController::new', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Module\\ModuleCrudController', 'crudAction' => 'new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/module/batch-delete' => [[['_route' => 'admin_module_batch_delete', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Module\\ModuleCrudController::batchDelete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Module\\ModuleCrudController', 'crudAction' => 'batchDelete'], null, ['POST' => 0], null, false, false, null]],
        '/admin/module/autocomplete' => [[['_route' => 'admin_module_autocomplete', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Module\\ModuleCrudController::autocomplete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Module\\ModuleCrudController', 'crudAction' => 'autocomplete'], null, ['GET' => 0], null, false, false, null]],
        '/admin/module/render-filters' => [[['_route' => 'admin_module_render_filters', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Module\\ModuleCrudController::renderFilters', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Module\\ModuleCrudController', 'crudAction' => 'renderFilters'], null, ['GET' => 0], null, false, false, null]],
        '/admin/service' => [[['_route' => 'admin_service_index', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Service\\ServiceCrudController::index', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Service\\ServiceCrudController', 'crudAction' => 'index'], null, ['GET' => 0], null, false, false, null]],
        '/admin/service/new' => [[['_route' => 'admin_service_new', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Service\\ServiceCrudController::new', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Service\\ServiceCrudController', 'crudAction' => 'new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/service/batch-delete' => [[['_route' => 'admin_service_batch_delete', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Service\\ServiceCrudController::batchDelete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Service\\ServiceCrudController', 'crudAction' => 'batchDelete'], null, ['POST' => 0], null, false, false, null]],
        '/admin/service/autocomplete' => [[['_route' => 'admin_service_autocomplete', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Service\\ServiceCrudController::autocomplete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Service\\ServiceCrudController', 'crudAction' => 'autocomplete'], null, ['GET' => 0], null, false, false, null]],
        '/admin/service/render-filters' => [[['_route' => 'admin_service_render_filters', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Service\\ServiceCrudController::renderFilters', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Service\\ServiceCrudController', 'crudAction' => 'renderFilters'], null, ['GET' => 0], null, false, false, null]],
        '/admin/speciality' => [[['_route' => 'admin_speciality_index', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Speciality\\SpecialityCrudController::index', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Speciality\\SpecialityCrudController', 'crudAction' => 'index'], null, ['GET' => 0], null, false, false, null]],
        '/admin/speciality/new' => [[['_route' => 'admin_speciality_new', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Speciality\\SpecialityCrudController::new', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Speciality\\SpecialityCrudController', 'crudAction' => 'new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/speciality/batch-delete' => [[['_route' => 'admin_speciality_batch_delete', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Speciality\\SpecialityCrudController::batchDelete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Speciality\\SpecialityCrudController', 'crudAction' => 'batchDelete'], null, ['POST' => 0], null, false, false, null]],
        '/admin/speciality/autocomplete' => [[['_route' => 'admin_speciality_autocomplete', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Speciality\\SpecialityCrudController::autocomplete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Speciality\\SpecialityCrudController', 'crudAction' => 'autocomplete'], null, ['GET' => 0], null, false, false, null]],
        '/admin/speciality/render-filters' => [[['_route' => 'admin_speciality_render_filters', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Speciality\\SpecialityCrudController::renderFilters', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Speciality\\SpecialityCrudController', 'crudAction' => 'renderFilters'], null, ['GET' => 0], null, false, false, null]],
        '/admin/theme' => [[['_route' => 'admin_theme_index', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Theme\\ThemeCrudController::index', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Theme\\ThemeCrudController', 'crudAction' => 'index'], null, ['GET' => 0], null, false, false, null]],
        '/admin/theme/new' => [[['_route' => 'admin_theme_new', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Theme\\ThemeCrudController::new', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Theme\\ThemeCrudController', 'crudAction' => 'new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/theme/batch-delete' => [[['_route' => 'admin_theme_batch_delete', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Theme\\ThemeCrudController::batchDelete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Theme\\ThemeCrudController', 'crudAction' => 'batchDelete'], null, ['POST' => 0], null, false, false, null]],
        '/admin/theme/autocomplete' => [[['_route' => 'admin_theme_autocomplete', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Theme\\ThemeCrudController::autocomplete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Theme\\ThemeCrudController', 'crudAction' => 'autocomplete'], null, ['GET' => 0], null, false, false, null]],
        '/admin/theme/render-filters' => [[['_route' => 'admin_theme_render_filters', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Theme\\ThemeCrudController::renderFilters', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Theme\\ThemeCrudController', 'crudAction' => 'renderFilters'], null, ['GET' => 0], null, false, false, null]],
        '/admin/user' => [[['_route' => 'admin_user_index', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\User\\UserCrudController::index', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\User\\UserCrudController', 'crudAction' => 'index'], null, ['GET' => 0], null, false, false, null]],
        '/admin/user/new' => [[['_route' => 'admin_user_new', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\User\\UserCrudController::new', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\User\\UserCrudController', 'crudAction' => 'new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/user/batch-delete' => [[['_route' => 'admin_user_batch_delete', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\User\\UserCrudController::batchDelete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\User\\UserCrudController', 'crudAction' => 'batchDelete'], null, ['POST' => 0], null, false, false, null]],
        '/admin/user/autocomplete' => [[['_route' => 'admin_user_autocomplete', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\User\\UserCrudController::autocomplete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\User\\UserCrudController', 'crudAction' => 'autocomplete'], null, ['GET' => 0], null, false, false, null]],
        '/admin/user/render-filters' => [[['_route' => 'admin_user_render_filters', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\User\\UserCrudController::renderFilters', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\User\\UserCrudController', 'crudAction' => 'renderFilters'], null, ['GET' => 0], null, false, false, null]],
        '/_wdt/styles' => [[['_route' => '_wdt_stylesheet', '_controller' => 'web_profiler.controller.profiler::toolbarStylesheetAction'], null, null, null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/admin/progress' => [[['_route' => 'admin_progress_dashboard', '_controller' => 'App\\Controller\\Admin\\Progress\\ProgressController::dashboard'], null, ['GET' => 0], null, true, false, null]],
        '/admin/progress/feedbacks' => [[['_route' => 'admin_progress_feedbacks', '_controller' => 'App\\Controller\\Admin\\Progress\\ProgressController::feedbacks'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/service/analyse-processus' => [[['_route' => 'service_analyse_processus_index', '_controller' => 'App\\Controller\\Admin\\Service\\AnalyseProcessusController::analyseProcessus'], null, null, null, true, false, null]],
        '/admin/users/batch-assign-templates' => [[['_route' => 'admin_batch_assign_templates', '_controller' => 'App\\Controller\\Admin\\User\\UserLogbookController::batchAssignTemplates'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/' => [[['_route' => 'home_index', '_controller' => 'App\\Controller\\App\\HomeController::index'], null, null, null, false, false, null]],
        '/politique-confidentialite' => [[['_route' => 'app_privacy_policy', '_controller' => 'App\\Controller\\App\\LegalController::privacyPolicy'], null, null, null, false, false, null]],
        '/mentions-legales' => [[['_route' => 'app_legal_notices', '_controller' => 'App\\Controller\\App\\LegalController::legalNotices'], null, null, null, false, false, null]],
        '/pages/guide-technique' => [[['_route' => 'pages_guide_technique', '_controller' => 'App\\Controller\\App\\Pages\\PagesController::guideTechnique'], null, null, null, false, false, null]],
        '/pages/processus-elementaire' => [[['_route' => 'pages_processus_elementaire', '_controller' => 'App\\Controller\\App\\Pages\\PagesController::processusElementaire'], null, null, null, false, false, null]],
        '/mailing/preview' => [[['_route' => 'app_mailing_preview', '_controller' => 'App\\Controller\\Mail_Testing\\MailController::preview'], null, null, null, false, false, null]],
        '/mailing/send' => [[['_route' => 'app_mailing_send', '_controller' => 'App\\Controller\\Mail_Testing\\MailController::sendEmails'], null, null, null, false, false, null]],
        '/reset-password' => [[['_route' => 'app_forgot_password_request', '_controller' => 'App\\Controller\\Security\\ResetPasswordController::request'], null, null, null, false, false, null]],
        '/reset-password/check-email' => [[['_route' => 'app_check_email', '_controller' => 'App\\Controller\\Security\\ResetPasswordController::checkEmail'], null, null, null, false, false, null]],
        '/connexion' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\Security\\SecurityController::login'], null, null, null, false, false, null]],
        '/deconnexion' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\Security\\SecurityController::logout'], null, null, null, false, false, null]],
        '/profile/delete-account' => [[['_route' => 'app_account_deletion_request', '_controller' => 'App\\Controller\\User\\AccountDeletionController::requestDeletion'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/profile/delete-account/cancel' => [[['_route' => 'app_account_deletion_cancel', '_controller' => 'App\\Controller\\User\\AccountDeletionController::cancelDeletion'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/profile/export-data' => [[['_route' => 'app_user_export_data', '_controller' => 'App\\Controller\\User\\UserDataExportController::exportData'], null, ['GET' => 0], null, false, false, null]],
        '/profile/settings' => [[['_route' => 'app_user_profile_settings', '_controller' => 'App\\Controller\\User\\UserProfileController::settings'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/admin/(?'
                    .'|action/([^/]++)(?'
                        .'|/(?'
                            .'|edit(*:43)'
                            .'|delete(*:56)'
                        .')'
                        .'|(*:64)'
                    .')'
                    .'|job/([^/]++)(?'
                        .'|/(?'
                            .'|edit(*:95)'
                            .'|delete(*:108)'
                        .')'
                        .'|(*:117)'
                    .')'
                    .'|logbook(?'
                        .'|/([^/]++)(?'
                            .'|/(?'
                                .'|edit(*:156)'
                                .'|delete(*:170)'
                                .'|remove\\-theme/([^/]++)(*:200)'
                            .')'
                            .'|(*:209)'
                        .')'
                        .'|\\-template/([^/]++)(?'
                            .'|/(?'
                                .'|edit(*:248)'
                                .'|delete(*:262)'
                            .')'
                            .'|(*:271)'
                        .')'
                    .')'
                    .'|module/([^/]++)(?'
                        .'|/(?'
                            .'|edit(*:307)'
                            .'|delete(*:321)'
                        .')'
                        .'|(*:330)'
                    .')'
                    .'|s(?'
                        .'|ervice/([^/]++)(?'
                            .'|/(?'
                                .'|edit(*:369)'
                                .'|delete(*:383)'
                            .')'
                            .'|(*:392)'
                        .')'
                        .'|peciality/([^/]++)(?'
                            .'|/(?'
                                .'|edit(*:430)'
                                .'|delete(*:444)'
                            .')'
                            .'|(*:453)'
                        .')'
                    .')'
                    .'|theme/([^/]++)(?'
                        .'|/(?'
                            .'|edit(*:488)'
                            .'|delete(*:502)'
                        .')'
                        .'|(*:511)'
                    .')'
                    .'|user(?'
                        .'|/([^/]++)(?'
                            .'|/(?'
                                .'|edit(*:547)'
                                .'|delete(*:561)'
                            .')'
                            .'|(*:570)'
                        .')'
                        .'|s/([^/]++)/assign\\-template(*:606)'
                    .')'
                    .'|progress/(?'
                        .'|user/([^/]++)(?'
                            .'|(*:643)'
                            .'|/workbook/pdf(*:664)'
                        .')'
                        .'|feedback(?'
                            .'|/([^/]++)(*:693)'
                            .'|s/service/([^/]++)(*:719)'
                        .')'
                    .')'
                .')'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:761)'
                    .'|components/([^/]++)(?:/([^/]++))?(*:802)'
                    .'|wdt/([^/]++)(*:822)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:864)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:901)'
                                .'|router(*:915)'
                                .'|exception(?'
                                    .'|(*:935)'
                                    .'|\\.css(*:948)'
                                .')'
                            .')'
                            .'|(*:958)'
                        .')'
                    .')'
                .')'
                .'|/d(?'
                    .'|eletion\\-cancel/([^/]++)(*:998)'
                    .'|ashboard/(?'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|module/([^/]++)(?'
                                    .'|/c(?'
                                        .'|arnet/([^/]++)/edit(*:1075)'
                                        .'|omment\\-clear(*:1097)'
                                    .')'
                                    .'|(*:1107)'
                                .')'
                                .'|feedback/(?'
                                    .'|my\\-feedbacks(?'
                                        .'|(*:1145)'
                                        .'|/([^/]++)(*:1163)'
                                    .')'
                                    .'|new(*:1176)'
                                    .'|list(*:1189)'
                                    .'|([^/]++)/review(*:1213)'
                                .')'
                            .')'
                            .'|(*:1224)'
                        .')'
                        .'|mentor/([^/]++)(?'
                            .'|(*:1252)'
                            .'|/padawan/([^/]++)/carnet/([^/]++)(?'
                                .'|(*:1297)'
                                .'|/module/([^/]++)/action/([^/]++)/(?'
                                    .'|comments/edit(*:1355)'
                                    .'|validate(*:1372)'
                                    .'|invalidate(*:1391)'
                                    .'|delete\\-mentor\\-comment(*:1423)'
                                .')'
                            .')'
                        .')'
                    .')'
                .')'
                .'|/reset\\-password/reset(?:/([^/]++))?(*:1473)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        43 => [[['_route' => 'admin_action_edit', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Action\\ActionCrudController::edit', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Action\\ActionCrudController', 'crudAction' => 'edit'], ['entityId'], ['GET' => 0, 'POST' => 1, 'PATCH' => 2], null, false, false, null]],
        56 => [[['_route' => 'admin_action_delete', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Action\\ActionCrudController::delete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Action\\ActionCrudController', 'crudAction' => 'delete'], ['entityId'], ['POST' => 0], null, false, false, null]],
        64 => [[['_route' => 'admin_action_detail', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Action\\ActionCrudController::detail', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Action\\ActionCrudController', 'crudAction' => 'detail'], ['entityId'], ['GET' => 0], null, false, true, null]],
        95 => [[['_route' => 'admin_job_edit', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Job\\JobCrudController::edit', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Job\\JobCrudController', 'crudAction' => 'edit'], ['entityId'], ['GET' => 0, 'POST' => 1, 'PATCH' => 2], null, false, false, null]],
        108 => [[['_route' => 'admin_job_delete', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Job\\JobCrudController::delete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Job\\JobCrudController', 'crudAction' => 'delete'], ['entityId'], ['POST' => 0], null, false, false, null]],
        117 => [[['_route' => 'admin_job_detail', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Job\\JobCrudController::detail', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Job\\JobCrudController', 'crudAction' => 'detail'], ['entityId'], ['GET' => 0], null, false, true, null]],
        156 => [[['_route' => 'admin_logbook_edit', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Logbook\\LogbookCrudController::edit', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Logbook\\LogbookCrudController', 'crudAction' => 'edit'], ['entityId'], ['GET' => 0, 'POST' => 1, 'PATCH' => 2], null, false, false, null]],
        170 => [[['_route' => 'admin_logbook_delete', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Logbook\\LogbookCrudController::delete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Logbook\\LogbookCrudController', 'crudAction' => 'delete'], ['entityId'], ['POST' => 0], null, false, false, null]],
        200 => [[['_route' => 'admin_logbook_remove_theme', '_controller' => 'App\\Controller\\Admin\\Logbook\\LogbookCrudController::removeTheme'], ['id', 'themeId'], null, null, false, true, null]],
        209 => [[['_route' => 'admin_logbook_detail', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Logbook\\LogbookCrudController::detail', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Logbook\\LogbookCrudController', 'crudAction' => 'detail'], ['entityId'], ['GET' => 0], null, false, true, null]],
        248 => [[['_route' => 'admin_logbook_template_edit', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Logbook_Models\\LogbookTemplateCrudController::edit', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Logbook_Models\\LogbookTemplateCrudController', 'crudAction' => 'edit'], ['entityId'], ['GET' => 0, 'POST' => 1, 'PATCH' => 2], null, false, false, null]],
        262 => [[['_route' => 'admin_logbook_template_delete', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Logbook_Models\\LogbookTemplateCrudController::delete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Logbook_Models\\LogbookTemplateCrudController', 'crudAction' => 'delete'], ['entityId'], ['POST' => 0], null, false, false, null]],
        271 => [[['_route' => 'admin_logbook_template_detail', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Logbook_Models\\LogbookTemplateCrudController::detail', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Logbook_Models\\LogbookTemplateCrudController', 'crudAction' => 'detail'], ['entityId'], ['GET' => 0], null, false, true, null]],
        307 => [[['_route' => 'admin_module_edit', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Module\\ModuleCrudController::edit', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Module\\ModuleCrudController', 'crudAction' => 'edit'], ['entityId'], ['GET' => 0, 'POST' => 1, 'PATCH' => 2], null, false, false, null]],
        321 => [[['_route' => 'admin_module_delete', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Module\\ModuleCrudController::delete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Module\\ModuleCrudController', 'crudAction' => 'delete'], ['entityId'], ['POST' => 0], null, false, false, null]],
        330 => [[['_route' => 'admin_module_detail', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Module\\ModuleCrudController::detail', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Module\\ModuleCrudController', 'crudAction' => 'detail'], ['entityId'], ['GET' => 0], null, false, true, null]],
        369 => [[['_route' => 'admin_service_edit', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Service\\ServiceCrudController::edit', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Service\\ServiceCrudController', 'crudAction' => 'edit'], ['entityId'], ['GET' => 0, 'POST' => 1, 'PATCH' => 2], null, false, false, null]],
        383 => [[['_route' => 'admin_service_delete', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Service\\ServiceCrudController::delete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Service\\ServiceCrudController', 'crudAction' => 'delete'], ['entityId'], ['POST' => 0], null, false, false, null]],
        392 => [[['_route' => 'admin_service_detail', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Service\\ServiceCrudController::detail', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Service\\ServiceCrudController', 'crudAction' => 'detail'], ['entityId'], ['GET' => 0], null, false, true, null]],
        430 => [[['_route' => 'admin_speciality_edit', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Speciality\\SpecialityCrudController::edit', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Speciality\\SpecialityCrudController', 'crudAction' => 'edit'], ['entityId'], ['GET' => 0, 'POST' => 1, 'PATCH' => 2], null, false, false, null]],
        444 => [[['_route' => 'admin_speciality_delete', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Speciality\\SpecialityCrudController::delete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Speciality\\SpecialityCrudController', 'crudAction' => 'delete'], ['entityId'], ['POST' => 0], null, false, false, null]],
        453 => [[['_route' => 'admin_speciality_detail', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Speciality\\SpecialityCrudController::detail', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Speciality\\SpecialityCrudController', 'crudAction' => 'detail'], ['entityId'], ['GET' => 0], null, false, true, null]],
        488 => [[['_route' => 'admin_theme_edit', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Theme\\ThemeCrudController::edit', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Theme\\ThemeCrudController', 'crudAction' => 'edit'], ['entityId'], ['GET' => 0, 'POST' => 1, 'PATCH' => 2], null, false, false, null]],
        502 => [[['_route' => 'admin_theme_delete', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Theme\\ThemeCrudController::delete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Theme\\ThemeCrudController', 'crudAction' => 'delete'], ['entityId'], ['POST' => 0], null, false, false, null]],
        511 => [[['_route' => 'admin_theme_detail', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\Theme\\ThemeCrudController::detail', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\Theme\\ThemeCrudController', 'crudAction' => 'detail'], ['entityId'], ['GET' => 0], null, false, true, null]],
        547 => [[['_route' => 'admin_user_edit', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\User\\UserCrudController::edit', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\User\\UserCrudController', 'crudAction' => 'edit'], ['entityId'], ['GET' => 0, 'POST' => 1, 'PATCH' => 2], null, false, false, null]],
        561 => [[['_route' => 'admin_user_delete', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\User\\UserCrudController::delete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\User\\UserCrudController', 'crudAction' => 'delete'], ['entityId'], ['POST' => 0], null, false, false, null]],
        570 => [[['_route' => 'admin_user_detail', '_locale' => 'fr', '_controller' => 'App\\Controller\\Admin\\User\\UserCrudController::detail', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\User\\UserCrudController', 'crudAction' => 'detail'], ['entityId'], ['GET' => 0], null, false, true, null]],
        606 => [[['_route' => 'admin_user_assign_template', '_controller' => 'App\\Controller\\Admin\\User\\UserLogbookController::assignTemplate'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        643 => [[['_route' => 'admin_progress_user_details', '_controller' => 'App\\Controller\\Admin\\Progress\\ProgressController::userProgressDetails'], ['id'], ['GET' => 0], null, false, true, null]],
        664 => [[['_route' => 'admin_progress_generate_workbook', '_controller' => 'App\\Controller\\Admin\\Progress\\ProgressController::generateWorkbook'], ['id'], ['GET' => 0], null, false, false, null]],
        693 => [[['_route' => 'admin_progress_feedback_detail', '_controller' => 'App\\Controller\\Admin\\Progress\\ProgressController::feedbackDetail'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        719 => [[['_route' => 'admin_progress_service_feedbacks', '_controller' => 'App\\Controller\\Admin\\Progress\\ProgressController::serviceFeedbacks'], ['name'], ['GET' => 0], null, false, true, null]],
        761 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        802 => [[['_route' => 'ux_live_component', '_live_action' => 'get'], ['_live_component', '_live_action'], null, null, false, true, null]],
        822 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        864 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        901 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        915 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        935 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        948 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        958 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        998 => [[['_route' => 'app_account_deletion_cancel_by_token', '_controller' => 'App\\Controller\\App\\AccountDeletionPublicController::cancelByToken'], ['token'], ['GET' => 0], null, false, true, null]],
        1075 => [[['_route' => 'action_edit', '_controller' => 'App\\Controller\\App\\Dashboard\\ActionController::edit'], ['nni', 'moduleId', 'logbookId'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1097 => [[['_route' => 'action_clear', '_controller' => 'App\\Controller\\App\\Dashboard\\ActionController::clearComment'], ['nni', 'id'], ['GET' => 0], null, false, false, null]],
        1107 => [[['_route' => 'action_delete', '_controller' => 'App\\Controller\\App\\Dashboard\\ActionController::delete'], ['nni', 'id'], ['POST' => 0], null, false, true, null]],
        1145 => [[['_route' => 'my_feedbacks_index', '_controller' => 'App\\Controller\\App\\Dashboard\\FeedbackController::index'], ['nni'], ['GET' => 0], null, false, false, null]],
        1163 => [[['_route' => 'my_feedbacks_detail', '_controller' => 'App\\Controller\\App\\Dashboard\\FeedbackController::detail'], ['nni', 'id'], ['GET' => 0], null, false, true, null]],
        1176 => [[['_route' => 'my_feedbacks_new', '_controller' => 'App\\Controller\\App\\Dashboard\\FeedbackController::new'], ['nni'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1189 => [[['_route' => 'my_feedbacks_list', '_controller' => 'App\\Controller\\App\\Dashboard\\FeedbackController::list'], ['nni'], ['GET' => 0], null, false, false, null]],
        1213 => [[['_route' => 'my_feedbacks_review', '_controller' => 'App\\Controller\\App\\Dashboard\\FeedbackController::review'], ['nni', 'id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1224 => [[['_route' => 'dashboard_index', '_controller' => 'App\\Controller\\App\\Dashboard\\DashboardController::index'], ['nni'], ['GET' => 0, 'POST' => 1], null, true, true, null]],
        1252 => [[['_route' => 'mentor_dashboard_index', '_controller' => 'App\\Controller\\App\\Dashboard\\Mentor\\MentorDashboardController::index'], ['nni'], ['GET' => 0], null, true, true, null]],
        1297 => [[['_route' => 'mentor_logbook_details', '_controller' => 'App\\Controller\\App\\Dashboard\\Mentor\\MentorLogbookController::details'], ['nni', 'padawanNni', 'id'], ['GET' => 0], null, false, true, null]],
        1355 => [[['_route' => 'mentor_logbook_action_edit', '_controller' => 'App\\Controller\\App\\Dashboard\\Mentor\\MentorLogbookController::edit'], ['nni', 'padawanNni', 'logbookId', 'moduleId', 'actionId'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1372 => [[['_route' => 'mentor_logbook_action_validate', '_controller' => 'App\\Controller\\App\\Dashboard\\Mentor\\MentorLogbookController::validate'], ['nni', 'padawanNni', 'logbookId', 'moduleId', 'actionId'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1391 => [[['_route' => 'mentor_logbook_action_invalidate', '_controller' => 'App\\Controller\\App\\Dashboard\\Mentor\\MentorLogbookController::invalidate'], ['nni', 'padawanNni', 'logbookId', 'moduleId', 'actionId'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1423 => [[['_route' => 'mentor_logbook_action_delete_comment', '_controller' => 'App\\Controller\\App\\Dashboard\\Mentor\\MentorLogbookController::deleteComment'], ['nni', 'padawanNni', 'logbookId', 'moduleId', 'actionId'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1473 => [
            [['_route' => 'app_reset_password', 'token' => null, '_controller' => 'App\\Controller\\Security\\ResetPasswordController::reset'], ['token'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
