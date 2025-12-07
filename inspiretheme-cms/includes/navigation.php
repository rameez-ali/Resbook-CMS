<?php
/**
 * Page Navigation
 *
 * @package    NetZone Base CMS 2.0
 * @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management Ltd.
 * @copyright  Tomahawk Brand Management Ltd.
 * @version    2.0
 * @since      File available since version 2.0
 */

// MENU BAR

function buildSiteMenu()
{
    global $do, $disableMenu, $menuDisable;

    $mainMenuView = "";

    $menuPages = [
        [
            "group_label" => "General",
            "items" => [
                [
                    "label" => "Dashboard",
                    "uri" => "dashboard",
                    "icon_cls" => "fa fa-dashboard",
                ],
                [
                    "label" => "Pages",
                    "uri" => "pages",
                    "icon_cls" => "glyphicon glyphicon-list-alt",
                ],
                [
                    "label" => "Quicklinks",
                    "uri" => "quicklinks",
                    "icon_cls" => "fa fa-link",
                ],
                [
                    "label" => "File Manager",
                    "uri" => "files",
                    "icon_cls" => "fa fa-folder",
                ],
                // [
                //     "label" => "Footer Contact",
                //     "uri" => "contact",
                //     "icon_cls" => "fa fa-envelope",
                // ],
                [
                    "label" => "Social Media Accounts",
                    "uri" => "socialmedia",
                    "icon_cls" => "fa fa-share-alt",
                ],
            ],
        ],
        [
            "group_label" => "Advanced",
            "items" => [
                [
                    "label" => "Reviews",
                    "uri" => "reviews",
                    "icon_cls" => "fa fa-comments",
                ],
                [
                    "label" => "FAQs",
                    "uri" => "faqs",
                    "icon_cls" => "fa fa-question",
                ],
                [
                    "label" => "Highlights",
                    "uri" => "highlights",
                    "icon_cls" => "fa fa-star",
                ],
                [
                    "label" => "Partnership Logo",
                    "uri" => "partners",
                    "icon_cls" => "fa fa-certificate",
                ],
                [
                    "label" => "Instagram API",
                    "uri" => "instagram",
                    "icon_cls" => "fa fa-instagram",
                ],
                [
                    "label" => "Forms",
                    "uri" => "forms",
                    "icon_cls" => "glyphicon glyphicon-list-alt",
                ],
                [
                    "label" => "Google Map",
                    "uri" => "map",
                    "icon_cls" => "fa fa-map-marker",
                ],
                [
                    "label" => "Mailchimp Newsletter",
                    "uri" => "newsletter",
                    "icon_cls" => "fa fa-address-book-o",
                ],
                [
                    "label" => "Refundable bookings",
                    "uri" => "refundprotect",
                    "icon_cls" => "fa fa-lock",
                ],
            ],
        ],
        [
            "group_label" => "Photos",
            "items" => [
                [
                    "label" => "Banner",
                    "uri" => "herobanner",
                    "icon_cls" => "glyphicon glyphicon-picture",
                ],
                [
                    "label" => "Photo Gallery",
                    "uri" => "gallery",
                    "icon_cls" => "fa fa-camera-retro",
                ],
            ],
        ],
        [
            "group_label" => "Vouchers",
            "items" => [
                [
                    "label" => "Vouchers",
                    "uri" => "vouchers",
                    "icon_cls" => "fa fa-gift",
                ],
                [
                    "label" => "Voucher Purchased",
                    "uri" => "voucherpurchased",
                    "icon_cls" => "fa fa-credit-card",
                ],
            ],
        ],
        [
            "group_label" => "Accommodation",
            "items" => [
                [
                    "label" => "Accommodations",
                    "uri" => "accommodations",
                    "icon_cls" => "fa fa-home",
                ],
                [
                    "label" => "Categories",
                    "uri" => "accommodationcategories",
                    "icon_cls" => "fa fa-home",
                ],
            ],
        ],
        [
            "group_label" => "Experience",
            "items" => [
                [
                    "label" => "Experience",
                    "uri" => "experiences",
                    "icon_cls" => "fa fa-map",
                ],
            ],
        ],
        [
            "group_label" => "Blog",
            "items" => [
                [
                    "label" => "Categories",
                    "uri" => "blogcategories",
                    "icon_cls" => "fa fa-rss",
                ],
                [
                    "label" => "Posts",
                    "uri" => "blogposts",
                    "icon_cls" => "glyphicon glyphicon-list-alt",
                ],
            ],
        ],
        [
            "group_label" => "SEO",
            "items" => [
                [
                    "label" => "SEO Settings",
                    "uri" => "seosettings",
                    "icon_cls" => "fa fa-line-chart",
                ],
                [
                    "label" => "Sitemap Generator",
                    "uri" => "sitemap",
                    "icon_cls" => "fa fa-sitemap",
                ],
            ],
        ],
        [
            "group_label" => "General Settings",
            "items" => [
                [
                    "label" => ACCESS_SETTINGS == FLAG_YES ? "Settings" : null,
                    "uri" => ACCESS_SETTINGS == FLAG_YES ? "settings" : null,
                    "icon_cls" =>
                        ACCESS_SETTINGS == FLAG_YES ? "fa fa-cog" : null,
                ],
                [
                    "label" => ACCESS_USERS == FLAG_YES ? "Users" : null,
                    "uri" => ACCESS_USERS == FLAG_YES ? "users" : null,
                    "icon_cls" =>
                        ACCESS_USERS == FLAG_YES ? "fa fa-user" : null,
                ],
                [
                    "label" =>
                        ACCESS_ACCESSGROUPS == FLAG_YES ? "Usergroups" : null,
                    "uri" =>
                        ACCESS_ACCESSGROUPS == FLAG_YES ? "accessgroups" : null,
                    "icon_cls" =>
                        ACCESS_ACCESSGROUPS == FLAG_YES ? "fa fa-group" : null,
                ],
                [
                    "label" => "Redirects",
                    "uri" => "redirects",
                    "icon_cls" => "fa fa-mail-forward",
                ],
            ],
        ],
    ];

    $mainMenuView = '<ul class="main-navigator">';

    foreach ($menuPages as $menu) {
        $mainMenuView .= "<li><span>" . $menu["group_label"] . "</span>";
        $mainMenuView .= '<ul class="nav nav-pills nav-stacked navi">';

        foreach ($menu["items"] as $menuItem) {
            $menuItemLabel = $menuItem["label"];
            $menuItemUri = $menuItem["uri"];
            $menuItemIconCls = $menuItem["icon_cls"];

            $menuLink = ADMIN_BASE_URL . "?do=" . $menuItemUri;

            $isDisabled =
                $disableMenu == FLAG_YES || $menuDisable == FLAG_YES
                    ? " disabled"
                    : "";
            $isActive = $menuItemUri == $do ? " active" : "";
            $href =
                $disableMenu == FLAG_YES || $menuDisable == FLAG_YES
                    ? ""
                    : ' href="' . $menuLink . '"';
            $icon = $menuItemIconCls
                ? ' <i class="' . $menuItemIconCls . '"></i> '
                : "";

            if (!empty($menuItemLabel)) {
                $mainMenuView .=
                    '<li class="' .
                    $isDisabled .
                    $isActive .
                    '"><a' .
                    $href .
                    ">" .
                    $icon .
                    $menuItem["label"] .
                    "</a></li>";
            }
        }
        $mainMenuView .= "</ul>";
        $mainMenuView .= "</li>";
        $mainMenuView .= '<li class="nav-divider"></li>';
    }
    $mainMenuView .= "</ul>";
    $mainMenuView .= '<style>.verspan { font-size: 12px !important; font-style: italic; color: #848484 !important; }</style>';
    $mainMenuView .= '<ul "class="main-navigator"><li class="version"><span class="verspan">NetZone Core 2 Version: '. VERSION . '</span></li></ul>';
    return $mainMenuView . "</ul>";
}

?>
