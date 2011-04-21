<?php defined('_JEXEC') or die;
/**
* @package		Template Framework for Joomla! 1.6
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/

/**
 * JFormFieldGooglewebfont
 *
 * Provides list of Google Web Fonts
 *
 * @static
 * @package		Molajo
 * @subpackage  HTML
 * @since		1.6
 */
class JFormFieldGooglewebfont extends JFormFieldList
{
    /**
     * Field Type
     *
     * @var		string
     * @since	1.6
     */
    public $type = 'Googlewebfont';

    /**
     * getOptions
     *
     * Generates list options
     *
     * @return	array	The field option objects.
     * @since	1.6
     */
    protected function getOptions()
    {
        $options	= array();

        $options[]	= JHtml::_('select.option', '', '- None Selected -');
        $options[]	= JHtml::_('select.option', 'Allan', 'Allan');
        $options[]	= JHtml::_('select.option', 'Allerta', 'Allerta');
        $options[]	= JHtml::_('select.option', 'Allerta+Stencil', 'Allerta Stencil');
        $options[]	= JHtml::_('select.option', 'Amaranth', 'Amaranth');
        $options[]	= JHtml::_('select.option', 'Annie+Use+Your+Telescope', 'Annie Use Your Telescope');
        $options[]	= JHtml::_('select.option', 'Anonymous+Pro', 'Anonymous Pro');
        $options[]	= JHtml::_('select.option', 'Anton', 'Anton');
        $options[]	= JHtml::_('select.option', 'Architects+Daughter', 'Architects Daughter');
        $options[]	= JHtml::_('select.option', 'Arimo', 'Arimo');
        $options[]	= JHtml::_('select.option', 'Arvo', 'Arvo');
        $options[]	= JHtml::_('select.option', 'Astloch', 'Astloch');
        $options[]	= JHtml::_('select.option', 'Bentham', 'Bentham');
        $options[]	= JHtml::_('select.option', 'Bevan', 'Bevan');
        $options[]	= JHtml::_('select.option', 'Buda', 'Buda');
        $options[]	= JHtml::_('select.option', 'Cabin', 'Cabin');
        $options[]	= JHtml::_('select.option', 'Cabin+Sketch:bold', 'Cabin Sketch');
        $options[]	= JHtml::_('select.option', 'Calibri', 'Calibri');
        $options[]	= JHtml::_('select.option', 'Calligraffitti', 'Calligraffitti');
        $options[]	= JHtml::_('select.option', 'Cambria', 'Cambria');
        $options[]	= JHtml::_('select.option', 'Candal', 'Candal');
        $options[]	= JHtml::_('select.option', 'Cantarell', 'Cantarell');
        $options[]	= JHtml::_('select.option', 'Cardo', 'Cardo');
        $options[]	= JHtml::_('select.option', 'Cherry+Cream+Soda', 'Cherry Cream Soda');
        $options[]	= JHtml::_('select.option', 'Chewy', 'Chewy');
        $options[]	= JHtml::_('select.option', 'Coda', 'Coda');
        $options[]	= JHtml::_('select.option', 'Coming+Soon', 'Coming Soon');
        $options[]	= JHtml::_('select.option', 'Consolas', 'Consolas');
        $options[]	= JHtml::_('select.option', 'Copse', 'Copse');
        $options[]	= JHtml::_('select.option', 'Corben', 'Corben');
        $options[]	= JHtml::_('select.option', 'Corsiva', 'Corsiva');
        $options[]	= JHtml::_('select.option', 'Cousine', 'Cousine');
        $options[]	= JHtml::_('select.option', 'Covered+By+Your+Grace', 'Covered By Your Grace');
        $options[]	= JHtml::_('select.option', 'Crafty+Girls', 'Crafty Girls');
        $options[]	= JHtml::_('select.option', 'Crimson+Text', 'Crimson Text');
        $options[]	= JHtml::_('select.option', 'Crushed', 'Crushed');
        $options[]	= JHtml::_('select.option', 'Cuprum', 'Cuprum');
        $options[]	= JHtml::_('select.option', 'Dancing+Script', 'Dancing Script');
        $options[]	= JHtml::_('select.option', 'Dawning+of+a+New+Day', 'Dawning of a New Day');
        $options[]	= JHtml::_('select.option', 'Droid+Sans', 'Droid Sans');
        $options[]	= JHtml::_('select.option', 'Droid+Sans+Mono', 'Droid Sans Mono');
        $options[]	= JHtml::_('select.option', 'Droid+Serif', 'Droid Serif');
        $options[]	= JHtml::_('select.option', 'EB+Garamond', 'EB Garamond');
        $options[]	= JHtml::_('select.option', 'Expletus+Sans', 'Expletus Sans');
        $options[]	= JHtml::_('select.option', 'Fontdiner+Swanky', 'Fontdiner Swanky');
        $options[]	= JHtml::_('select.option', 'GFS+Didot', 'GFS Didot');
        $options[]	= JHtml::_('select.option', 'GFS+Neohellenic', 'GFS Neohellenic');
        $options[]	= JHtml::_('select.option', 'Geo', 'Geo');
        $options[]	= JHtml::_('select.option', 'Goudy+Bookletter+1911', 'Goudy Bookletter 1911');
        $options[]	= JHtml::_('select.option', 'Gruppo', 'Gruppo');
        $options[]	= JHtml::_('select.option', 'Hanuman', 'Hanuman');
        $options[]	= JHtml::_('select.option', 'Homemade+Apple', 'Homemade Apple');
        $options[]	= JHtml::_('select.option', 'IM+Fell+DW+Pica', 'IM Fell DW Pica');
        $options[]	= JHtml::_('select.option', 'IM+Fell+DW+Pica+SC', 'IM Fell DW Pica SC');
        $options[]	= JHtml::_('select.option', 'IM+Fell+Double+Pica', 'IM Fell Double Pica');
        $options[]	= JHtml::_('select.option', 'IM+Fell+Double+Pica+SC', 'IM Fell Double Pica SC');
        $options[]	= JHtml::_('select.option', 'IM+Fell+English', 'IM Fell English');
        $options[]	= JHtml::_('select.option', 'IM+Fell+English+SC', 'IM Fell English SC');
        $options[]	= JHtml::_('select.option', 'IM+Fell+French+Canon', 'IM Fell French Canon');
        $options[]	= JHtml::_('select.option', 'IM+Fell+French+Canon+SC', 'IM Fell French Canon SC');
        $options[]	= JHtml::_('select.option', 'IM+Fell+Great+Primer', 'IM Fell Great Primer');
        $options[]	= JHtml::_('select.option', 'IM+Fell+Great+Primer+SC', 'IM Fell Great Primer SC');
        $options[]	= JHtml::_('select.option', 'Inconsolata', 'Inconsolata');
        $options[]	= JHtml::_('select.option', 'Indie+Flower', 'Indie Flower');
        $options[]	= JHtml::_('select.option', 'Irish+Grover', 'Irish Grover');
        $options[]	= JHtml::_('select.option', 'Josefin+Sans', 'Josefin Sans');
        $options[]	= JHtml::_('select.option', 'Josefin+Slab', 'Josefin Slab');
        $options[]	= JHtml::_('select.option', 'Just+Another+Hand', 'Just Another Hand');
        $options[]	= JHtml::_('select.option', 'Just+Me+Again+Down+Here', 'Just Me Again Down Here');
        $options[]	= JHtml::_('select.option', 'Kenia', 'Kenia');
        $options[]	= JHtml::_('select.option', 'Kranky', 'Kranky');
        $options[]	= JHtml::_('select.option', 'Kreon', 'Kreon');
        $options[]	= JHtml::_('select.option', 'Kristi', 'Kristi');
        $options[]	= JHtml::_('select.option', 'Lato', 'Lato');
        $options[]	= JHtml::_('select.option', 'League+Script', 'League Script');
        $options[]	= JHtml::_('select.option', 'Lekton', 'Lekton');
        $options[]	= JHtml::_('select.option', 'Lobster', 'Lobster');
        $options[]	= JHtml::_('select.option', 'Luckiest+Guy', 'Luckiest Guy');
        $options[]	= JHtml::_('select.option', 'Meddon', 'Meddon');
        $options[]	= JHtml::_('select.option', 'MedievalSharp', 'MedievalSharp');
        $options[]	= JHtml::_('select.option', 'Merriweather', 'Merriweather');
        $options[]	= JHtml::_('select.option', 'Michroma', 'Michroma');
        $options[]	= JHtml::_('select.option', 'Miltonian', 'Miltonian');
        $options[]	= JHtml::_('select.option', 'Miltonian+Tattoo', 'Miltonian Tattoo');
        $options[]	= JHtml::_('select.option', 'Molengo', 'Molengo');
        $options[]	= JHtml::_('select.option', 'Mountains+of+Christmas', 'Mountains of Christmas');
        $options[]	= JHtml::_('select.option', 'Neucha', 'Neucha');
        $options[]	= JHtml::_('select.option', 'Neuton', 'Neuton');
        $options[]	= JHtml::_('select.option', 'Nobile', 'Nobile');
        $options[]	= JHtml::_('select.option', 'Nova+Square', 'Nova Square');
        $options[]	= JHtml::_('select.option', 'Nova+Slim', 'Nova Slim');
        $options[]	= JHtml::_('select.option', 'Nova+Round', 'Nova Round');
        $options[]	= JHtml::_('select.option', 'Nova+Cut', 'Nova Cut');
        $options[]	= JHtml::_('select.option', 'Nova+Script', 'Nova Script');
        $options[]	= JHtml::_('select.option', 'Nova+Mono', 'Nova Mono');
        $options[]	= JHtml::_('select.option', 'Nova+Oval', 'Nova Oval');
        $options[]	= JHtml::_('select.option', 'Nova+Flat', 'Nova Flat');
        $options[]	= JHtml::_('select.option', 'OFL+Sorts+Mill+Goudy+TT', 'OFL Sorts Mill Goudy TT');
        $options[]	= JHtml::_('select.option', 'Old+Standard+TT', 'Old Standard TT');
        $options[]	= JHtml::_('select.option', 'Oswald', 'Oswald');
        $options[]	= JHtml::_('select.option', 'Pacifico', 'Pacifico');
        $options[]	= JHtml::_('select.option', 'PT+Sans', 'PT Sans');
        $options[]	= JHtml::_('select.option', 'PT+Sans+Caption', 'PT Sans Caption');
        $options[]	= JHtml::_('select.option', 'PT+Sans+Narrow', 'PT Sans Narrow');
        $options[]	= JHtml::_('select.option', 'PT+Serif', 'PT Serif');
        $options[]	= JHtml::_('select.option', 'Permanent+Marker', 'Permanent Marker');
        $options[]	= JHtml::_('select.option', 'Philosopher', 'Philosopher');
        $options[]	= JHtml::_('select.option', 'Puritan', 'Puritan');
        $options[]	= JHtml::_('select.option', 'Quattrocento', 'Quattrocento');
        $options[]	= JHtml::_('select.option', 'Quattrocento+Sans', 'Quattrocento Sans');
        $options[]	= JHtml::_('select.option', 'Radley', 'Radley');
        $options[]	= JHtml::_('select.option', 'Raleway', 'Raleway');
        $options[]	= JHtml::_('select.option', 'Reenie+Beanie', 'Reenie Beanie');
        $options[]	= JHtml::_('select.option', 'Rock+Salt', 'Rock Salt');
        $options[]	= JHtml::_('select.option', 'Schoolbell', 'Schoolbell');
        $options[]	= JHtml::_('select.option', 'Slackey', 'Slackey');
        $options[]	= JHtml::_('select.option', 'Smythe', 'Smythe');
        $options[]	= JHtml::_('select.option', 'Sniglet', 'Sniglet');
        $options[]	= JHtml::_('select.option', 'Special+Elite', 'Special Elite');
        $options[]	= JHtml::_('select.option', 'Sue+Ellen+Francisco', 'Sue Ellen Francisco');
        $options[]	= JHtml::_('select.option', 'Sunshiney', 'Sunshiney');
        $options[]	= JHtml::_('select.option', 'Syncopate', 'Syncopate');
        $options[]	= JHtml::_('select.option', 'Tangerine', 'Tangerine');
        $options[]	= JHtml::_('select.option', 'Terminal+Dosis+Light', 'Terminal+Dosis+Light');
        $options[]	= JHtml::_('select.option', 'The+Girl+Next+Door', 'The Girl Next Door');
        $options[]	= JHtml::_('select.option', 'Tinos', 'Tinos');
        $options[]	= JHtml::_('select.option', 'Ubuntu', 'Ubuntu');
        $options[]	= JHtml::_('select.option', 'UnifrakturMaguntia', 'UnifrakturMaguntia');
        $options[]	= JHtml::_('select.option', 'Unkempt', 'Unkempt');
        $options[]	= JHtml::_('select.option', 'Vibur', 'Vibur');
        $options[]	= JHtml::_('select.option', 'Vollkorn', 'Vollkorn');
        $options[]	= JHtml::_('select.option', 'VT323', 'VT323');
        $options[]	= JHtml::_('select.option', 'Waiting+for+the+Sunrise', 'Waiting for the Sunrise');
        $options[]	= JHtml::_('select.option', 'Walter+Turncoat', 'Walter Turncoat');
        $options[]	= JHtml::_('select.option', 'Yanone+Kaffeesatz', 'Yanone Kaffeesatz');

        return $options;

    }
}