<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('series');
App::getRouter()->setLoginRoute('login');

Utils::addRoute('series',                       'SeriesCtrl');

Utils::addRoute('seriesAdd',                    'SeriesEditCtrl',                   ['moderator']);
Utils::addRoute('seriesEdit',                   'SeriesEditCtrl',                   ['moderator']);
Utils::addRoute('seriesDelete',                 'SeriesEditCtrl',                   ['moderator']);
Utils::addRoute('seriesSave',                   'SeriesEditCtrl',                   ['moderator']);
Utils::addRoute('seriesFavouriteAdd',           'SeriesEditCtrl',                   ['user']);
Utils::addRoute('seriesFavouriteDelete',        'SeriesEditCtrl',                   ['user']);

Utils::addRoute('calendar',                     'CalendarCtrl');

Utils::addRoute('calendarAdd',                  'CalendarEditCtrl',                 ['moderator']);
Utils::addRoute('calendarEdit',                 'CalendarEditCtrl',                 ['moderator']);
Utils::addRoute('calendarDelete',               'CalendarEditCtrl',                 ['moderator']);
Utils::addRoute('calendarSave',                 'CalendarEditCtrl',                 ['moderator']);

Utils::addRoute('favourites',                   'FavouritesCtrl',                   ['user']);

Utils::addRoute('manage',                       'ManageCtrl',                       ['admin']);
Utils::addRoute('manageDeleteUser',             'ManageCtrl',                       ['admin']);

Utils::addRoute('manageEdit',                   'ManageEditCtrl',                   ['admin']);
Utils::addRoute('manageSave',                   'ManageEditCtrl',                   ['admin']);
Utils::addRoute('manageDelete',                 'ManageEditCtrl',                   ['admin']);

Utils::addRoute('loginShow',                    'LoginCtrl');
Utils::addRoute('login',                        'LoginCtrl');
Utils::addRoute('logout',                       'LoginCtrl');

Utils::addRoute('signinShow',                   'SigninCtrl');
Utils::addRoute('signin',                       'SigninCtrl');