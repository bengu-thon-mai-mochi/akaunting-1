<?php

namespace App\Http\ViewComposers;

use App\Traits\Modules as RemoteModules;
use Cache;
use Date;
use Illuminate\View\View;

class Modules
{
    use RemoteModules;

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {       
        $translations = $this->getTranslations();

        if (setting('apps.api_key')) {
            $categories = Cache::remember('modules.categories.' . language()->getShortCode(), Date::now()->addHour(6), function () {
                return collect($this->getCategoriesOfModules())->pluck('name', 'slug')
                    ->prepend(trans('general.all_type', ['type' => trans_choice('general.categories', 2)]), '*');
            });
        } else {
            $categories = collect([
                '*' => trans('general.all_type', ['type' => trans_choice('general.categories', 2)]),
            ]);
        }
        $view->with([
            'translations' => $translations,
            'categories' => $categories,
        ]);
    }

    protected function getTranslations()
    {
            return [
                'header' => [
                      'title' => trans_choice('general.modules', 2),
                      'api_key' => trans('modules.api_key'),
                      'my_apps' => trans('modules.my_apps'),
                ],
                    'my' => [
                        'purchased' => trans('modules.my.purchased'),
                        'installed' => trans('modules.my.installed'),
                    ],

                'general' => [
                      'top_paid' => trans_choice('modules.top_paid', 1),
                      'new' => trans('modules.new'),
                      'top_new' => trans('modules.new'),
                      'free' => trans('modules.free'),
                      'pre_sale' => trans('modules.pre_sale'),
                      'top_free' =>  trans('modules.top_free'),
                      'installed' => trans('modules.badge.installed'),
                      'recommended_apps' => trans('modules.recommended_apps'),
                     
                    'back'   => trans('modules.back'),
                    'installation'   => trans('modules.tab.installation'),
                   
                    'pre_sale'  => trans('modules.badge.pre_sale'),
                     'search'   => trans('general.search'),
                ],
                'installation' => [
                    'header'  =>  trans('modules.installation.header'),
                ],
                'noApps' => [
                    'no_apps' => trans('modules.no_apps'),
                    'become_developer' => trans('modules.become_developer')
                ],
                'detail' => [
                    'installed' => trans('modules.badge.installed'),
                    'actions' => trans('general.actions'),
                    'about' => trans('modules.about'),
                    'developers' => trans('general.developers'),
                    'added' =>  trans('modules.added'),
                    'updated' =>  trans('modules.updated'),
                    'compatibility' => trans('modules.compatibility'),
                    'documentation' => trans('modules.documentation'),
                    'view'  => trans('modules.view'),
                    'categories' => trans_choice('general.categories', 2),
                     'version' => trans('footer.version'),
                     'description' => trans('general.description'),
                      'faq'   => trans('modules.tab.faq'),
                    'reviews'   => trans('modules.tab.reviews'),
                ], 
                'searchBar' => [
                    'category_placeHolder' => trans('general.form.select.field',['field' => trans_choice('general.categories', 1)]), 
                    'search_placeholder' => trans('general.search_placeholder'), 
                ],
                'api_key' => [
                    'enter' => trans('general.form.enter', ['field' => trans('modules.api_key')]),
                    'get_api_key' =>trans('modules.get_api_key')
                ],
                'actions' => [
                    'save' => trans('general.save'),
                    'cancel' =>trans('general.cancel'),
                    'next' => trans('pagination.next'),
                    'previous' => trans('pagination.previous'),
                    'install' => trans('modules.installation.install'),
                    'uninstall' => trans('modules.installation.uninstall'),
                    'enable' => trans('general.enable'),
                    'disable' => trans('general.disable'),
                    'buy_now' => trans('modules.buy_now'),
                ],
                 'reviews' => [
                    'add' => trans('modules.reviews.add'),
                    'na' =>trans('modules.reviews.na'),
                ]

            ];
    }
}
