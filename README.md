# 2309_Wordpress_Filter_Plugin

## Transform SVG to ASCII

> in chrome console: btoa(`<svg...`)
> index.php->add_menu_page(...)

## CSS for the Plugin Page

> styles.css
> function ourMenu() -> add_action("load-{$mainPageHook}", array($this, 'mainPageAssets'));
> function mainPageAssets()

## Form submit

> function handleForm() & hidden error field & hidden nonce field

## Actual code to replace

> function filterLogic()

## CHoosing the text to replace with (\*\*\*)

> function ourSettings()-> DBB option replacementText
> filterLogic() -> str_ireplace -> get_option('replacementText', "**\***")
