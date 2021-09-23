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

    public function getNewVersion()
    {
        return ($this->argument('new') == 'latest') ? Versions::latest($this->alias) : $this->argument('new');
    }

    protected function getTranslations()
    {
            return [
                'header' => [
                      'title' => trans_choice('general.modules', 2),
                      'apps' => trans_choice('general.modules', 2),
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
                    'back' => trans('modules.back'),
                    'installation'   => trans('modules.tab.installation'),
                    'pre_sale'  => trans('modules.badge.pre_sale'),
                    'search' => trans('general.search'),
                    'na' => trans('general.na'),
                ],
                
                'footer' => [
                    'powered' => trans('footer.powered'),
                    'link' => trans('footer.link'),
                    'software' => trans('footer.software'),
                    'version' => trans('footer.version'),
                ],
                 'installation' => [
                    'header'  =>  trans('modules.installation.header'),
                ],
                'noApps' => [
                    'no_apps' => trans('modules.no_apps'),
                    'become_developer' => trans('modules.become_developer', ['url' => 'https://akaunting.com/developers'])
                ],
                'detail' => [
                    'installed' => trans('modules.badge.installed'),
                    'actions' => trans('general.actions'),
                    'about' => trans('modules.about'),
                    'developers' => trans_choice('general.developers', 1),
                    'added' => trans('modules.added'),
                    'updated' => trans('modules.updated'),
                    'compatibility' => trans('modules.compatibility'),
                    'documentation' => trans('modules.documentation'),
                    'view'  => trans('modules.view'),
                    'categories' => trans_choice('general.categories', 1),
                    'version' => trans('footer.version'),
                    'description' => trans('general.description'),
                    'faq' => trans('modules.tab.faq'),
                    'reviews' => trans('modules.tab.reviews'),
                ], 
                'searchBar' => [
                    'category_placeHolder' => trans('general.form.select.field',['field' => trans_choice('general.categories', 1)]), 
                    'search_placeholder' => trans('general.search_placeholder'), 
                ],
                'api_key' => [
                    'enter' => trans('general.form.enter', ['field' => trans('modules.api_key')]),
                    'get_api_key' =>trans('modules.get_api_key', ['url' => 'https://akaunting.com/dashboard'])
                ],
                'actions' => [
                    'save' => trans('general.save'),
                    'cancel' =>trans('general.cancel'),
                    'next' => trans('pagination.next'),
                    'previous' => trans('pagination.previous'),
                    'install' => trans('modules.install'),
                    'uninstall' => trans('modules.button.uninstall'),
                    'enable' => trans('general.enable'),
                    'disable' => trans('general.disable'),
                    'buy_now' => trans('modules.buy_now'),
                ],
                 'reviews' => [
                    'add' => trans('modules.reviews.button.add'),
                    'na' =>trans('modules.reviews.na'),
                ]
            ];
    }
};
