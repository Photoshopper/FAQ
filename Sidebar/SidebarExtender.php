<?php

namespace Modules\Faq\Sidebar;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\User\Contracts\Authentication;

class SidebarExtender implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param Menu $menu
     *
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('faq::questions.title.questions'), function (Item $item) {
                $item->icon('fa fa-question-circle');
                $item->weight(10);
                $item->append('admin.faq.question.create');
                $item->route('admin.faq.question.index');
                $item->authorize(
                    $this->auth->hasAccess('faq.questions.index')
                );
            });
        });

        return $menu;
    }
}
