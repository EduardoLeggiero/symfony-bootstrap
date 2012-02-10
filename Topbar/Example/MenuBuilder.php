<?php
namespace Mopa\BootstrapBundle\Topbar\Example;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Mopa\BootstrapBundle\Topbar\AbstractTopbarMenuBuilder;

/**
 * An example howto inject a default KnpMenu to the Topbar
 * see also Resources/config/example_menu.yml
 * and example_topbar.yml
 * @author phiamo
 *
 */
class MenuBuilder extends AbstractTopbarMenuBuilder
{
    public function createMainMenu(Request $request)
    {
        $menu = $this->factory->createItem('root');
        $menu->setCurrentUri($request->getRequestUri());

        $dropdown = $this->createDropdownMenuItem($menu, "Forms", false);
        $dropdown->addChild('Input Fields', array('route' => 'mopa_bootstrap_forms_inputs'));
        $dropdown->addChild('Choice Fields', array('route' => 'mopa_bootstrap_forms_choices'));
        // ... add more children

        return $menu;
    }
    public function createRightSideDropdownMenu(Request $request)
    {
        $menu = $this->factory->createItem('root');
        $menu->setCurrentUri($request->getRequestUri());

        $dropdown = $this->createDropdownMenuItem($menu, "Tools Menu", true);
        $dropdown->addChild('Symfony', array('uri' => 'http://www.symfony.com'));
        $dropdown->addChild('bootstrap', array('uri' => 'http://twitter.github.com/bootstrap/'));
        $dropdown->addChild('node.js', array('uri'=>'http://nodejs.org/'));
        $dropdown->addChild('less', array('uri' => 'http://lesscss.org/'));
        //adding a nice divider
        $this->addDivider($dropdown);
        $dropdown->addChild('google', array('uri'=>'http://www.google.com/'));

        $dropdown = $this->createDropdownMenuItem($menu, "Another Dropdown");

        $dropdown->addChild('node.js', array('uri'=>'http://nodejs.org/'));

        //adding a nice divider
        $this->addDivider($dropdown);

        $dropdown->addChild('Mohrenweiser & Partner', array('uri' => 'http://www.mohrenweiserpartner.de'));

        // ... add more children

        return $menu;
    }
}